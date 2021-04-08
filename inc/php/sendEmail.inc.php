<?php
	function sendEmail($emailExists, $URL)
	{
		$subject = "Tutlegoss.com Password Reset";
		$message = "<html>"
            		."<head>"
            		  ."<title>Tutlegoss.com Password Reset</title>"
            		."</head>"
            		."<body>"
            		  ."<p>Please use the link below to reset your password:</p>"
            		  ."<a href='$URL'>$URL</a>"
            		  ."<p>Please do not reply to this message as the email is unmonitored.</p>"
            		."</body>"
            	  ."</html>";
		$headers = "MIME-Version: 1.0\r\n"
		          ."Content-type:text/html;charset=UTF-8\r\n"
                  ."From: <tutlegoss@tutlegoss.com>\r\n";

		mail($emailExists['Email'], $subject, $message, $headers);
		echo "<p class='kentYellow'>Email has been sent and will arrive shortly.</p>"
    		."<p class='kentYellow'>It may take up to 10 minutes for email to arrive.</p>"
    		."<p class='co-m'>REMEMBER: Check your spam folder if email doesn't appear!<p>"
    		."<p class='kentYellow'>No further action is needed on this page.</p>";
	}

	function validateEmail()
	{
		if($_POST) {
			global $conn;

			/* Check for existing email */
			$emailExists = $conn->prepare("SELECT * FROM Accounts WHERE Email = ?;");
			$emailExists->bindParam(1, $_POST["Email"], PDO::PARAM_STR, 24);
			$emailExists->execute();
			$emailExists = $emailExists->fetch(PDO::FETCH_ASSOC);

			/* Process reset password email */
			if($emailExists) {
				/* Check for existing ForgotPass entry */
				$forgotCheck = $conn->prepare("SELECT * FROM ForgotPass WHERE ID = ?;");
				$forgotCheck->bindParam(1, $emailExists['ID'], PDO::PARAM_STR, 16);
				$forgotCheck->execute();
				$forgotCheck = $forgotCheck->fetch(PDO::FETCH_ASSOC);
				/* Resent email */
				if($forgotCheck) {
					$URL = "https://www.tutlegoss.com/pages/Account/ResetPass.php?ext=" . $forgotCheck['ResetExt'];
					sendEmail($emailExists, $URL);
					return TRUE;
				}

				/* Create unique URL extention for user */
				$extMatch = TRUE;
				while($extMatch) {
					$ext = bin2hex(random_bytes(16));
					$extCheck = $conn->prepare("SELECT 1 FROM ForgotPass WHERE ResetExt = ?;");
					$extCheck->bindParam(1, $ext, PDO::PARAM_STR, 32);
					$extCheck->execute();
					$extCheck = $extCheck->fetch(PDO::FETCH_ASSOC);
					if(!$extCheck) {
						$extMatch = FALSE;
						$URL = "https://www.tutlegoss.com/pages/Account/ResetPass.php?ext=" . $ext;
					}
				}

				/* Associate unique URL extention with user's ID */
				$extInsert = $conn->prepare("INSERT INTO ForgotPass VALUES (?, ?);");
				$extInsert->bindParam(1, $emailExists['ID'], PDO::PARAM_STR, 16);
				$extInsert->bindParam(2, $ext, PDO::PARAM_STR, 32);

				/* Database error - stop processing */
				if($extInsert->execute() === FALSE) {
					echo "<p class='ml-4 co-m'>Database cannot be written to. Try again in a few minutes. Sorry.</p>";
					return FALSE;
				/* Send email */
				} else {
					sendEmail($emailExists, $URL);
					return TRUE;
				}
			}
			else {
				echo "<p class='kentYellow'>Email is not associated with an account.</p>";
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
