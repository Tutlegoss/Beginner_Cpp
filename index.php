<?php

    session_start();

	$article = "Tutlegoss Home";
	require_once("./inc/php/Fringes/header.inc.php");
?>
	<title><?php echo $headerData["Title"]; ?></title>
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">

</head>

<body>

	<?php require_once("./inc/php/Fringes/navbar.inc.php"); ?>

	<div class="container-fluid">
	<div class="row">
	<div id="article" class="col-12">

		<div class="row d-flex justify-content-center">

        </div>
	</div> <!-- End Article -->
	</div>
	</div>

	<?php
		require_once("./inc/php/Fringes/footer.inc.php");
	?>

</body>
</html>
