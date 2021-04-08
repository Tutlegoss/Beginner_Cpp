<?php

    session_start();
    ob_start();

    require_once("../../inc/php/resetPass.inc.php");

	$article = "Reset PW";
	require_once("../../inc/php/fringes/header.inc.php");
?>

</head>

<body>

	<?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

	<div class="container-fluid">
	    <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-8 col-lg-5">
        		<h3 class="heading">Reset Password</h3>
        		<hr>
                <?php if(resetPassword() === FALSE) { ?>
                    <p>Enter your new password, please.</p>
                    <form id="accountForm" action="ResetPass.php" method="POST">
                        <div class="form-group-row">
                            <label for="Password" class="kentYellow col-3 col-form-label">New Password</label>
                            <div class="col-xs-12 col-sm-9">
                                <input type="password" name="Password" id="Password" class="form-control" pattern=".{8,30}" placeholder="8-30 Chars" autofocus required>
                            </div>
                        </div>
                        <div class="form-group-row">
                            <label for="PasswordVerify" class="kentYellow col-3 col-form-label">New Password</label>
                            <div class="col-xs-12 col-sm-9">
                                <input type="password" name="PasswordVerify" id="PasswordVerify" class="form-control" pattern=".{8,30}" placeholder="8-30 Chars" autofocus required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btnBlue">Submit</button>
                            </div>
                        </div>
                        <input type="hidden" id="ext" name="ext"
                               value="<?php
                                    if(isset($_GET['ext']))
                                        echo "$_GET[ext]";
                                    else if(isset($_POST['ext']))
                                        echo "$_POST[ext]";
                                    else
                                        echo ""; ?>"
                                >
                    </form>
                <?php } ?>
		    </div>
	    </div>
    </div>

	<?php
		require_once("$headerData[Path]inc/php/fringes/footer.inc.php");
        ob_end_flush();
        require_once("$headerData[Path]inc/php/fringes/required.inc.php");
	?>

</body>
</html>
