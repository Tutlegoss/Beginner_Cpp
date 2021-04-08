<?php

    session_start();

	$article = "Mario Figures Catalog";
	require_once("../../inc/php/fringes/header.inc.php");

    $carouselIDCounter = 0;
?>

</head>

<body>

	<?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12">
			    <p class="text-center">
                    <span class="fontNintendo marioTitleSize">NINTENDO</span>
                </p>
            </div>
            <div class="col-12 mt-2">
                <p class="text-center fontSuperMario marioTitleSize">
                    <span class="mario-blu">S</span><span class="mario-ylw">U</span><span class="mario-red">P</span><span class="mario-grn">E</span><span class="mario-ylw">R</span>
                    <span class="mario-red">M</span><span class="mario-grn">A</span><span class="mario-ylw">R</span><span class="mario-blu">I</span><span class="mario-grn">O</span>
                    <span class="jakks-blu">J</span><span class="jakks-grn">A</span><span class="jakks-red">K</span><span class="jakks-blu">K</span><span class="jakks-grn">S</span>
                </p>
            </div>
        </div>

        <hr class="mariohr">

        <?php
            $JSONID = "marioFiguresCatalog";
            require_once("$headerData[Path]inc/php/marioCatalogCards.php");
        ?>

	</div>

    <?php
        require_once("$headerData[Path]inc/php/fringes/footer.inc.php");
        require_once("$headerData[Path]inc/php/fringes/required.inc.php");
    ?>

    <script src="<?php echo $headerData["Path"]; ?>inc/js/lazyImgLoad.js"></script>

</body>
</html>
