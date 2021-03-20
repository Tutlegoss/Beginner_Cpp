<?php

    session_start();

	$article = "Mario Figures Catalog";
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
                    <h2 class="text-center superMario marioTitleSize">
                        <span class="mario-blu">S</span><span class="mario-ylw">U</span><span class="mario-red">P</span><span class="mario-grn">E</span><span class="mario-ylw">R</span>
                        <span class="mario-red">M</span><span class="mario-grn">A</span><span class="mario-ylw">R</span><span class="mario-blu">I</span><span class="mario-grn">O</span>
                        <span class="jakks-blu">J</span><span class="jakks-grn">A</span><span class="jakks-red">K</span><span class="jakks-blu">K</span><span class="jakks-grn">S</span>
                    </h2>
                </div>
            </div>

            <hr class="mariohr">

            <?php
                $JSONID = "MarioFiguresCatalog";
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
