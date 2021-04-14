<?php

    session_start();
    ob_start();

	$article = "Data Warning";
	require_once("../../inc/php/fringes/header.inc.php");
?>

</head>

<body>
	<?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

	<div class="container-fluid">
    	<div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-8 col-lg-5">
                <h3 class="heading">Image Size Warning</h3>
                <hr>
                <h5 class="kentYellow">Jakks Mario figure photos are NOT compressed. Over <span class="co-r">44MB</span>
                    may be transfered to your device. The images are full-quality from an iPhone 6, and will eventually be compressed. To compare,
                    the Hot Wheels Mario Kart page has 58 photos at 13MB, and this page only has 24 photos. Would you
                    like to continue to the page? Pressing <span class="co-r">NO</span> will redirect to the Collection Catalog Menu.
                </h5>
                <a class="btn btnBlue mt-4" href="./MarioFiguresCatalog.php" role="button">Go To Page</a>
                <a class="btn cancel ml-3 mt-4" href="./Catalogs.php" role="button">NO</a>
            </div>
		</div>
	</div>

	<?php
		require_once("$headerData[Path]inc/php/fringes/footer.inc.php");
        require_once("$headerData[Path]inc/php/fringes/required.inc.php");
        ob_end_flush();
	?>

</body>
</html>
