<?php

    session_start();

	$article = "Giant Sloth";
	require_once("../../inc/php/Fringes/header.inc.php");

?>
	<title><?php echo $headerData["Title"]; ?></title>
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">

    <style>
        .defaults {
            color: var(--wht);
            font-family: 'Share Tech Mono', monospace;
            font-size: 1.1rem;
        }
        #bkgnd {
            min-height: calc(100vh - 111.6px);
            background-color: rgb(8 33 76 / 30%);
            background-image: url('./SlothBackground.jpg');
            background-size: 100vw 100vh;
            background-blend-mode: hard-light;
            background-attachment: fixed;
        }
        .title {
            font-family: 'Animal', monospace;
            background: rgb(0 0 0 / 90%);
            padding: 0 2%;
            border: 4px outset #bebebe;
            width: fit-content;
            color: #08146eed;
            font-size: 2.5rem;
            text-shadow: 0 4px 0 var(--wht), 0 4px 5px var(--wht), 0 4px 10px var(--wht);
        }
        .author {
            width: fit-content;
            background-color: rgb(0 0 0 / 90%);
            padding: 0 2%;
        }
        hr {
        	border-top: 5px solid;
        	border-image: linear-gradient(to right,  #bebebe, var(--blk)) 1;
        	margin-top: -25px;
        }
        .header {
            font-size: 1.9rem;
            color: var(--lt-gold);
            font-weight: 900;
        }
        .slothRow {
            margin: 0;
            border: 4px outset #bebebe;
            background: rgb(0 0 0 / 90%);
        }
        .figLeft {
            float: left;
            width: 250px;
            height: auto;
            margin-right: 1rem;
            padding-bottom: 1rem;"
        }
        .figLeft img {
            width: 250px;
            height: auto;
        }
    </style>


</head>

<body>

	<?php require_once("$headerData[Path]inc/php/Fringes/navbar.inc.php"); ?>

		<div class="container-fluid">
		<div class="row defaults">
		<div class="col-12" id="bkgnd">
            <div class="row mt-4 mb-4 justify-content-center">
                <div class="col-12">
                    <div class="title mx-auto">
                        <p class="text-center">Giant Ground Sloth</p>
                    </div>
                    <p class="mx-auto author">Researched by: Landen Marchand</p>
                </div>
            </div>

            <div class="row mb-4 slothRow">
                <div class="col-12 pt-2">
                    <p class="header pl-3">Introduction</p>
            		<hr>
                </div>
                <div class="col-12">
                    <figure class="figLeft">
                        <img src="./RemakeSloth.jpg">
                        <figcaption class="text-center">
                            <a href="https://www.pinterest.com/pin/313703930270206369/">Ground Sloth Remake</a>
                        </figcaption>
                    </figure>
                    <p>
                        There are several types of Giant Ground Sloths that have roamed both North and South America. The largest sloths, <em>Megatherium</em>, resided in South America with an impressive measurement of up to 20ft from head to tail! However, traveling a few thousand miles north, North America contained smaller, but still impressively-sized sloths. In general, Ground Sloths first started roaming the Earth circa 35 million years ago until circa 10,000 years ago. In terms of epochs, their species life-span started in the Late Eocene to the Late Pleistocene. Focusing on our home state of Ohio, the fossils of Jefferson's Ground Sloth (<em>Megalonyx Jeffersonii</em>) have been excavated.
                    </p>
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
