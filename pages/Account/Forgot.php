<?php

    session_start();

    if(isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == TRUE)
        header("Location: ../../index.php");

    require_once("../../inc/php/sendEmail.inc.php");

	$article = "Forgot PW";
	require_once("../../inc/php/fringes/header.inc.php");
?>

</head>

<body>

    <?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

    <div class="container-fluid">
    	<div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-8 col-lg-5">
    			<h3 class="heading">Forgot Password</h3>
    			<hr>
    			<?php if(validateEmail() === FALSE) { ?>
    				<p>Enter your email and a link will be sent to reset your password.</p>
                    <form  id="accountForm" action="Forgot.php" method="POST">
                        <div class="form-group row">
                            <label for="Email" class="kentYellow col-3 col-form-label">Email</label>
                            <div class="col-xs-12 col-sm-9">
                                <input type="email" name="Email" id="Email" class="form-control" placeholder="Email" autofocus required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12 col-sm-9">
                                <button type="submit" class="btn btnBlue">Submit</button>
                            </div>
                        </div>
                    </form>
    			<?php } ?>
            </div>
    	</div>
    </div>

	<?php
        require_once("$headerData[Path]inc/php/fringes/footer.inc.php");
        require_once("$headerData[Path]inc/php/fringes/required.inc.php");
    ?>

</body>
</html>
