<?php

    session_start();

	$article = "Catalog Test";
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

			<div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h3 class="snes ml-4">4-Inch Figures</h3>
                </div>
            </div>

            <div class="container marioCtnrBtm">
                <div class="row">
                    <div class="col-12 col-lg-6 mt-4 mt-lg-0 align-self-center">
                        <div id="controls<?php echo $carouselIDCounter; ?>" class="carousel slide carousel-fade" data-interval="false">
                          <div class="carousel-inner" >
                            <div class="carousel-item active text-center">
                                <a href="../../img/CatalogImgs/4_BooCoin.JPG">
                                    <img src="../../img/CatalogImgs/4_BooCoin.JPG" class="marioImgSize"  alt="4_BooCoin">
                                </a>
                            </div>
                            <div class="carousel-item text-center">
                                <a href="../../img/CatalogImgs/4_BooCoinReverse.JPG">
                                    <img src="../../img/CatalogImgs/4_BooCoinReverse.JPG" class="marioImgSize" alt="4_BooCoinReverse">
                                </a>
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#controls<?php echo $carouselIDCounter; ?>" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#controls<?php echo $carouselIDCounter++; ?>" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 mt-4 mt-lg-0 align-self-center">
                        <h3 class="text-center superMario mt-2 marioHeader">Boo with Coin</h3>
                        <table class="table table-dark table-striped marioTable">
                            <tbody>
                                <tr class="jakks-grn marioTableGrn">
                                    <th> Price : </th>
                                    <td> <span class="jakks-grn">$</span>12.99 </td>
                                </tr>
                                <tr class="mario-ylw marioTableYlw">
                                    <th> Location : </th>
                                    <td> Books-a-Million </td>
                                </tr>
                                <tr class="mario-blu marioTableBlu">
                                    <th> Date : </th>
                                    <td> 2021, March, 05 </td>
                                </tr>
                                <tr class="mario-red">
                                    <th> Notes : </th>
                                    <td> NULL </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="container marioCtnrBtm">
                <div class="row mb-4">
                    <div class="col-12 col-lg-6 mt-4 mt-lg-0 align-self-center">
                        <div id="controls<?php echo $carouselIDCounter; ?>" class="carousel slide carousel-fade" data-interval="false">
                            <div class="carousel-inner" >
                                <div class="carousel-item active text-center">
                                    <a href="../../img/CatalogImgs/Minis_AdIconsAll.JPG">
                                        <img src="../../img/CatalogImgs/Minis_AdIconsAll.JPG" class="" style="width: 70%;" alt="Ad Icons Minis">
                                    </a>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#controls<?php echo $carouselIDCounter; ?>" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#controls<?php echo $carouselIDCounter++; ?>" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 mt-4 mt-lg-0 align-self-center">
                        <h3 class="text-center superMario mt-2 marioHeader">Ad Icons Mystery Minis</h3>
                        <table class="table table-dark table-striped marioTable">
                            <tbody>
                                <tr class="jakks-grn marioTableGrn">
                                    <th> Price : </th>
                                    <td> <span class="jakks-grn">$</span>12.99 </td>
                                </tr>
                                <tr class="mario-ylw marioTableYlw">
                                    <th> Location : </th>
                                    <td> Books-a-Million </td>
                                </tr>
                                <tr class="mario-blu marioTableBlu">
                                    <th> Date : </th>
                                    <td> 2021, March, 05 </td>
                                </tr>
                                <tr class="mario-red">
                                    <th> Notes : </th>
                                    <td> Test for long text. <br> Another line <br> Third line </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
