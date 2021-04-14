<?php

    session_start();

	$article = "Giant Sloth";
	require_once("../../inc/php/fringes/header.inc.php");

?>
    <style>
        #bkgnd {
            background-color: rgb(8 33 76 / 30%);
            background-image: url('./SlothBackground.jpg');
            background-size: 100vw 100vh;
            background-blend-mode: hard-light;
            background-attachment: fixed;
        }
        .title {
            font-family: 'Animal', monospace;
            background: rgb(0 0 0 / 90%);
            border: 4px outset #bebebe;
            width: fit-content;
            width: -moz-fit-content;
            color: #08146eed;
            font-size: 2.5rem;
            text-shadow: 0 4px 0 var(--wht), 0 4px 5px var(--wht), 0 4px 10px var(--wht);
        }
        .sources {
            font-family: 'Animal', monospace;
            color: #08146eed;
            font-size: 2.5rem;
            text-shadow: 0 4px 0 var(--wht), 0 4px 5px var(--wht), 0 4px 10px var(--wht);
        }
        .author {
            width: fit-content;
            background-color: rgb(0 0 0 / 90%);
            padding: 0 2%;
        }
        .header {
            font-size: 1.9rem;
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
            padding-bottom: 1rem;
        }
        @media only screen and (max-width: 575.98px)
        {
            .figLeft {
                float: none;
                margin: 0 auto;
            }
        }

        .figLeft img {
            width: 250px;
            height: auto;
        }

        .header {
            width: fit-content;
            width: -moz-fit-content;
            background: linear-gradient(to right, var(--lt-gold), var(--lt-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
}
    </style>

</head>

<body id="bkgnd">

	<?php require_once("$headerData[Path]inc/php/fringes/navbar.inc.php"); ?>

    <div  class="container-fluid mb-4">
		<div class="row mt-5 mb-4">
		    <div class="col-12">
                <div class="title mx-auto">
                    <h2 class="text-center pt-3">Giant Ground Sloth</h2>
                </div>
                <p class="mx-auto author">Researched by: Landen Marchand</p>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-11 col-md-10 col-lg-9 col-xl-6 pt-4 pb-4 slothRow">
                <h2 class="header pl-3">Introduction</h2>
        		<hr>
                <figure class="figLeft">
                    <img src="./RemakeSloth.jpg">
                    <figcaption class="text-center">
                        <a href="https://www.pinterest.com/pin/313703930270206369/">Ground Sloth Remake</a>
                    </figcaption>
                </figure>
                <p>
                    There are several types of Giant Ground Sloths that have roamed both North and South America.
                    The largest sloths, <em>Megatherium</em>, resided in South America with an impressive measurement
                    of up to 20ft from head to tail! However, traveling a few thousand miles north, North America
                    contained smaller, but still impressively-sized sloths. In general, Ground Sloths first started
                    roaming the Earth circa 35 million years ago until circa 10,000 years ago. In terms of epochs,
                    their species life-span started in the Late Eocene to the Late Pleistocene. Focusing on our home
                    state of Ohio, the fossils of Jefferson's Ground Sloth (<em>Megalonyx Jeffersonii</em>) have been
                    excavated.
                </p>
            </div>
        </div>

        <div class="row slothRow">
            <div class="col-12 pt-2">
                <p class="sources text-center">Sources</p>
            </div>
            <div class="col-12 pt-2">
                <p class="header pl-3">Books</p>
        		<hr>
                <p>
                    <svg data-icon="claw-marks" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px;">
                        <path fill="var(--lt-gold)" d="M6.99 224.51c-5-2.37-9.4 4.09-5.49 8l85.12 85.13c6 6 9.37 14.14 9.37 22.63V384h43.74c8.49 0 16.63 3.37 22.63 9.37l117.15 117.16c3.86 3.86 10.32-.56 7.99-5.49C206.4 333.11 63.36 251.26 6.99 224.51zM246.63 29.63c6 6 9.37 14.14 9.37 22.63V96h43.74c8.49 0 16.63 3.37 22.63 9.37l52.26 52.26c6 6 9.37 14.14 9.37 22.63V224h43.73c8.49 0 16.63 3.37 22.63 9.37l53.16 53.16c3.86 3.86 10.32-.56 7.99-5.49C430.4 109.11 287.36 27.26 230.99.51c-5-2.37-9.4 4.09-5.49 8l21.13 21.12zm-42.36 90.69c-7.8-6.05-12.27-15.15-12.27-25.03V64h-57.99c-6.01 0-12.04-1.84-17.12-5.05C74.85 32.39 38.37 13.23 12.42.91 3.54-3.3-4.28 8.18 2.67 15.13l179.96 179.96c6 6 9.37 14.14 9.37 22.63V256h38.29c8.49 0 16.62 3.37 22.63 9.37l89.71 89.71c6 6 9.37 14.14 9.37 22.63V416h38.29c8.49 0 16.62 3.37 22.63 9.37l84.01 84.01c6.86 6.86 18.34-.99 14.2-9.76-82.73-175.34-201.55-297.65-306.86-379.3z"></path>
                    </svg>
                    Encyclopaedia Britannica. <em>Britannica Concise Encyclopedia</em>. Encyclopaedia Britannica, 2006.
                </p>
                <p>
                    <svg data-icon="claw-marks" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px;">
                        <path fill="var(--lt-gold)" d="M6.99 224.51c-5-2.37-9.4 4.09-5.49 8l85.12 85.13c6 6 9.37 14.14 9.37 22.63V384h43.74c8.49 0 16.63 3.37 22.63 9.37l117.15 117.16c3.86 3.86 10.32-.56 7.99-5.49C206.4 333.11 63.36 251.26 6.99 224.51zM246.63 29.63c6 6 9.37 14.14 9.37 22.63V96h43.74c8.49 0 16.63 3.37 22.63 9.37l52.26 52.26c6 6 9.37 14.14 9.37 22.63V224h43.73c8.49 0 16.63 3.37 22.63 9.37l53.16 53.16c3.86 3.86 10.32-.56 7.99-5.49C430.4 109.11 287.36 27.26 230.99.51c-5-2.37-9.4 4.09-5.49 8l21.13 21.12zm-42.36 90.69c-7.8-6.05-12.27-15.15-12.27-25.03V64h-57.99c-6.01 0-12.04-1.84-17.12-5.05C74.85 32.39 38.37 13.23 12.42.91 3.54-3.3-4.28 8.18 2.67 15.13l179.96 179.96c6 6 9.37 14.14 9.37 22.63V256h38.29c8.49 0 16.62 3.37 22.63 9.37l89.71 89.71c6 6 9.37 14.14 9.37 22.63V416h38.29c8.49 0 16.62 3.37 22.63 9.37l84.01 84.01c6.86 6.86 18.34-.99 14.2-9.76-82.73-175.34-201.55-297.65-306.86-379.3z"></path>
                    </svg>
                    Grayson, Donald K., and Wally Woolfenden. <em>Giant Sloths and Sabertooth Cats: Extinct Mammals and the Archaeology of the Ice Age Great Basin</em>. University of Utah Press, 2016.
                </p>
                <p>
                    <svg data-icon="claw-marks" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px;">
                        <path fill="var(--lt-gold)" d="M6.99 224.51c-5-2.37-9.4 4.09-5.49 8l85.12 85.13c6 6 9.37 14.14 9.37 22.63V384h43.74c8.49 0 16.63 3.37 22.63 9.37l117.15 117.16c3.86 3.86 10.32-.56 7.99-5.49C206.4 333.11 63.36 251.26 6.99 224.51zM246.63 29.63c6 6 9.37 14.14 9.37 22.63V96h43.74c8.49 0 16.63 3.37 22.63 9.37l52.26 52.26c6 6 9.37 14.14 9.37 22.63V224h43.73c8.49 0 16.63 3.37 22.63 9.37l53.16 53.16c3.86 3.86 10.32-.56 7.99-5.49C430.4 109.11 287.36 27.26 230.99.51c-5-2.37-9.4 4.09-5.49 8l21.13 21.12zm-42.36 90.69c-7.8-6.05-12.27-15.15-12.27-25.03V64h-57.99c-6.01 0-12.04-1.84-17.12-5.05C74.85 32.39 38.37 13.23 12.42.91 3.54-3.3-4.28 8.18 2.67 15.13l179.96 179.96c6 6 9.37 14.14 9.37 22.63V256h38.29c8.49 0 16.62 3.37 22.63 9.37l89.71 89.71c6 6 9.37 14.14 9.37 22.63V416h38.29c8.49 0 16.62 3.37 22.63 9.37l84.01 84.01c6.86 6.86 18.34-.99 14.2-9.76-82.73-175.34-201.55-297.65-306.86-379.3z"></path>
                    </svg>
                    Rocque La Aur&egrave;le, and Mildred Fisher Marple. <em>Ohio Fossils</em>. Division of Geological Survey, 1970.
                </p>
            </div>
            <div class="col-12 pt-2">
                <p class="header pl-3">Journals</p>
        		<hr>
            </div>
            <div class="col-12 pt-2">
                <p class="header pl-3">Websites</p>
        		<hr>
            </div>
            <div class="col-12 pt-2 pb-2">
                <p class="header pl-3">Images/Font</p>
        		<hr>
                <svg data-icon="claw-marks" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px;">
                    <path fill="var(--lt-gold)" d="M6.99 224.51c-5-2.37-9.4 4.09-5.49 8l85.12 85.13c6 6 9.37 14.14 9.37 22.63V384h43.74c8.49 0 16.63 3.37 22.63 9.37l117.15 117.16c3.86 3.86 10.32-.56 7.99-5.49C206.4 333.11 63.36 251.26 6.99 224.51zM246.63 29.63c6 6 9.37 14.14 9.37 22.63V96h43.74c8.49 0 16.63 3.37 22.63 9.37l52.26 52.26c6 6 9.37 14.14 9.37 22.63V224h43.73c8.49 0 16.63 3.37 22.63 9.37l53.16 53.16c3.86 3.86 10.32-.56 7.99-5.49C430.4 109.11 287.36 27.26 230.99.51c-5-2.37-9.4 4.09-5.49 8l21.13 21.12zm-42.36 90.69c-7.8-6.05-12.27-15.15-12.27-25.03V64h-57.99c-6.01 0-12.04-1.84-17.12-5.05C74.85 32.39 38.37 13.23 12.42.91 3.54-3.3-4.28 8.18 2.67 15.13l179.96 179.96c6 6 9.37 14.14 9.37 22.63V256h38.29c8.49 0 16.62 3.37 22.63 9.37l89.71 89.71c6 6 9.37 14.14 9.37 22.63V416h38.29c8.49 0 16.62 3.37 22.63 9.37l84.01 84.01c6.86 6.86 18.34-.99 14.2-9.76-82.73-175.34-201.55-297.65-306.86-379.3z"></path>
                </svg>
                <a href="https://www.fontspace.com/ji-tracks-font-f5490">JI Tracks Font</a> by Jeri Ingalls
            </div>
        </div>
    </div>

    <?php
        require_once("$headerData[Path]inc/php/fringes/footer.inc.php");
        require_once("$headerData[Path]inc/php/fringes/required.inc.php");
    ?>

</body>
</html>
