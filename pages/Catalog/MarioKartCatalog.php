<?php

    session_start();

	$article = "Mario Kart Catalog";
	require_once("../../inc/php/Fringes/header.inc.php");

    $carouselIDCounter = 0;
?>
	<title><?php echo $headerData["Title"]; ?></title>
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">

</head>

<body>

	<?php require_once("$headerData[Path]inc/php/Fringes/navbar.inc.php"); ?>

		<div class="container-fluid">
		<div class="row">
		<div id="article" class="col-12">
            <div class="row mt-5">
                <div class="col-12">
    			    <h2 class="text-center">
                        <span class="nintendoFont marioTitleSize">NINTENDO</span>
                    </h2>
                </div>
                <div class="col-12 mt-2">
                    <h2 class="text-center marioKart marioTitleSize marioKartTxtShade">
                        Super Mario Kart
                    </h2>
                </div>
            </div>

            <hr class="mariohr">

            <?php
                $JSONID = "MarioKartCatalog";
                require_once("$headerData[Path]inc/php/MarioCatalogCards.php");
            ?>

		</div>
		</div>
		</div>

	<?php
		require_once("$headerData[Path]inc/php/Fringes/footer.inc.php");
	?>

<script src="<?php echo $headerData["Path"]; ?>inc/js/lazyImgLoad.js"></script>

</body>

</html>
