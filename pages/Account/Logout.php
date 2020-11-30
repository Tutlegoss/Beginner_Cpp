<?php

    session_start();
    ob_start();

	function logout()
	{
		if(isset($_SESSION['LoggedIn']) && $_SESSION == TRUE) {
			echo "<h3 class='heading'>Logging Out</h3>";
			echo "<hr>";
			echo "<p class='kentYellow'>Logging out of session. Redirecting to the home page...";
            $_SESSION = [];
            session_unset();
			session_destroy();
		}
		else {
			echo "<h3 class='heading'>Not Signed In</h3>";
			echo "<hr>";
			echo "<p class='kentYellow'>You aren't currently signed in. Redirecting to the home page...";
		}
	}

	$article = "Kpp Logout";
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
				<div class="col-11 col-md-12" id="accountTxt">
					<?php logout() ?>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>

	<?php
		require_once("$headerData[Path]inc/php/Fringes/footer.inc.php");
		header("refresh: 2; url='$headerData[Path]index.php'");
        ob_end_flush();
	?>

</body>
</html>
