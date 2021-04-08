<?php

    session_start();
    ob_start();

    require_once("../../inc/php/validateLogin.inc.php");

	$article = "Login";
	require_once("../../inc/php/fringes/header.inc.php");
?>

</head>

<body>

	<?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

    <div class="container-fluid">
	    <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-8 col-lg-5">
    			<h3 class="heading">Log In</h3>
    			<hr>
			    <?php loggedIn(); validateLogin(); ?>
			    <form  id="accountForm" action="Login.php" method="POST">
                    <div class="form-group row">
                        <label for="Username" class="kentBlue col-3 col-form-label">Username</label>
                        <div class="col-xs-12 col-sm-9">
                            <input type="text" name="Username" id="Username" class="form-control" autofocus required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Password" class="kentYellow col-3 col-form-label">Password</label>
                        <div class="col-xs-12 col-sm-9">
                            <input type="password" name="Password" id="Password" class="form-control" pattern=".{8,30}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btnBlue">Submit</button>
                        </div>
                    </div>
                </form>
                <a href="./Forgot.php">Forgot Password?</a><span class="kentBlue"> | </span>
				<a href="./Signup.php">Sign Up</a>
		    </div>
	    </div>
    </div>

	<?php
		require_once("$headerData[Path]inc/php/fringes/footer.inc.php");
        ob_end_flush();
        require_once("$headerData[Path]inc/php/fringes/required.inc.php");
	?>

    <script src="<?php echo $headerData['Path']; ?>inc/js/disableSpaces.js"></script>

</body>
</html>
