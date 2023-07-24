<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Cart;
use App\Models\City;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Province;
use App\Models\User;
use App\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use RealRashid\SweetAlert\Facades\Alert;

class CheckOutController extends Controller
{
    //
    public function index(){
        $cartitems = Cart::where('user_id',Auth::id())->get();
        $province = Province::get();
        return view('checkout',compact('cartitems', 'province'));
    }

    public function index2(){
        $cartitems = Cart::where('user_id',Auth::id())->get();
        $province = Province::get();
        return view('checkoutonline',compact('cartitems', 'province'));
    }

    public function getDistrict(Request $request)
    {
        $data['district'] = District::where("province_id",$request->province_id)
            ->get(["district_name","district_id"]);
        return response()->json($data);
    }
    public function getWards(Request $request)
    {
        $data['wards'] = Wards::where("district_id",$request->district_id)
            ->get(["wards_name","wards_id"]);
        return response()->json($data);
    }

    public function composeEmail(Request $request)
    {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
            $mail->isSMTP();// gửi mail SMTP
            $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
            $mail->SMTPAuth = true;// Enable SMTP authentication
            $mail->Username = 'bookforestr@gmail.com';// SMTP username
            $mail->Password = ''; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to
            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress('joe@example.net', 'Joe User'); // Add a recipient
            $mail->addAddress('ellen@example.com'); // Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');
            // Attachments
            $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
            // Content
            $mail->isHTML(true);   // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->orders_name = $request->input('orders_name');
        $order->orders_email = $request->input('orders_email');
        $order->orders_payment = $request->input('orders_payment');
        $order->orders_address = $request->input('orders_address');
        $order->orders_phone = $request->input('orders_phone');
        $order->orders_province = $request->input('orders_province');
        $order->orders_district = $request->input('orders_district');
        $order->orders_wards = $request->input('orders_wards');
        $total = 0;

        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems_total as $item) {
            $total += $item->books->books_price * $item->books_quantity;
        }
        $grandtotal = $total +($total * 0.1) + Auth::user()->province->area->area_price;
        $order->orders_price = $grandtotal;
        $order->order_tracking = 'tracking' . rand(1000, 9999);
        $order->save();
        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $item) {
            OrderDetails::create([
                'orders_id' => $order->orders_id,
                'books_id' => $item->books_id,
                'quantity' => $item->books_quantity,
                'price' => $item->books->books_price,
            ]);
            $book = Books::where('books_id', $item->books_id)->first();
            $book->books_quantity = $book->books_quantity - $item->books_quantity;
            //dd($book);
            $book->update();
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);


        //Mail
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        try {
            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'luuhaiduong101@gmail.com';   //  teen chủ shop
            $mail->Password = 'mnawgrukhpcpwslj';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->setFrom('luuhaiduong101@gmail.com', 'Book Forest');
            $mail->addAddress(Auth::user()->email); // người nhận mail
//            $mail->addBCC($request->emailBcc);

            $mail->addReplyTo('sender@example.com', 'SenderReplyName');

            if(isset($_FILES['emailAttachments'])) {
                for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);// file đính kềm
                }
            }


            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = 'Book Forest'; // tiều đề
            $mail->Body    = 'Thank you for purchasing from our store';// nội dung


            if( !$mail->send() ) {
                alert()->success('failed', 'Please wait for 48 hours for order browsing');
                return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            }
            else {

                alert()->success('We has taken your order', 'Please wait for 48 hours for order browsing');
                return redirect('/')->with('status', 'Order placed Successfully');

            }

        } catch (Exception $e) {
            dd($mail);
            alert()->success('error', 'Please wait for 48 hours for order browsing');
            return back()->with('error','Message could not be sent.');
        }



    }




    public function momo(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->orders_name = $request->input('orders_name');
        $order->orders_email = $request->input('orders_email');
        $order->orders_payment = $request->input('orders_payment');
        $order->orders_address = $request->input('orders_address');
        $order->orders_phone = $request->input('orders_phone');
        $order->orders_province = $request->input('orders_province');
        $order->orders_district = $request->input('orders_district');
        $order->orders_wards = $request->input('orders_wards');
        $total = 0;

        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems_total as $item) {
            $total += $item->books->books_price * $item->books_quantity;
        }
        $grandtotal = $total +($total * 0.1) + Auth::user()->province->area->area_price;
        $order->orders_price = $grandtotal;
        $order->order_tracking = 'tracking ' . rand(10000, 99999);
        $order->save();
        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $item) {
            OrderDetails::create([
                'orders_id' => $order->orders_id,
                'books_id' => $item->books_id,
                'quantity' => $item->books_quantity,
                'price' => $item->books->books_price,
            ]);
            $book = Books::where('books_id', $item->books_id)->first();
            $book->books_quantity = $book->books_quantity - $item->books_quantity;
            $book->update();
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua ATM MoMo";
        $amount = $_POST['total'];
        $orderId = time() . "";
        $redirectUrl = "http://127.0.0.1:8000";
        $ipnUrl = "http://127.0.0.1:8000";
        $extraData = "";
            $requestId = time() . "";
            $requestType = "payWithATM";
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);

            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json


        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        try {
            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'luuhaiduong101@gmail.com';   //  teen chủ shop
            $mail->Password = 'mnawgrukhpcpwslj';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->setFrom('luuhaiduong101@gmail.com', 'Book Forest');
            $mail->addAddress(Auth::user()->email); // người nhận mail
//            $mail->addBCC($request->emailBcc);

            $mail->addReplyTo('sender@example.com', 'SenderReplyName');

            if(isset($_FILES['emailAttachments'])) {
                for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);// file đính kềm
                }
            }


            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = 'Book Forest'; // tiều đề
            $mail->Body    = 'Thank you for purchasing from our store';// nội dung

            if( !$mail->send() ) {
                alert()->success('failed', 'Please wait for 48 hours for order browsing');
                return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            }
            else {

                alert()->success('We has taken your order', 'Please wait for 48 hours for order browsing');
                return redirect()->to($jsonResult['payUrl']);

            }

        } catch (Exception $e) {
            dd($mail);
            alert()->success('error', 'Please wait for 48 hours for order browsing');
            return back()->with('error','Message could not be sent.');
        }

        }


    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
}
