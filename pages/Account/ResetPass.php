<?php

    session_start();
    ob_start();

	function retryLink()
	{
		echo "<p class='ml-4 kentYellow'>URL is malformed. Please click the link from your email again.</p>";
		echo "<p class='ml-4 kentYellow'>If this message appears again,<br> please request a new email here: ";
		echo "<a href='./Forgot.php'>Forgot Password</a></p>";
	}

	/*
		Return FALSE to keep form (password wasn't successfully reset / minor error)
	    Return TRUE  to erase form (password reset successful / major error)
	*/
	function resetPassword()
	{
		global $conn;

		/* Can't access page directly */
		if(!$_POST && !isset($_GET['ext'])) {
			echo "<p class='ml-4 kentYellow'>No valid reset password configuration found. Redirecting to login...</p>";
			header("refresh: 2; url='./login.php'");
			return TRUE;
		}

		/* Ensure link is valid */
		if(isset($_GET['ext'])) {
			$extMatch = $conn->prepare("SELECT * FROM ForgotPass WHERE ResetExt = ?;");
			$extMatch->bindParam(1, $_GET['ext'], PDO::PARAM_STR, 32);
			$extMatch->execute();
			$extMatch = $extMatch->fetch(PDO::FETCH_ASSOC);

			if(!$extMatch) {
				echo "<p class='ml-4 kentYellow'>Link is no longer valid.</p>";
				echo "<p class='ml-4 kentYellow'>Go to <a href='Forgot.php'>Forgot Password</a> to restart the process.</p>";
				return TRUE;
			}
			else {
				return FALSE;
			}
		}

		if($_POST) {
			/* URL contains ext argument */
			if(isset($_POST['ext']) && !empty($_POST['ext'])) {
				/* Compare password fields */
				if($_POST['Password'] === $_POST['PasswordVerify']) {
					/* Verify ext matches user's ID */
					$extMatch = $conn->prepare("SELECT * FROM ForgotPass WHERE ResetExt = ?;");
					$extMatch->bindParam(1, $_POST['ext'], PDO::PARAM_STR, 32);
					$extMatch->execute();
					$extMatch = $extMatch->fetch(PDO::FETCH_ASSOC);

					if($extMatch) {
						/* Update user account */
						$argonHash = password_hash($_POST['Password'], PASSWORD_ARGON2ID);

						$updateAccount = $conn->prepare("UPDATE Accounts SET Password = ? WHERE ID = ?;");
						$updateAccount->bindParam(1, $argonHash, PDO::PARAM_STR, 128);
						$updateAccount->bindParam(2, $extMatch['ID'], PDO::PARAM_STR, 128);
						if($updateAccount->execute()) {
							/* Delete ForgotPass record */
							$delExt = $conn->prepare("DELETE FROM ForgotPass WHERE ResetExt = ?;");
							$delExt->bindParam(1, $_POST['ext'], PDO::PARAM_STR, 32);
							if($delExt->execute()) {
								echo "<p class='ml-4 kentYellow'>Password updated! Click below to log in or leave page.</p>";
								echo "<p><a class='ml-4' href='./Login.php'>Login</a></p>";
								return TRUE;
							}
							/* Password updated but record not deleted from ForgotPass - Delete manually */
							else {
								error_log("$extMatch[ID] changed password but ForgotPass record not deleted!", 1, "Lmarchan@kent.edu");
								echo "<p class='ml-4 kentYellow'>Password updated! Click below to log in or leave page.</p>";
								echo "<p><a href='./Login.php'>Login</a></p>";
								return TRUE;
							}
						}
						/* Could not update password */
						else {
							retryLink();
							return TRUE;
						}
					}
					/* No ext match */
					else {
						retryLink();
						return TRUE;
					}
				}
				/* Passwords do not match */
				else {
					echo "<p class='ml-4 kentYellow'>Passwords do not match. Please retry.</p>";
					return FALSE;
				}
			}
			/* Malformed URL */
			else {
				retryLink();
				return TRUE;
			}
		}
		else {
			return FALSE;
		}
	}

	$article = "Kpp Reset PW";
	require_once("../../inc/php/Fringes/header.inc.php");
?>
	<title><?php echo $headerData["Title"]; ?></title>
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">

</head>

<body>
	<?php require_once("$headerData[Path]inc/php/Fringes/navbar.inc.php"); ?>

	<div class="d-flex justify-content-center" id="article">
        <div class="my-auto" id="accountTxt">
    		<h3 class="heading">Reset Password</h3>
    		<hr>
            <?php if(resetPassword() === FALSE) { ?>
                <p>Enter your new password, please.</p>
                <form action="" method="POST">
                    <div class="row mx-auto">
                        <div class="col-12 col-md-3">
                            <label class="kentYellow mt-2" for="Email">New Password</label>
                        </div>
                        <div class="col-12 col-md-9 align-self-center">
                            <input class="fieldSize" type="password" name="Password"
                                   id="Password" pattern=".{8,30}" placeholder="8-30 Chars" autofocus required>
                       </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-12 col-md-3 mt-2 mt-md-0">
                            <label class="kentBlue mt-2" for="Username">Re-Enter Password</label>
                        </div>
                        <div class="col-12 col-md-9 align-self-center">
                            <input class="fieldSize" type="password" name="PasswordVerify"
                                   id="PasswordVerify" pattern=".{8,30}" required>
                        </div>
                    </div>
                    <input type="hidden" id="ext" name="ext"
                           value=<?php
                                        if(isset($_GET['ext']))
                                            echo "$_GET[ext]";
                                        else if(isset($_POST['ext']))
                                            echo "$_POST[ext]";
                                        else
                                            echo ""; ?>>
                    <button type="submit" class="btn btnBlue mt-4">Submit</button>
                </form>
            <?php } ?>
		</div>
	</div>

	<?php
		require_once("$headerData[Path]inc/php/Fringes/footer.inc.php");

        ob_end_flush();
	?>

</body>
</html>
