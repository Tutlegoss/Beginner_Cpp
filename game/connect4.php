<?php

    session_start();

	$article = "Connect 4";
	require_once("../inc/php/fringes/header.inc.php");
?>

    <style>
        #bdr {
            margin: 20px auto;
            border: 10px solid black;
            width:  820px;
            height: 621px;
        }
        #playerTurn {
            visibility: hidden;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            margin: auto;
            color: white;
            width: 175px;
            border: 2px inset #4994cb;
            background-color: rgb(105 134 209 / 0.6);
            text-align: center;
        }
    </style>

</head>

<body>

    <?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

    <div class="container-fluid">
       <div class="row">
            <div class="col-12">
                <p id="playerTurn"></p>
                <div id="bdr">
                    <div id="game"></div>
                </div>
            </div>
        </div>
    </div>

	<?php
		require_once("../inc/php/fringes/footer.inc.php");
        require_once("../inc/php/fringes/required.inc.php");
	?>

    <script src="./phaser/dist/phaser.min.js"></script>
    <script stc="./phaser/dist/phaser-arcade-physics.min.js"></script>
    <script src="./connect4.js"></script>

</body>
</html>
