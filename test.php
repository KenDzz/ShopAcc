<?php 
	include "$_SERVER[DOCUMENT_ROOT]/lib/PHPMailer/src/PHPMailer.php";
	include "$_SERVER[DOCUMENT_ROOT]/lib/PHPMailer/src/Exception.php";
	include "$_SERVER[DOCUMENT_ROOT]/lib/PHPMailer/src/OAuth.php";
	include "$_SERVER[DOCUMENT_ROOT]/lib/PHPMailer/src/POP3.php";
	include "$_SERVER[DOCUMENT_ROOT]/lib/PHPMailer/src/SMTP.php";

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	$mail = new PHPMailer;
				    //Server settings
                    try {
	$mail->isSMTP();                                            // Send using SMTP
	$mail->Host       = 'ssl://smtp.gmail.com';                    // Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	$mail->Username   = 'clonepro999@gmail.com';                     // SMTP username
				$mail->Password   = 'bqlmrwyxqcujydge';                               // SMTP password
				$mail->SMTPSecure = 'tls'; 						// Enable TLS encryption, `ssl` also accepted
				$mail->CharSet = "UTF-8";
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				$mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
				   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

				    //Recipients
				$mail->setFrom('clonepro999@gmail.com', 'Thế giới NICK GAME');
				$mail->addAddress('ngatu9x@gmail.com', 'fuck');     // Add a recipient
				$mail->addAddress('ngatu9x@gmail.com');               // Name is optional
				$mail->addReplyTo('clonepro999@gmail.com', 'Information');
				$mail->addCC('clonepro999@gmail.com');
				$mail->addBCC('clonepro999@gmail.com');

				    // Attachments
				   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
				   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

				    // Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'hi';
				$mail->Body    = 'hi';
				$mail->AltBody = 'hi';
				$mail->send();
                echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
 ?>