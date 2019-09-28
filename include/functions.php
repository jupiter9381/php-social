<?php  

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function mailSend($to, $subject, $body, $cc="", $bcc="") {

	// Load Composer's autoloader
	require 'PHPMailer-master/vendor/autoload.php';
	$mail = new PHPMailer(true);

	try {
		// Server settings
		$mail->SMTPDebug = 0;      

		$mail->isSMTP();                                            // Set mailer to use SMTP
		// $mail->Host = 'a2plvcpnl262546.prod.iad2.secureserver.net';
		// $mail->SMTPSecure = 'ssl';
		// $mail->Port       = 465;                                    // TCP port to connect to 
		// $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		// $mail->Username   = 'support@followmyass.com';                     // SMTP username		
		// $mail->Password   = 'd6%$5m%yj(3=';                               // SMTP password

		$mail->Host = 'localhost';
		$mail->Port       = 25;                      
		$mail->SMTPAuth   = false;                    

		                                 // Enable verbose debug output
		/*
		$mail->isSMTP();                                            // Set mailer to use SMTP
		$mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		
		$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
		$mail->Port       = 587;                                    // TCP port to connect to 
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = 'followmyass.com@gmail.com';                     // SMTP username		
		$mail->Password   = 'L28&Ej}<zm';                 */              // SMTP password


		// $mail->Host       = 'smtp-mail.outlook.com';  // Specify main and backup SMTP servers
		// $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
		// $mail->Port       = 587;                                    // TCP port to connect to 
		// $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		// $mail->Username   = 'support@followmyass.com';                     // SMTP username
		// $mail->Password   = 'L28&Ej}<zm';                               // SMTP password

		$mail->SMTPOptions = array(
		    'ssl' => array(
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		        'allow_self_signed' => true
		    )
		);

		//Recipients
		$mail->setFrom('support@followmyass.com', 'Followmyass');
		
		$mail->addAddress($to);               // Name is optional
		//$mail->addReplyTo('', 'Information');
		if ($cc != "") {
			$mail->addCC($cc);	
		} 
		if ($bcc != "") {
			$mail->addBCC($bcc);	
		}  

		// Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments

		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $subject;
		$mail->Body    = $body;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		return true;
	} catch (Exception $e) {
		// echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";exit;
		return false;
	}
}

function get_referral_code($con="")
{
	$gen_referral_code = generate_referral();
	$result = mysqli_query($con,"SELECT userId,referral_code FROM users WHERE referral_code='".$gen_referral_code."'");    	
	if ($result->num_rows == 0) {
		$result = mysqli_query($con,"UPDATE users SET referral_code='".$gen_referral_code."' WHERE userId='".$_SESSION['user']."'");    	
		return $gen_referral_code; 
	} else {
		get_referral_code($con);
	}
}

function generate_referral()
{
	$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$res = "";
	for ($i = 0; $i < 10; $i++) {
		$res .= $chars[mt_rand(0, strlen($chars)-1)];
	}
	return $res;
}

function get_referral_message($con,$referral_link="")
{
	$referral_message = array();
	$result = mysqli_query($con,"SELECT setting_value FROM referral_setting WHERE setting_key='SHARE_REF_MESSAGE'");    	
	if ($result->num_rows != 0) {
		$row=mysqli_fetch_assoc($result);
		$setting_val = $row['setting_value'];
		$referral_url = "<a href='$referral_link'>".BASE_URL."</a>";
		$setting_value = str_replace("%REF_URL%", $referral_url, $setting_val); 
		$setting_value1 = str_replace("%REF_URL%", "Followmyass", $setting_val); 
		$referral_message[1] = $setting_value; 
		$referral_message[2] = $setting_value1; 
	} 
	return $referral_message;
}

function redirect($page='') {
	if ($page != '') {		
		header('Location:'.BASE_URL.'/'.$page);exit;
	}    
}

function pr($content) {
	echo "<pre>";
	print_r($content);
	echo "</pre>";
}

function po($data = '') {
	echo "<pre>";
	if ($data == '') {
		print_r($_POST);
	} else {
		print_r($data);
	}
	echo "</pre>";
	die();
}

function lk($dqr = '') {
	if($dqr == '') {
		echo $statement->debugDumpParams();	
	} else {
		echo $dqr->debugDumpParams();
	}	
}


function set_message($type='',$msg='') {
	if ($type !='' && $msg !='') {
		$type = strtolower($type);
		if ($type == "success" || $type == "danger" || $type == "info" || $type == "warning") {
			$_SESSION[$type]=$msg;
		}		
	}
}

function show_messsage($type = '',$flag = false){	
	if ($type == "success" || $type == "danger" || $type == "info" || $type == "warning") {
		if(isset($_SESSION[$type])) {
			if($flag == true) {
				echo $_SESSION[$type];	
			} else {
				echo "<div class='alert alert-".$type." cstm-msg-all'><button type='button' class='close' onclick='closediv()' data-dismiss='alert' aria-hidden='true'>&times;</button>".$_SESSION[$type]."</div>";	
			}			
			unset($_SESSION[$type]);
		}
	}
}   


function GenerateRandomFilename($file_name = '', $length = 30) {
    $finalext = '';
    if ($file_name != '') {
        $arr = explode('.', $file_name);
        $ext = end($arr);
        $finalext = '.' . $ext;
    }
    $characters = '123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString . $finalext;
}

?>
