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
    			    <p class="text-center looneyTunesFont mario-ylw" style="font-size: 2.5rem; margin-bottom: -1rem;">
                        Looney Tunes
                    </p>
                </div>
                <div class="col-12 mt-2">
                    <p class="text-center creepsterFont jakks-red" style="font-size: 2.5rem;">
                        Gossamer
                    </p>
                </div>
            </div>

            <hr class="mariohr">

            <?php
                $JSONID = "MarioKartCatalog";
                require_once("$headerData[Path]inc/php/MarioCatalogCards.php");
            ?>

            <hr class="mariohr">

            <div class="row">
                <div class="col-auto mt-4 mb-4 mx-auto">
                    <p class="text-center p-2 mx-auto"  style="background-color: var(--blk); width: fit-content;">
                        <i class="mario-grn fas fa-flag-checkered"></i>: Own
                        <br>
                        <i class="mario-red fas fa-flag"></i>: Don't Own
                        <br>
                        <i class="co-sdw fas fa-car-crash"></i>: Doesn't Exist
                    </p>
                    <table class="table table-responsive text-center" id="marioVersTable">
                        <thead>
                            <tr class="text-center marioCheckTableImg">
                                <th><span class="mario-blu"><span class="mario-blu">C</span><span class="mario-ylw">H</span><span class="mario-red">A</span><span class="mario-grn">R</span><span class="mario-ylw">S</span></span></th>
                                <th class="marioKartNameSdw">Kart</th>
                                <th><img src="<?php echo "$headerData[Path]/img/NoSymbol.jpg"; ?>"></th>
                                <th><img src="<?php echo "$headerData[Path]/img/TOTY.jpg"; ?>"></th>
                                <th><img src="<?php echo "$headerData[Path]/img/3Plus.jpg"; ?>"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="2"><span class="marioKartNameSdw" style="color: rgb(161 23 23)">Mario</span></td>
                                <td class="marioKartNameSdw">Standard</td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                            </tr>
                            <tr>
                                <td class="marioKartNameSdw">P-Wing</td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="1"><span class="marioKartNameSdw" style="color: rgb(128 39 23)">Tanooki<br>Mario</span>
                                <td class="marioKartNameSdw">Standard</td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="mario-red fas fa-flag"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="1"><span class="marioKartNameSdw" style="color: rgb(158 20 20)">Baby<br>Mario</span></td>
                                <td class="marioKartNameSdw">B-Dasher</td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="3"><span class="marioKartNameSdw" style="color: rgb(71 113 39)">Luigi</span></td>
                                <td class="marioKartNameSdw">Standard</td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="mario-red fas fa-flag"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td class="marioKartNameSdw">Mach 8</td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="mario-red fas fa-flag"></i></td>
                                <td><i class="mario-red fas fa-flag"></i></td>
                            </tr>
                            <tr>
                                <td class="marioKartNameSdw">Circuit</td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="2"><span class="marioKartNameSdw" style="color: rgb(202 157 37)">Toad</span></td>
                                <td class="marioKartNameSdw">Standard</td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="mario-red fas fa-flag"></i></td>
                            </tr>
                            <tr>
                                <td class="marioKartNameSdw">Sneaker</td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="mario-red fas fa-flag"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="2"><span class="marioKartNameSdw" style="color: rgb(193 67 89)">Peach</span></td>
                                <td class="marioKartNameSdw">Standard</td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td class="marioKartNameSdw">P-Wing</td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="1"><span class="marioKartNameSdw" style="color: rgb(79 111 100)">Rosalina</span></td>
                                <td class="marioKartNameSdw">Standard</td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="4"><span class="marioKartNameSdw" style="color: rgb(81 106 51)">Yoshi</span></td>
                                <td class="marioKartNameSdw">Standard</td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td class="marioKartNameSdw">B-Dasher</td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td class="marioKartNameSdw">mach 8</td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td class="marioKartNameSdw">Pipe Frame</td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="1"><span class="marioKartNameSdw" style="color: rgb(175 39 25)">Red Yoshi</span></td>
                                <td class="marioKartNameSdw">Standard</td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="1"><span class="marioKartNameSdw" style="color: rgb(59 100 131)">Light Blue Yoshi</span></td>
                                <td class="marioKartNameSdw">Standard</td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="1"><span class="marioKartNameSdw" style="color: rgb(103 35 74)">Wario</span></td>
                                <td class="marioKartNameSdw">Standard</td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="1"><span class="marioKartNameSdw" style="color: rgb(100 42 78)">Waluigi</span></td>
                                <td class="marioKartNameSdw">Bandwagon</td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="1"><span class="marioKartNameSdw" style="color: rgb(138 71 18)">Bowser</span></td>
                                <td class="marioKartNameSdw">Bandwagon</td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="2"><span class="marioKartNameSdw" style="color: rgb(107 32 27)">Shy Guy</span></td>
                                <td class="marioKartNameSdw">Standard</td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td class="marioKartNameSdw">B-Dasher</td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="1"><span class="marioKartNameSdw" style="color: rgb(61 86 31)">Koopa Troopa</span></td>
                                <td class="marioKartNameSdw">Circuit Special</td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="1"><span class="marioKartNameSdw" style="color: rgb(128 128 128)">Dry Bones</span></td>
                                <td class="marioKartNameSdw">Circuit Special</td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="2"><span class="marioKartNameSdw" style="color: rgb(138 68 32)">Donkey Kong</span></td>
                                <td class="marioKartNameSdw">Standard</td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td class="marioKartNameSdw">Sports Coupe</td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                            <tr>
                                <td rowspan="1"><span class="marioKartNameSdw" style="color: rgb(88 45 29)">Diddy Kong</span></td>
                                <td class="marioKartNameSdw">Pipe Frame</td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                                <td><i class="mario-grn fas fa-flag-checkered"></i></td>
                                <td><i class="co-sdw fas fa-car-crash"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

		</div>
		</div>
		</div>

	<?php
		require_once("$headerData[Path]inc/php/Fringes/footer.inc.php");
	?>

<script src="<?php echo $headerData["Path"]; ?>inc/js/lazyImgLoad.js"></script>

</body>

</html>
