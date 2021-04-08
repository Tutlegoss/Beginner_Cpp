<?php

    session_start();

	$article = "Catalogs";
	require_once("../../inc/php/fringes/header.inc.php");

    $idNum = 0;
?>

</head>

<body id="topicsBkgnd">

    <?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

    <div class="container-fluid">
        <div class="row">
		    <h2 class="col-12 heading mt-3 text-center">Collection Catalog Directory</h2>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-11 col-sm-8 col-md-7 text-center">
                <a href="./MarioFiguresCatalog.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnMarioGrn btn-push btn-push-MarioGrn mb-5" role="button">
                    Mario Figures Jakks <br>
                    Mario Figures World of Nintendo <br>
                    2.5-Inch <br>
                    4-Inch <br>
                    Dioramas
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-11 col-sm-8 col-md-7 text-center">
                <a href="./MarioKartCatalog.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnMarioBlu btn-push btn-push-MarioBlu mb-5">
                    Hot Wheels Mario Kart <br>
                    Singles <br>
                    Gliders <br>
                    Yoshi Eggs <br>
                    Multi-Packs <br>
                    Mystery Boxes
                </a>
            </div>
        </div>
	</div>

    <?php
        require_once("$headerData[Path]inc/php/fringes/footer.inc.php");
        require_once("$headerData[Path]inc/php/fringes/required.inc.php");
    ?>

</body>
</html>
