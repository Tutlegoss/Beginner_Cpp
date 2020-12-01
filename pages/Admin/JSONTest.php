<?php

    session_start();

    if(!($_SESSION) || empty($_SESSION) || ($_SESSION['Privilege'] == "Student"))
        header("Location: ../../index.php");

	$article = "JSON Test";

	require_once("../../inc/php/Fringes/header.inc.php");
?>
	<title><?php echo $headerData["Title"]; ?></title>
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">

</head>

<body>

	<?php require_once("$headerData[Path]inc/php/Fringes/navbar.inc.php"); ?>

	<div class="container-fluid">
	<div class="row">
	<div id="article" class="col-12">
		<?php
            require_once("$headerData[Path]inc/php/quiz.php");
            echo "<script>var numQuestions = $numQuestions; var fn = '$fn'; var path = '$headerData[Path]';</script>";
        ?>
	</div> <!-- End Article -->
	</div>
	</div>

	<?php
		require_once("$headerData[Path]inc/php/Fringes/footer.inc.php");
	?>

<script src="<?php echo $headerData['Path']; ?>inc/js/quiz.js"?></script>
</body>
</html>
