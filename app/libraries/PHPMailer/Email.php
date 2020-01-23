<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
class Email{
    public function sendMail($data, $domainName, $daysBeforeExpire){
  
   
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.topwebdeveloper.co.uk';  // Specify main and backup SMTP servers smtp.topwebdeveloper.co.uk
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'contact@topwebdeveloper.co.uk';                 // SMTP username
        $mail->Password = 'U}O[mdQUN@(Q';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to 465 25 587

        //Recipients
        $mail->setFrom('contact@topwebdeveloper.co.uk', 'Gabriel');
        //$mail->addAddress('test@joyfulbrothers.com', 'Gabriel Florin');     // Add a recipient
        $mail->addAddress('contact@topwebdeveloper.co.uk', 'Gabriel Florin');               // Name is optional
        $mail->addAddress($data['recipient'], 'Gabriel Florin');
        $mail->addReplyTo('contact@topwebdeveloper.co.uk', 'Informationnnn');


        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $data['subject'];
        $mail->Body    = $data['htmlBody'].$domainName . " in " . $daysBeforeExpire. " days";
        $mail->AltBody = $data['nonHtmlBody'];

        $mail->send();
        echo 'Message has been sent';  
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;  
        }    
    }
}
	
?>