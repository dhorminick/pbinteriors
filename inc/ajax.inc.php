<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

# send mail
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';
require '../phpmailer/Exception.php';

include 'database.inc.php';

if ($_POST["name"] != null) { if ($_POST["email"] != null){ if ($_POST["message"] != null){ if ($_POST["property"] != null){
        $name = trim(strip_tags(htmlspecialchars($_POST["name"])));
        $email = trim(strip_tags(htmlspecialchars($_POST["email"])));
        $message = trim(strip_tags(htmlspecialchars($_POST["message"])));
        $phone = trim(strip_tags(htmlspecialchars($_POST["phone"])));
        $property = trim(strip_tags(htmlspecialchars($_POST["property"])));

        $GetDetails = "SELECT * FROM portfolio WHERE crc32(page_id) = '$property'";
        $GetDetailsResult = mysqli_query($con,$GetDetails);
        if ($GetDetailsResult->num_rows > 0) {
            $rows = mysqli_fetch_array($GetDetailsResult);
            $subject = $rows["project_name"];

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'mail.tedmaniatv.com'; # prolly use simganic smtp
        $mail->SMTPAuth = true;
        $mail->Username = 'admin@tedmaniatv.com'; # paste one generated by Mailtrap
        $mail->Password = '@lhZkJC_9*p{'; # paste one generated by Mailtrap
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        
        $mail->setFrom($email, $name);
        $mail->addReplyTo($email, $name);
        $mail->addAddress('inquire@pbinteriors.com', 'PbInteriors'); # name is optional
        
        $mail->Subject = $subject; #find subject
        $mail->isHTML(true);
        
        $mail->Body = $message;
        $mail->AltBody = $message;
        
        if($mail->send()){
            $error = 'Message Sent Succesfully!';
        }else{ 
            $error = 'Message could not be sent!';
            #array_push($messages, "Error 501! Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }else{$error = 'Error 404!';}
}else{$error = 'no property id';}
}else{$error = 'no message';}
}else{$error = 'no email';}
}else{$error = 'no name';}
echo $error;
?>