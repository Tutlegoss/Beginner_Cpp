<?php

    session_start();

	$article = "C++ Topics";
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
			<h2 class="heading mt-3 text-center">C++ PDFs - Need Reviewed/Updated</h2>
			<div class="row mt-5 mx-auto mb-5 csLinks">
				<div class="col-12 mb-2 mb-md-0 col-md-4">
					<button type="button" class="btn-push mr-2 testingButton">Types</button>
					<button type="button" class="btn btnBlue btn-block mr-2">Variables</button>
					<button type="button" class="btn btnBlue btn-block mr-2">If/Else If/Else</button>
					<button type="button" class="btn btnBlue btn-block mr-2">Switch</button>
					<button type="button" class="btn btnBlue btn-block mr-2">While Loop</button>
					<button type="button" class="btn btnBlue btn-block mr-2">Do While Loop</button>
					<button type="button" class="btn btnBlue btn-block mr-2">For Loop</button>
				</div>
				<div class="col-12 mb-2 mb-md-0 col-md-4">
					<button type="button" class="btn btnYellow btn-block mr-2">Functions</button>
					<button type="button" class="btn btnYellow btn-block mr-2">Call by Value</button>
					<button type="button" class="btn btnYellow btn-block mr-2">Call by Reference</button>
					<button type="button" class="btn btnYellow btn-block mr-2">Function Overloading</button>
					<button type="button" class="btn btnYellow btn-block mr-2">Variable Scope</button>
					<button type="button" class="btn btnYellow btn-block mr-2">Namespaces</button>
					<button type="button" class="btn btnYellow btn-block mr-2">Standard Namespace</button>
				</div>
				<div class="col-12 mb-2 mb-md-0 col-md-4">
					<button type="button" class="btn btnBlack btn-block mr-2">Math</button>
					<button type="button" class="btn btnBlack btn-block mr-2">Pseudorandom Numbers</button>
					<button type="button" class="btn btnBlack btn-block mr-2">Input Files</button>
					<button type="button" class="btn btnBlack btn-block mr-2">Output Files</button>
					<button type="button" class="btn btnBlack btn-block mr-2">Arrays (1D, 2D)</button>
					<button type="button" class="btn btnBlack btn-block mr-2">C-strings</button>
					<button type="button" class="btn btnBlack btn-block mr-2">String Class</button>
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
