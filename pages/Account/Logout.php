<?php

    session_start();
    ob_start();

    require_once("../../inc/php/logout.inc.php");

	$article = "Logout";
	require_once("../../inc/php/fringes/header.inc.php");
?>

</head>

<body>
	<?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

	<div class="container-fluid">
    	<div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-8 col-lg-5" id="accountTxt">
			    <?php logout() ?>
            </div>
		</div>
	</div>

	<?php
		require_once("$headerData[Path]inc/php/fringes/footer.inc.php");
		header("refresh: 5; url='$headerData[Path]index.php'");
        ob_end_flush();
	?>

</body>
</html>
