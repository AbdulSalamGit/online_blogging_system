<?php 
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require_once("../require/connection.php");

	if (isset($_REQUEST['user_id'])) {
		$user_id 		= $_GET['user_id'];
		$user_email 	= $_GET['email'];

		$query 	= "UPDATE user SET is_approved = 'Approved' WHERE user_id = '$user_id' ";
		$result = mysqli_query($connection,$query);
		if ($result) {
				require_once ('../PHPMailer-master/src/PHPMailer.php');
				require_once ('../PHPMailer-master/src/SMTP.php');
				require_once ('../PHPMailer-master/src/Exception.php');

                $subject        	= "Online Blogging Managment ";
                $message        	= "Your information has been saved and now you are approved";

                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host         = 'smtp.gmail.com';
                $mail->Port         = 587;
                $mail->SMTPSecure   = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->SMTPAuth     = true;

                $mail->Username     = 'abdulsalamqambrani029@gmail.com';
                $mail->Password     = 'edhawnmfzkfkhjbt';

                $mail->setFrom('abdulsalamqambrani029@gmail.com', $subject);
                $mail->addReplyTo('abdulsalamqambrani029@gmail.com', 'ABC');
                $mail->addAddress($user_email , 'Online Blogging');
                
                $mail->Subject      = $subject;
                $mail->isHTML(true);
                $mail->Body         = $message;

                if (!$mail->send()) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                   
  						header("location:view_pending_user.php?message=<span style='color:#fff'> Mail has been sent at user Email for approved..");
                   
                    exit();
                }
		}else{
			echo "Invalid";
		}




		// echo "<pre>";
		// echo $user_id;
	}


 ?>