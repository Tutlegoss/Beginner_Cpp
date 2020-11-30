<?php

    session_start();

    if(isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == TRUE)
        header("Location: ../../index.php");

	function sendEmail($emailExists, $URL)
	{
		$subject = "Tutlegoss.com Password Reset";
		$message = "<html>";
		$message .= "<head>";
		$message .= "<title>Tutlegoss.com Password Reset</title>";
		$message .= "</head>";
		$message .= "<body>";
		$message .= "<p>Please use the link below to reset your password:</p>";
		$message .= "<a href='$URL'>$URL</a>";
		$message .= "<p>Please do not reply to this message as the email is unmonitored.</p>";
		$message .= "</body>";
		$message .= "</html>";
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8\r\n";
		$headers .= "From: <DoNotReplyTutlegoss@tutlegoss.com>\r\n";

		mail($emailExists['Email'], $subject, $message, $headers);
		echo "<p class='kentYellow ml-4'>Email has been sent and will arrive shortly.</p>";
		echo "<p class='kentYellow ml-4'>It may take up to 10 minutes for email to arrive.</p>";
		echo "<p class='co-m ml-4'>REMEMBER: Check your spam folder if email doesn't appear!<p>";
		echo "<p class='kentYellow ml-4'>No further action is needed on this page.</p>";
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
				echo "<p class='kentYellow ml-4'>Email is not associated with an account.</p>";
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	$article = "Kpp Forgot PW";
	require_once("../../inc/php/Fringes/header.inc.php");
?>
	<title><?php echo $headerData["Title"]; ?></title>
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">

</head>

<body>
	<?php require_once("$headerData[Path]inc/php/Fringes/navbar.inc.php"); ?>

	<div class="container-fluid">
	<div class="row">
	<div id="article" class="col-12">
		<div class="container d-flex h-100">
		<div class="row justify-content-center align-self-center mx-auto">
		<div class="col-11 col-md-12 mt-5 mt-md-0 mb-5 mb-md-0" id="accountTxt">
				<h3 class="heading">Forgot Password</h3>
				<hr>
				<?php if(validateEmail() === FALSE) { ?>
					<p>Enter your email and a link will be sent to reset your password.</p>

					<form action="Forgot.php" method="POST">
                        <div class="row mx-auto">
                            <div class="col-12 col-md-3">
                                <label class="kentYellow mt-2" for="Email">Email</label>
                            </div>
                            <div class="col-12 col-md-9 align-self-center">
                                <input class="fieldSize" type="email" name="Email"
                                       id="Email" placeholder="@kent.edu" autofocus required>
                           </div>
                       </div>
                        <button type="submit" class="btn btnBlue mt-4">Submit</button>
                    </form>

				<?php } ?>
			</div>
			</div>
			</div>
	</div>
	</div>
	</div>

	<?php
		require_once("$headerData[Path]inc/php/Fringes/footer.inc.php");
	?>

</body>
</html>
