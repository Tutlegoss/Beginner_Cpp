<?php

    session_start();

	$article = "Kpp Main Page";
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
		<div class="rounded-0" id="banner">
			<p class="my-auto">C++ Supplement</p>
		</div>
		<div class="row d-flex justify-content-center">
            <div class="col-12 text-center mt-3">
                <h5 class="kentYellow">This website is not complete and is an ongoing project. The souce code is on github at
                <a href="https://github.com/Tutlegoss/Beginner_Cpp">Github</a>.</h5>
            </div>
        </div>
	</div> <!-- End Article -->
	</div>
	</div>

	<?php
		require_once("./inc/php/Fringes/footer.inc.php");
	?>

</body>
</html>
