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

	<div class="d-flex justify-content-center" id="article">
        <div class="my-auto" id="accountTxt">
			<?php logout() ?>
		</div>
	</div>

	<?php
		require_once("$headerData[Path]inc/php/Fringes/footer.inc.php");
		header("refresh: 2; url='$headerData[Path]index.php'");
        ob_end_flush();
	?>

</body>
</html>
