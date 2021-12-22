<?php


require '../mailer/PHPMailerAutoload.php';


$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
// $mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "sales@runal.com";
$mail->Password = "Mark@1993";



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


$from = "sales@runal.com";
$subject = "Adwords Enquiry - 2 & 3 Apartments";
$mail->setFrom($from, 'Runal Developers');
$mail->addReplyTo($from, 'Runal Developers');
$mail->addAddress($from, $name);
$mail->Subject = $subject;
$mail->msgHTML($html);
$mail->send();


	$name = str_replace(' ','_',$name);
	
			$str = "https://runal.in4suite.com/IN4WebLeadService/WebLeadService.asmx/CreateWebLeadsInIN4SuiteRE?securityToken=01F6CB4E04F4474799789F4F081FDB3220210125165222817&FirstName=".$name."&LastName=NA&phoneNo=".$phone."&emailid=".$email."&interestedIn=NA&title=NA&enquirySourceId=56&address=NA&comments=NA&projectName=NA&webSiteURL=NA"; 
			$curl = curl_init();
				curl_setopt_array(
					$curl,array(CURLOPT_URL=> $str,
					CURLOPT_RETURNTRANSFER=> 1,
					CURLOPT_POST=>0,
					CURLOPT_SSL_VERIFYPEER=>false
					)
				);
				$res = curl_exec ($curl); 
				curl_close($curl);	

echo 1;

?>