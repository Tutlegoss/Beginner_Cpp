<?php

    session_start();
    ob_start();

    function goToIndex()
    {
       header("Location: ../../index.php");
    }

	function loggedIn()
	{
		if(isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == TRUE)
			goToIndex();
	}

	function validateLogin()
	{
		if($_POST) {
			global $conn;

			/* See if username exists and verify password */
			$accountCheck = $conn->prepare("SELECT * FROM Accounts WHERE Username = ?;");
			$accountCheck->bindParam(1, $_POST["Username"], PDO::PARAM_STR, 16);
			$accountCheck->execute();
			$accountCheck = $accountCheck->fetch(PDO::FETCH_ASSOC);
			/* Retry login */
			if(!$accountCheck || !password_verify($_POST['Password'],$accountCheck['Password']))
            {
				echo "<p class='kentYellow ml-4'>There is an issue with Username and/or Password.</p>";
				return FALSE;
			}
			/* Populate $_SESSION - session_start() in header.inc.php */
			else {
				$_SESSION['LoggedIn']  = TRUE;
				$_SESSION['Username']  = $accountCheck['Username'];
				$_SESSION['Privilege'] = $accountCheck['Privilege'];
				$_SESSION['ID']        = $accountCheck['ID'];
                $_SESSION['IP']        = $_SERVER['REMOTE_ADDR'];

				goToIndex();
			}
		}
	}

	$article = "Kpp Login";
	require_once("../../inc/php/Fringes/header.inc.php");
?>
	<title><?php echo $headerData["Title"]; ?></title>
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">

</head>

<body>

	<?php require_once("$headerData[Path]inc/php/Fringes/navbar.inc.php"); ?>

	<div class="d-flex justify-content-center" id="article">
        <div class="my-auto" id="accountTxt">
			<h3 class="heading">Log In</h3>
			<hr>
			<?php loggedIn(); validateLogin(); ?>
			<form action="Login.php" method="POST">
                <div class="row mx-auto">
                    <div class="col-12 col-md-3">
                        <label class="mt-2 kentBlue" for="Username">Username</label>
                    </div>
                    <div class="col-10 col-md-8 align-self-center ml-md-auto">
                        <input class="fieldSize" type="text" name="Username" id="Username" autofocus required>
                   </div>
                </div>
                <div class="row mx-auto">
                    <div class="col-12 col-md-3 mt-2 mt-md-0">
                        <label class="mt-2 kentYellow" for="Password">Password</label>
                    </div>
                    <div class="col-10 col-md-8 align-self-center ml-md-auto">
                        <input class="fieldSize" type="password" name="Password" id="Password" pattern=".{8,30}" required>
                    </div>
                  </div>
                <button type="submit" class="btn btnBlue mt-4">Submit</button>
				<br>
				<br>
				<a href="./Forgot.php">Forgot Password?</a><span class="kentYellow"> | </span>
				<a href="./Signup.php">Sign Up</a>
            </form>
		</div>
	</div>

	<?php
		require_once("$headerData[Path]inc/php/Fringes/footer.inc.php");

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
