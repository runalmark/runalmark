<?php


	require_once 'assets/lib/swift_required.php';			
	$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl');
	$transport->setUsername('sales@runal.com');
	$transport->setPassword('Mark@1993');


$name = @$_POST['name'];
$email = @$_POST['email'];
$phone = @$_POST['mobile'];



$servername = "localhost";
$username = "runalefr_main";
$password = "runal@123";
$dbname = "runalefr_main";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$qry = "INSERT INTO `enquiries` (`id`, `name`, `email`, `mobile`, `msg`, `status`, `page`, `created_at`) VALUES (NULL, '$name', '$email', '$phone', 'Landing page enquiry', '1', 'landing', CURRENT_TIMESTAMP)";
$conn->query($qry);

	
        $html = "<center> <h2><u>Call back Enquiry </u></h2></center>
        <tr><td><strong> Name  </strong></td><td style='padding:5px 5px 5px 5px;'><strong> : </strong></td><td> $name </td></tr>
        <tr><td><strong> Phone  </strong></td><td style='padding:5px 5px 5px 5px;'><strong> : </strong></td><td> $phone </td></tr>
        <tr><td><strong> EmailId  </strong></td><td style='padding:5px 5px 5px 5px;'><strong> : </strong></td><td> $email </td></tr>      
        <tr><td></td><td></td><td></td></tr></table>";
		
	$from = 'sales@runal.com';	
    $subject = "Adwords Enquiry - Bungalows ";
	$to = array();
	$to[] =  $from;
	$message = Swift_Message::newInstance();
	$headers = $message->getHeaders();
	$message->setTo($to);					
	$message->setSubject($subject);
	$message->setBody($html, 'text/html');
	$message->setFrom($email, "Runal Developers");
	$mailer = Swift_Mailer::newInstance($transport);
//	$mailer->send($message,$error);	

	echo 1;

?>