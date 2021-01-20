<?php

    session_start();

	$article = "Connect 4";
	require_once("../inc/php/Fringes/header.inc.php");
?>
	<title><?php echo $headerData["Title"]; ?></title>
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">

</head>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Breakout</title>
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
<body style="background-color: #1a1a1a;">

    <?php require_once("../inc/php/Fringes/navbar.inc.php"); ?>

    <div class="container-fluid">
	<div class="row">
	<div id="article" class="col-12">
        <p id="playerTurn"></p>
        <div id="bdr">
            <div id="game"></div>
        </div>
    </div>
    </div>
    </div>


    <script src="./phaser/dist/phaser.min.js"></script>
    <script stc="./phaser/dist/phaser-arcade-physics.min.js"></script>
    <script src="./connect4.js"></script>
	<?php
		require_once("../inc/php/Fringes/footer.inc.php");
	?>
</body>
</html>
