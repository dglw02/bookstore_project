<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Cart;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
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
        $cities = City::get();
        return view('checkout',compact('cartitems','cities'));
    }

    public function composeEmail(Request $request) {
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



    public  function placeorder(Request $request){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->orders_name = $request->input('orders_name');
        $order->orders_email = $request->input('orders_email');
        $order->orders_payment = $request->input('orders_payment');
        $order->orders_address = $request->input('orders_address');
        $order->orders_phone = $request->input('orders_phone');
        $order->orders_city = $request->input('orders_city');
        $total = 0;

        $cartitems_total = Cart::where('user_id',Auth::id())->get();
        foreach ($cartitems_total as $item){
            $total += $item->books->books_price * $item->books_quantity;
        }
        $grandtotal = $total +($total * 0.1) + Auth::user()->city->areas->areas_price;
        $order->orders_price = $grandtotal;


        $order->order_tracking = 'tracking'.rand(1000,9999);
        $order->save();


        $cartitems = Cart::where('user_id',Auth::id())->get();
        foreach ($cartitems as $item){
            OrderDetails::create([
                'orders_id'=>$order->orders_id,
                'books_id'=>$item->books_id,
                'quantity'=>$item->books_quantity,
                'price'=>$item->books->books_price,
            ]);
            $book = Books::where('books_id',$item->books_id)->first();
            $book->books_quantity = $book->books_quantity -$item->books_quantity;
            $book->update();
        }
        if(Auth::user()->address==null){
            $user = User::where('id',Auth::id())->first();
            $user->orders_name = $request->input('orders_name');
            $user->orders_email = $request->input('orders_email');
            $user->orders_payment = $request->input('orders_payment');
            $user->orders_address = $request->input('orders_address');
            $user->orders_phone = $request->input('orders_phone');
            $user->orders_city = $request->input('orders_city');
            $user->update();
        }
        $cartitems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);
        alert()->success('We has taken your order','Please wait for 48 hours for order browsing');
        return redirect('/')->with('status','Order placed Successfully');
    }
}
