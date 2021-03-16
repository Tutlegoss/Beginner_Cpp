<?php

    session_start();

	$article = "Catalogs";
	require_once("../../inc/php/Fringes/header.inc.php");

    $idNum = 0;
?>
	<title><?php echo $headerData["Title"]; ?></title>
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">

</head>

<body>

	<?php require_once("$headerData[Path]inc/php/Fringes/navbar.inc.php"); ?>

		<div class="container-fluid">
		<div class="row">
		<div id="article" class="col-12">
            <div class="row mt-3">
			    <h2 class="col-12 heading mt-3 text-center">Collection Catalog Directory</h2>
            </div>
            <div class="container mt-4 mb-4">

                <div class="d-flex justify-content-center">
                    <a href="./MarioFiguresCatalog.php" id="<?php echo "btn" . strval($idNum++) ?>" class="dirBtn dirBtnMarioGrn btn-push btn-push-MarioGrn mb-5" role="button">
                        Mario Figures Jakks <br>
                        Mario Figures World of Nintendo <br>
                        2.5-Inch <br>
                        4-Inch <br>
                        Dioramas
                    </a>
                </div>

                <div class="d-flex justify-content-center">
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
		</div>
		</div>

	<?php
		require_once("$headerData[Path]inc/php/Fringes/footer.inc.php");
	?>

</body>

</html>
