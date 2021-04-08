<?php

    session_start();
    ob_start();

    require_once("../../inc/php/validateSignup.inc.php");

	$article = "Signup";
	require_once("../../inc/php/fringes/header.inc.php");
?>

</head>

<body>

	<?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

    <div class="container-fluid">
    	<div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-8 col-lg-5">
                <h3 class="heading">Sign Up</h3>
                <hr>
                <?php loggedIn(); validateSignup(); ?>
                <form  id="accountForm" action="Signup.php" method="POST">
                    <div class="form-group row">
                        <label for="Email" class="kentYellow col-3 col-form-label">Email</label>
                        <div class="col-xs-12 col-sm-9">
                            <input type="email" name="Email" id="Email" class="form-control" placeholder="" autofocus required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Username" class="kentBlue col-3 col-form-label">Username</label>
                        <div class="col-xs-12 col-sm-9">
                            <input type="text" name="Username" id="Username" class="form-control" pattern=".{8,30}" placeholder="8-30 Chars" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Password" class="col-3 col-form-label">Password</label>
                        <div class="col-xs-12 col-sm-9">
                            <input type="password" name="Password" id="Password" class="form-control" minlength="8" maxlength="30" pattern=".{8,30}" placeholder="8-30 Chars" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-12 col-sm-9">
                            <button type="submit" class="btn btnBlue">Submit</button>
                        </div>
                    </div>
                </form>
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
