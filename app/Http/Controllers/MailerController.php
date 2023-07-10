<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use RealRashid\SweetAlert\Facades\Alert;

class MailerController extends Controller
{
    //
    // =============== [ Email ] ===================
    public function email() {
        return view("email");
    }


    // ========== [ Compose Email ] ================
    public function composeEmail(Request $request) {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'luuhaiduong101@gmail.com';   //  sender username
            $mail->Password = 'mnawgrukhpcpwslj';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->setFrom('luuhaiduong101@gmail.com', 'duong');
            $mail->addAddress($request->emailRecipient);
//            $mail->addCC($request->emailCc);
//            $mail->addBCC($request->emailBcc);

            $mail->addReplyTo('sender@example.com', 'SenderReplyName');

            if(isset($_FILES['emailAttachments'])) {
                for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                }
            }


            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = 'Book Forest';
            $mail->Body    = 'Thank you for purchasing from our store';


            if( !$mail->send() ) {
                alert()->success('failed', 'Please wait for 48 hours for order browsing');
                return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            }
            else {
                alert()->success('success', 'Please wait for 48 hours for order browsing');
                return back()->with("success", "Email has been sent.");

            }

        } catch (Exception $e) {
            dd($mail);
            alert()->success('error', 'Please wait for 48 hours for order browsing');
            return back()->with('error','Message could not be sent.');
        }
    }
}
