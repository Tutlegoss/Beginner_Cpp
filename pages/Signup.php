<?php

    session_start();

    ob_start();

    function goToIndex()
    {
       header("Location: ../index.php");
    }

	function loggedIn()
	{
		if(isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == TRUE)
			goToIndex();
	}

	function validateSignup()
	{
		if($_POST) {
			global $conn;
			$invalidEntries = FALSE;

			/* Check for @kent.edu email address */
			$_POST["Email"] = strtolower($_POST["Email"]);
			if(strpos($_POST["Email"], "@kent.edu") === FALSE ||
			   preg_match("/^(.)*@kent.edu$/", $_POST["Email"]) == 0) {
				echo "<p class='kentYellow ml-4'>Invalid email. Please use @kent.edu email.</p>";
				$invalidEntries = TRUE;
			}

			/* Check for valid username combination */
			if(preg_match("/^\w{1,16}$/", $_POST["Username"]) == 0) {
				echo "<p class='kentYellow ml-4'>Invalid username. Please enter 1 to 16 alphanumeric characters, no spaces.</p>";
				$invalidEntries = TRUE;
			}

			/* Check for valid password combination */
			if(preg_match("/^.{8,30}$/", $_POST["Password"]) == 0) {
				echo "<p class='kentYellow ml-4'>Invalid password. Please enter 8 to 30 characters.</p>";
				$invalidEntries = TRUE;
			}

			/* Don't modify the HTML...rude */
			if($invalidEntries) {
				echo "<p class='co-m ml-4'>Please don't modify the HTML. Thank you.</p>";
			}

			/* Check for existing email */
			$signUpCheck = $conn->prepare("SELECT 1 FROM Accounts WHERE Email = ?;");
			$signUpCheck->bindParam(1, $_POST["Email"], PDO::PARAM_STR, 24);
			$signUpCheck->execute();
			$signUpCheck = $signUpCheck->fetch(PDO::FETCH_ASSOC);
			if($signUpCheck) {
				echo "<p class='kentYellow ml-4'>Email is already associated with an account.</p>";
				$invalidEntries = TRUE;
			}

			/* Check for existing username */
			$signUpCheck = $conn->prepare("SELECT 1 FROM Accounts WHERE Username = ?;");
			$signUpCheck->bindParam(1, $_POST["Username"], PDO::PARAM_STR, 16);
			$signUpCheck->execute();
			$signUpCheck = $signUpCheck->fetch(PDO::FETCH_ASSOC);
			if($signUpCheck) {
				echo "<p class='kentYellow ml-4'>Username is already taken.</p>";
				$invalidEntries = TRUE;
			}

			/* Don't process if any of the above checks are invalid */
			if($invalidEntries) {
				return $invalidEntries;
			}

			/* Create unique ID for user */
			$IDMatch = TRUE;
			while($IDMatch) {
				$ID = bin2hex(random_bytes(8));
				$signUpCheck = $conn->prepare("SELECT 1 FROM Accounts WHERE ID = ?;");
				$signUpCheck->bindParam(1, $ID, PDO::PARAM_STR, 16);
				$signUpCheck->execute();
				$signUpCheck = $signUpCheck->fetch(PDO::FETCH_ASSOC);
				if(!$signUpCheck)
					$IDMatch = FALSE;
			}

			/* Hash password */
			$argonHash = password_hash($_POST['Password'], PASSWORD_ARGON2ID);

			/* Insert account into the database */
			$accountInsert = $conn->prepare("INSERT INTO Accounts VALUES (?, ?, ?, ?, 'Student');");
			$accountInsert->bindParam(1, $ID, PDO::PARAM_STR, 16);
			$accountInsert->bindParam(2, $_POST["Username"], PDO::PARAM_STR, 16);
			$accountInsert->bindParam(3, $argonHash, PDO::PARAM_STR, 128);
			$accountInsert->bindParam(4, $_POST["Email"], PDO::PARAM_STR, 16);
			if($accountInsert->execute())
				header("Location: ./Login.php");
			else
				echo "<p class='ml-4 co-m'>Failure to create account. Try again or contact Landen at Lmarchan@kent.edu</p>";
		}
		return;
	}

	$article = "Kpp Signup";
	require_once("../inc/header.inc.php");
?>
	<title><?php echo $headerData["Title"]; ?></title>
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">

</head>

<body>
	<?php require_once("../inc/navbar.inc.php"); ?>

	<div class="container-fluid">
	<div class="row">
	<div id="article" class="col-12">
		<div class="container d-flex h-100">
			<div class="row justify-content-center align-self-center mx-auto">
				<div class="col-11 col-sm-12 mt-5 mt-md-0 mb-5 mb-md-0" id="accountTxt">
					<h3 class="heading">Sign Up</h3>
					<hr>
					<p>Accounts are currently for Kent State students only.</p>
					<?php loggedIn(); validateSignup() ?>
					<form action="Signup.php" method="POST">
                        <div class="row mx-auto">
                            <div class="col-12 col-md-3">
                                <label class="kentYellow mt-2" for="Email">Email</label>
                            </div>
                            <div class="col-12 col-md-9 align-self-center">
                                <input class="fieldSize" type="email" name="Email" id="Email"
                                       pattern="^(.)*@kent.edu$" placeholder="@kent.edu required" required>
                           </div>
                        </div>
                        <div class="row mx-auto">
                            <div class="col-12 col-md-3 mt-2 mt-md-0">
                                <label class="kentBlue mt-2" for="Username">Username</label>
                            </div>
                            <div class="col-12 col-md-9 align-self-center">
                                <input class="fieldSize" type="text" name="Username" id="Username" minlength="1"
                                    maxlength="16" pattern="^\w{1,16}$" placeholder="1-16 Alphanums|No spaces" required>
                            </div>
                        </div>
                        <div class="row mx-auto">
                            <div class="col-12 col-md-3 mt-2 mt-md-0">
                                <label class="mt-2" for="Password">Password</label>
                            </div>
                            <div class="col-12 col-md-9 align-self-center">
                                <input class="fieldSize" type="password" name="Password" id="Password"
                                     minlength="1" maxlength="30" pattern=".{8,30}" placeholder="8-30 Chars" required>
                            </div>
                          </div>
    					<button class="btn btnBlue mt-4" type="submit" id="newAcct">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>

	<?php
		require_once("../inc/footer.inc.php");

        ob_end_flush();
	?>

</body>
</html>

<script>
/* https://stackoverflow.com/questions/14236873/disable-spaces-in-input-and-allow-back-arrow */
	$(document).ready(function() {
		$('#Username').on({
			keydown: function(e) {
				if(e.which === 32)
					return false;
			},
			change: function() {
				this.value = this.value.replace(/\s/g, "");
			}
		});
	});
</script>
