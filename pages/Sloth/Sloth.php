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
            width: 310px;
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
            width: 310px;
            height: auto;
            cursor: pointer;
        }

        figcaption {
            font-size: 0.7rem;
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
                    <h2 class="text-center p-3 p-md-4">Giant Ground Sloth</h2>
                </div>
                <div class="author mx-auto">
                    <p>
                        <span class="kentYellow">Researched by</span>: Landen Marchand
                        <br>
                        <span class="pl-5">Edited: 17/Apr/2021</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-12 col-md-10 col-lg-9 col-xl-7 pt-4 pb-4 slothRow">
                <h2 class="header pl-3">Introduction</h2>
        		<hr>
                <p class="m-0">
                    There are several genera of Giant Ground Sloths that have roamed the Americas. The earliest
                    sloths were endemic to South America, and is thought to have island-hopped, or crossed an ephemeral land bridge between South America and the Greater Antilles, to reach North
                    America <span class="kentBlue">(Delsuc 2)</span>. The focus of this page is geared toward the <em>Megalonyx</em> which resided in
                    Ohio. The most common species of this genus is the <em>Megalonyx jeffersonii</em>, of which may
                    have an unexpected founder. Let's take a look at the life, actions, and physical features of the
                    <em>Megalonyx</em>, as well as how this genus compares with other sloth genera.
                </p>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-12 col-md-10 col-lg-9 col-xl-7 pt-4 pb-4 slothRow">
                <h2 class="header pl-3">Time Period</h2>
        		<hr>
                <figure class="figLeft">
                    <img src="./Pleistocene.png" data-toggle="modal" data-target="#Modal2">
                    <figcaption class="text-center">
                        Fig. 1. <em>Geologic Time Scale</em>: "GSA Geologic Time Scale." <em>The Geological Society Of America</em>, August 2018, <a href="https://www.geosociety.org/GSA/Education_Careers/Geologic_Time_Scale/GSA/timescale/home.aspx">Geologic Time Scale</a>.
                    </figcaption>
                </figure>
                <p class="m-0">
                    The <em>Megalonyx</em> lived during the Pleistocene with its demise during the Quaternary extinction event.
                    In terms of years, this falls into the (estimated) range 2.6 mya to 10,000 years ago, which includes
                    the ice age <span class="kentBlue">(Grayson xxi-xxii)</span>. There are two main
                    hypotheses in regards to their extinction: natural climate change, and humans. There has been
                    <a href="https://royalsocietypublishing.org/doi/10.1098/rspb.2013.3254">research</a>
                    that suggests that humans are to blame</a>, especially in North America where the climate was stable
                    and vegetation stayed relatively unchanged.
                </p>
            </div>
        </div>

        <div class="modal fade" id="Modal2" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: var(--blk);">
                    <div class="modal-header">
                        <h5 class="modal-title kentYellow" id="exampleModalLabel">Living Map</h5>
                        <button type="button" class="btn btnBlue" data-dismiss="modal">Close</button>
                    </div>
                    <div class="modal-body">
                        <img src="././Pleistocene.png" class="d-block w-100" alt="Pleistocene Period">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-12 col-md-10 col-lg-9 col-xl-7 pt-4 pb-4 slothRow">
                <h2 class="header pl-3">Habitat</h2>
        		<hr>
                <figure class="figLeft">
                    <img src="./LivingArea.png" data-toggle="modal" data-target="#Modal1">
                    <figcaption class="text-center">
                        Fig. 1. <em>Megalonyx jeffersonii</em>: Ice Age Distribution. Grayson, Donald K., and Wally Woolfenden<em>
                        Giant Sloths and Sabertooth Cats: Extinct Mammals and the Archaeology of the Ice Age Great Basin</em>.
                        University of Utah Press, 2016, p. 62.
                    </figcaption>
                </figure>
                <p class="m-0">
                    The <em>Megalonyx</em> lived all throughout North America. This differs from other sloths during this
                    time who mostly lived in specific North American regions. Therefore, it is the most wide-ranging of all
                    sloths as remains have been found from Mexico to Alaska <span class="kentBlue">(Grayson)</span>. Figure 1 shows that most lived in the
                    eastern United States with smaller concentrations on the west coast.
                    They resided in Ohio during the Pleistocene's warmer periods <span class="kentBlue">(Rocque 135)</span>.
                    <br>
                    <br>
                    As for its environment, they thrived primarily in woodlands and forest where conifers
                    were abundant and spruce being the dominant tree. It seems as if the majority of
                    <em>Megalonyx</em> resided around the Mississippi River basin. This means that they experienced cool and moist conditions  <span class="kentBlue">(Hoganson 77)</span>.
                </p>
            </div>
        </div>


        <div class="modal fade" id="Modal1" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: var(--blk);">
                    <div class="modal-header">
                        <h5 class="modal-title kentYellow" id="exampleModalLabel">Living Map</h5>
                        <button type="button" class="btn btnBlue" data-dismiss="modal">Close</button>
                    </div>
                    <div class="modal-body">
                        <img src="./LivingArea.png" class="d-block w-100" alt="North American Distribution">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-12 col-md-10 col-lg-9 col-xl-7 pt-4 pb-4 slothRow">
                <h2 class="header pl-3">Appearance</h2>
        		<hr>
                <figure class="mx-auto mb-4" style="width: 90%">
                    <img style="width: 100%;" src="./GroundSlothHeightComp.jpg">
                    <figcaption class="text-center">
                        Fig. 3. <em>Ground Sloth height comparison</em>. Prehistoric Wildlife, <a href="http://www.prehistoric-wildlife.com/species/m/megalonyx.html">Megalonyx</a>
                    </figcaption>
                </figure>
                <figure class="figLeft">
                    <img src="./Skeleton.jpg" data-toggle="modal" data-target="#Modal4">
                    <figcaption class="text-center">
                        Fig. 4. <em>Megalonyx skeleton</em>. Sankar, Vijay, <a href="https://www.google.com/maps/uv?pb=!1s0x88388ebf075c152d%3A0x839ef9937149e1d4!3m1!7e115!4shttps%3A%2F%2Flh5.googleusercontent.com%2Fp%2FAF1QipNW5NhciAs2PS06kh3wU6SWsFtMHvyyMU__Qv5t%3Dw266-h200-k-no!5sGeological%20Museum%20of%20the%20Ohio%20-%20Google%20Search!15sCgIgAQ&imagekey=!1e10!2sAF1QipNW5NhciAs2PS06kh3wU6SWsFtMHvyyMU__Qv5t&hl=en&sa=X&ved=2ahUKEwiZ47rVxoTwAhWKaM0KHTYrC8MQoiowFHoECB0QAw"><em>Megalonyx Skeleton</em></a>. Orton Geological Museum, October 2019.
                    </figcaption>
                </figure>
                <figure class="figLeft" style="clear: left">
                    <img src="./ZooSloth.jpg" data-toggle="modal" data-target="#Modal5">
                    <figcaption class="text-center">
                        Fig. 5. <em>Megalonyx skeleton</em>. Katy, <a href="https://kccd.wordpress.com/2013/08/19/oops-i-ignored-july-part-two-ui-natural-history-museum/"><em>Giant Ground Sloth</em></a>. <a href="https://mnh.uiowa.edu/ice-age-giant-ground-sloth">University of Iowa Museum of Natural History</a>, 19 August 2013.
                    </figcaption>
                </figure>
                <p class="m-0">

                </p>
            </div>
        </div>

        <div class="modal fade" id="Modal4" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: var(--blk);">
                    <div class="modal-header">
                        <h5 class="modal-title kentYellow" id="exampleModalLabel">Skeleton</h5>
                        <button type="button" class="btn btnBlue" data-dismiss="modal">Close</button>
                    </div>
                    <div class="modal-body">
                        <img src="./Skeleton.jpg" class="d-block w-100" alt="Giant Sloth Skeleton">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Modal5" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: var(--blk);">
                    <div class="modal-header">
                        <h5 class="modal-title kentYellow" id="exampleModalLabel">UIowa Recreation</h5>
                        <button type="button" class="btn btnBlue" data-dismiss="modal">Close</button>
                    </div>
                    <div class="modal-body">
                        <img src="./ZooSloth.jpg" class="d-block w-100" alt="UIowa Sloth Exhibit">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-12 col-md-10 col-lg-9 col-xl-7 pt-4 pb-4 slothRow">
                <h2 class="header pl-3">Preditor/Prey</h2>
        		<hr>
                <figure class="figLeft">
                    <img src="./LivingArea.png" data-toggle="modal" data-target="#Modal1">
                    <figcaption class="text-center">

                    </figcaption>
                </figure>
                <p class="m-0">

                </p>
            </div>
        </div>

        <div class="modal fade" id="Modal1" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: var(--blk);">
                    <div class="modal-header">
                        <h5 class="modal-title kentYellow" id="exampleModalLabel"></h5>
                        <button type="button" class="btn btnBlue" data-dismiss="modal">Close</button>
                    </div>
                    <div class="modal-body">
                        <img src="./LivingArea.png" class="d-block w-100" alt="North American Distribution">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-12 col-md-10 col-lg-9 col-xl-7 pt-4 pb-4 slothRow">
                <h2 class="header pl-3">Circle of Life</h2>
        		<hr>
                <figure class="figLeft">
                    <img src="./LivingArea.png" data-toggle="modal" data-target="#Modal1">
                    <figcaption class="text-center">

                    </figcaption>
                </figure>
                <p class="m-0">

                </p>
            </div>
        </div>

        <div class="modal fade" id="Modal1" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: var(--blk);">
                    <div class="modal-header">
                        <h5 class="modal-title kentYellow" id="exampleModalLabel"></h5>
                        <button type="button" class="btn btnBlue" data-dismiss="modal">Close</button>
                    </div>
                    <div class="modal-body">
                        <img src="./LivingArea.png" class="d-block w-100" alt="North American Distribution">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-12 col-md-10 col-lg-9 col-xl-7 pt-4 pb-4 slothRow">
                <h2 class="header pl-3">Thomas Jefferson</h2>
        		<hr>
                <figure class="figLeft">
                    <img src="./FunnySloth.jpg" data-toggle="modal" data-target="#Modal6">
                    <figcaption class="text-center">
                        Fig. 6. <em>Megalonyx Jeffersonii Factoid</em>. CuriosityDaily_2015 <em>
                        This giant sloth was named after Thomas Jefferson...</em>.
                        <a href="https://ifunny.co/picture/www-ll-15-this-giant-sloth-was-named-after-thomas-el2AeAXZ4">iFunny post</a>, 8 February 2017.
                    </figcaption>
                </figure>
                <p class="m-0">

                </p>
            </div>
        </div>

        <div class="modal fade" id="Modal6" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: var(--blk);">
                    <div class="modal-header">
                        <h5 class="modal-title kentYellow" id="exampleModalLabel">Living Map</h5>
                        <button type="button" class="btn btnBlue" data-dismiss="modal">Close</button>
                    </div>
                    <div class="modal-body">
                        <img src="./FunnySloth.jpg" class="d-block w-100" alt="iFunny Sloth Factoid">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-12 col-md-10 col-lg-9 col-xl-7 pt-4 pb-4 slothRow">
                <h2 class="header pl-3">In Ohio</h2>
        		<hr>
                <figure class="figLeft">
                    <img src="./OhioMap.gif" data-toggle="modal" data-target="#Modal7">
                    <figcaption class="text-center">

                    </figcaption>
                </figure>
                <ul>
                    <li><i class="fas fa-paw co-m"></i>: Darke</li>
                    <li><i class="fas fa-paw co-o"></i>: Fairfield</li>
                    <li><i class="fas fa-paw co-kg"></i>: Holmes</li>
                    <li><i class="fas fa-paw kentBlue"></i>: Huron</li>
                </ul>
                <p class="m-0">

                </p>
            </div>
        </div>


        <div class="modal fade" id="Modal7" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: var(--blk);">
                    <div class="modal-header">
                        <h5 class="modal-title kentYellow" id="exampleModalLabel">Ohio Counties with Fossils</h5>
                        <button type="button" class="btn btnBlue" data-dismiss="modal">Close</button>
                    </div>
                    <div class="modal-body">
                        <img src="./OhioMap.gif" class="d-block w-100" alt="Ohio Counties With Sloth Fossils">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 justify-content-center">
            <div class="col-12 col-md-10 col-lg-9 col-xl-8 pt-4 pb-4 slothRow" style="word-break: break-word;">
                <p class="sources text-center pt-2">Sources</p>

                <p class="header pl-3">Books</p>
        		<hr>
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
                    Hansen, M. C., 1996. "Phylum Chordata--Vertebrate Fossils," <em>Fossils of Ohio</em>, edited by R. M. Feldmann and Merrianne Hackathorn. Ohio Division of Geological Survey Bulletin 70, p. 288-369.
                </p>
                <p>
                    <svg data-icon="claw-marks" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px;">
                        <path fill="var(--lt-gold)" d="M6.99 224.51c-5-2.37-9.4 4.09-5.49 8l85.12 85.13c6 6 9.37 14.14 9.37 22.63V384h43.74c8.49 0 16.63 3.37 22.63 9.37l117.15 117.16c3.86 3.86 10.32-.56 7.99-5.49C206.4 333.11 63.36 251.26 6.99 224.51zM246.63 29.63c6 6 9.37 14.14 9.37 22.63V96h43.74c8.49 0 16.63 3.37 22.63 9.37l52.26 52.26c6 6 9.37 14.14 9.37 22.63V224h43.73c8.49 0 16.63 3.37 22.63 9.37l53.16 53.16c3.86 3.86 10.32-.56 7.99-5.49C430.4 109.11 287.36 27.26 230.99.51c-5-2.37-9.4 4.09-5.49 8l21.13 21.12zm-42.36 90.69c-7.8-6.05-12.27-15.15-12.27-25.03V64h-57.99c-6.01 0-12.04-1.84-17.12-5.05C74.85 32.39 38.37 13.23 12.42.91 3.54-3.3-4.28 8.18 2.67 15.13l179.96 179.96c6 6 9.37 14.14 9.37 22.63V256h38.29c8.49 0 16.62 3.37 22.63 9.37l89.71 89.71c6 6 9.37 14.14 9.37 22.63V416h38.29c8.49 0 16.62 3.37 22.63 9.37l84.01 84.01c6.86 6.86 18.34-.99 14.2-9.76-82.73-175.34-201.55-297.65-306.86-379.3z"></path>
                    </svg>
                    Rocque La Aur&egrave;le, and Mildred Fisher Marple. <em>Ohio Fossils</em>. Division of Geological Survey, 1970.
                </p>

                <p class="header pl-3">Journals</p>
        		<hr>
                <p>
                    <svg data-icon="claw-marks" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px;">
                        <path fill="var(--lt-gold)" d="M6.99 224.51c-5-2.37-9.4 4.09-5.49 8l85.12 85.13c6 6 9.37 14.14 9.37 22.63V384h43.74c8.49 0 16.63 3.37 22.63 9.37l117.15 117.16c3.86 3.86 10.32-.56 7.99-5.49C206.4 333.11 63.36 251.26 6.99 224.51zM246.63 29.63c6 6 9.37 14.14 9.37 22.63V96h43.74c8.49 0 16.63 3.37 22.63 9.37l52.26 52.26c6 6 9.37 14.14 9.37 22.63V224h43.73c8.49 0 16.63 3.37 22.63 9.37l53.16 53.16c3.86 3.86 10.32-.56 7.99-5.49C430.4 109.11 287.36 27.26 230.99.51c-5-2.37-9.4 4.09-5.49 8l21.13 21.12zm-42.36 90.69c-7.8-6.05-12.27-15.15-12.27-25.03V64h-57.99c-6.01 0-12.04-1.84-17.12-5.05C74.85 32.39 38.37 13.23 12.42.91 3.54-3.3-4.28 8.18 2.67 15.13l179.96 179.96c6 6 9.37 14.14 9.37 22.63V256h38.29c8.49 0 16.62 3.37 22.63 9.37l89.71 89.71c6 6 9.37 14.14 9.37 22.63V416h38.29c8.49 0 16.62 3.37 22.63 9.37l84.01 84.01c6.86 6.86 18.34-.99 14.2-9.76-82.73-175.34-201.55-297.65-306.86-379.3z"></path>
                    </svg>
                    Delsuc, Frédéric, et al. “Ancient Mitogenomes Reveal the Evolutionary History and Biogeography of Sloths.” <em>Current Biology</em>, vol. 29, no. 12, June 2019, doi:10.1016/j.cub.2019.05.043.
                </p>

                <p>
                    <svg data-icon="claw-marks" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px;">
                        <path fill="var(--lt-gold)" d="M6.99 224.51c-5-2.37-9.4 4.09-5.49 8l85.12 85.13c6 6 9.37 14.14 9.37 22.63V384h43.74c8.49 0 16.63 3.37 22.63 9.37l117.15 117.16c3.86 3.86 10.32-.56 7.99-5.49C206.4 333.11 63.36 251.26 6.99 224.51zM246.63 29.63c6 6 9.37 14.14 9.37 22.63V96h43.74c8.49 0 16.63 3.37 22.63 9.37l52.26 52.26c6 6 9.37 14.14 9.37 22.63V224h43.73c8.49 0 16.63 3.37 22.63 9.37l53.16 53.16c3.86 3.86 10.32-.56 7.99-5.49C430.4 109.11 287.36 27.26 230.99.51c-5-2.37-9.4 4.09-5.49 8l21.13 21.12zm-42.36 90.69c-7.8-6.05-12.27-15.15-12.27-25.03V64h-57.99c-6.01 0-12.04-1.84-17.12-5.05C74.85 32.39 38.37 13.23 12.42.91 3.54-3.3-4.28 8.18 2.67 15.13l179.96 179.96c6 6 9.37 14.14 9.37 22.63V256h38.29c8.49 0 16.62 3.37 22.63 9.37l89.71 89.71c6 6 9.37 14.14 9.37 22.63V416h38.29c8.49 0 16.62 3.37 22.63 9.37l84.01 84.01c6.86 6.86 18.34-.99 14.2-9.76-82.73-175.34-201.55-297.65-306.86-379.3z"></path>
                    </svg>
                    Hoganson, John W., and H. Gregory McDonald. “First Report of Jefferson's Ground Sloth (Megalonyx Jeffersonii) in North Dakota: Paleobiogeographical and Paleoecological Significance.” <em>Journal of Mammalogy</em>, vol. 88, no. 1, 2007, pp. 73–80., doi:10.1644/06-mamm-a-132r1.1.
                </p>
                <p>
                    <svg data-icon="claw-marks" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px;">
                        <path fill="var(--lt-gold)" d="M6.99 224.51c-5-2.37-9.4 4.09-5.49 8l85.12 85.13c6 6 9.37 14.14 9.37 22.63V384h43.74c8.49 0 16.63 3.37 22.63 9.37l117.15 117.16c3.86 3.86 10.32-.56 7.99-5.49C206.4 333.11 63.36 251.26 6.99 224.51zM246.63 29.63c6 6 9.37 14.14 9.37 22.63V96h43.74c8.49 0 16.63 3.37 22.63 9.37l52.26 52.26c6 6 9.37 14.14 9.37 22.63V224h43.73c8.49 0 16.63 3.37 22.63 9.37l53.16 53.16c3.86 3.86 10.32-.56 7.99-5.49C430.4 109.11 287.36 27.26 230.99.51c-5-2.37-9.4 4.09-5.49 8l21.13 21.12zm-42.36 90.69c-7.8-6.05-12.27-15.15-12.27-25.03V64h-57.99c-6.01 0-12.04-1.84-17.12-5.05C74.85 32.39 38.37 13.23 12.42.91 3.54-3.3-4.28 8.18 2.67 15.13l179.96 179.96c6 6 9.37 14.14 9.37 22.63V256h38.29c8.49 0 16.62 3.37 22.63 9.37l89.71 89.71c6 6 9.37 14.14 9.37 22.63V416h38.29c8.49 0 16.62 3.37 22.63 9.37l84.01 84.01c6.86 6.86 18.34-.99 14.2-9.76-82.73-175.34-201.55-297.65-306.86-379.3z"></path>
                    </svg>
                    Lindsey, Emily L., et al. “A Monodominant Late-Pleistocene Megafauna Locality from Santa Elena, Ecuador: Insight on the Biology and Behavior of Giant Ground Sloths.” Palaeogeography, Palaeoclimatology, Palaeoecology, vol. 544, 15 April. 2020, p. 109599., doi:10.1016/j.palaeo.2020.109599.
                </p>
                <p>
                    <svg data-icon="claw-marks" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px;">
                        <path fill="var(--lt-gold)" d="M6.99 224.51c-5-2.37-9.4 4.09-5.49 8l85.12 85.13c6 6 9.37 14.14 9.37 22.63V384h43.74c8.49 0 16.63 3.37 22.63 9.37l117.15 117.16c3.86 3.86 10.32-.56 7.99-5.49C206.4 333.11 63.36 251.26 6.99 224.51zM246.63 29.63c6 6 9.37 14.14 9.37 22.63V96h43.74c8.49 0 16.63 3.37 22.63 9.37l52.26 52.26c6 6 9.37 14.14 9.37 22.63V224h43.73c8.49 0 16.63 3.37 22.63 9.37l53.16 53.16c3.86 3.86 10.32-.56 7.99-5.49C430.4 109.11 287.36 27.26 230.99.51c-5-2.37-9.4 4.09-5.49 8l21.13 21.12zm-42.36 90.69c-7.8-6.05-12.27-15.15-12.27-25.03V64h-57.99c-6.01 0-12.04-1.84-17.12-5.05C74.85 32.39 38.37 13.23 12.42.91 3.54-3.3-4.28 8.18 2.67 15.13l179.96 179.96c6 6 9.37 14.14 9.37 22.63V256h38.29c8.49 0 16.62 3.37 22.63 9.37l89.71 89.71c6 6 9.37 14.14 9.37 22.63V416h38.29c8.49 0 16.62 3.37 22.63 9.37l84.01 84.01c6.86 6.86 18.34-.99 14.2-9.76-82.73-175.34-201.55-297.65-306.86-379.3z"></path>
                    </svg>
                    McDonald, H. Gregory, et al. “First Record of the Extinct Ground Sloth, Megalonyx Jeffersonii, (Xenarthra, Megalonychidae) from New York and Contributions to Its Paleoecology.” <em>Quaternary International</em>, vol. 530-531, Oct. 2019, pp. 42–46., doi:10.1016/j.quaint.2018.11.021.
                </p>
                <p>
                    <svg data-icon="claw-marks" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px;">
                        <path fill="var(--lt-gold)" d="M6.99 224.51c-5-2.37-9.4 4.09-5.49 8l85.12 85.13c6 6 9.37 14.14 9.37 22.63V384h43.74c8.49 0 16.63 3.37 22.63 9.37l117.15 117.16c3.86 3.86 10.32-.56 7.99-5.49C206.4 333.11 63.36 251.26 6.99 224.51zM246.63 29.63c6 6 9.37 14.14 9.37 22.63V96h43.74c8.49 0 16.63 3.37 22.63 9.37l52.26 52.26c6 6 9.37 14.14 9.37 22.63V224h43.73c8.49 0 16.63 3.37 22.63 9.37l53.16 53.16c3.86 3.86 10.32-.56 7.99-5.49C430.4 109.11 287.36 27.26 230.99.51c-5-2.37-9.4 4.09-5.49 8l21.13 21.12zm-42.36 90.69c-7.8-6.05-12.27-15.15-12.27-25.03V64h-57.99c-6.01 0-12.04-1.84-17.12-5.05C74.85 32.39 38.37 13.23 12.42.91 3.54-3.3-4.28 8.18 2.67 15.13l179.96 179.96c6 6 9.37 14.14 9.37 22.63V256h38.29c8.49 0 16.62 3.37 22.63 9.37l89.71 89.71c6 6 9.37 14.14 9.37 22.63V416h38.29c8.49 0 16.62 3.37 22.63 9.37l84.01 84.01c6.86 6.86 18.34-.99 14.2-9.76-82.73-175.34-201.55-297.65-306.86-379.3z"></path>
                    </svg>
                    Sandom, Christopher, et al."Global late Quaternary megafauna extinctions linked to humans, not climate change." <em>Royal Society Publishing</em>, 22 July 2014, doi:10.1098/rspb.2013.3254.
                </p>

                <p class="header pl-3">Websites</p>
        		<hr>
                <p>
                    <svg data-icon="claw-marks" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px;">
                        <path fill="var(--lt-gold)" d="M6.99 224.51c-5-2.37-9.4 4.09-5.49 8l85.12 85.13c6 6 9.37 14.14 9.37 22.63V384h43.74c8.49 0 16.63 3.37 22.63 9.37l117.15 117.16c3.86 3.86 10.32-.56 7.99-5.49C206.4 333.11 63.36 251.26 6.99 224.51zM246.63 29.63c6 6 9.37 14.14 9.37 22.63V96h43.74c8.49 0 16.63 3.37 22.63 9.37l52.26 52.26c6 6 9.37 14.14 9.37 22.63V224h43.73c8.49 0 16.63 3.37 22.63 9.37l53.16 53.16c3.86 3.86 10.32-.56 7.99-5.49C430.4 109.11 287.36 27.26 230.99.51c-5-2.37-9.4 4.09-5.49 8l21.13 21.12zm-42.36 90.69c-7.8-6.05-12.27-15.15-12.27-25.03V64h-57.99c-6.01 0-12.04-1.84-17.12-5.05C74.85 32.39 38.37 13.23 12.42.91 3.54-3.3-4.28 8.18 2.67 15.13l179.96 179.96c6 6 9.37 14.14 9.37 22.63V256h38.29c8.49 0 16.62 3.37 22.63 9.37l89.71 89.71c6 6 9.37 14.14 9.37 22.63V416h38.29c8.49 0 16.62 3.37 22.63 9.37l84.01 84.01c6.86 6.86 18.34-.99 14.2-9.76-82.73-175.34-201.55-297.65-306.86-379.3z"></path>
                    </svg>
                    “Memoir on the Megalonyx, [10 February 1797],” <em>Founders Online</em>, National Archives, <a href="https://founders.archives.gov/documents/Jefferson/01-29-02-0232">https://founders.archives.gov/documents/Jefferson/01-29-02-0232</a>. [Original source: <em>The Papers of Thomas Jefferson</em>, vol. 29, <em>1 March 1796 – 31 December 1797</em>, ed. Barbara B. Oberg. Princeton: Princeton University Press, 2002, pp. 291–304.]
                </p>
                <p>
                    <svg data-icon="claw-marks" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px;">
                        <path fill="var(--lt-gold)" d="M6.99 224.51c-5-2.37-9.4 4.09-5.49 8l85.12 85.13c6 6 9.37 14.14 9.37 22.63V384h43.74c8.49 0 16.63 3.37 22.63 9.37l117.15 117.16c3.86 3.86 10.32-.56 7.99-5.49C206.4 333.11 63.36 251.26 6.99 224.51zM246.63 29.63c6 6 9.37 14.14 9.37 22.63V96h43.74c8.49 0 16.63 3.37 22.63 9.37l52.26 52.26c6 6 9.37 14.14 9.37 22.63V224h43.73c8.49 0 16.63 3.37 22.63 9.37l53.16 53.16c3.86 3.86 10.32-.56 7.99-5.49C430.4 109.11 287.36 27.26 230.99.51c-5-2.37-9.4 4.09-5.49 8l21.13 21.12zm-42.36 90.69c-7.8-6.05-12.27-15.15-12.27-25.03V64h-57.99c-6.01 0-12.04-1.84-17.12-5.05C74.85 32.39 38.37 13.23 12.42.91 3.54-3.3-4.28 8.18 2.67 15.13l179.96 179.96c6 6 9.37 14.14 9.37 22.63V256h38.29c8.49 0 16.62 3.37 22.63 9.37l89.71 89.71c6 6 9.37 14.14 9.37 22.63V416h38.29c8.49 0 16.62 3.37 22.63 9.37l84.01 84.01c6.86 6.86 18.34-.99 14.2-9.76-82.73-175.34-201.55-297.65-306.86-379.3z"></path>
                    </svg>
                    Bradford, Alina. “Facts About the Giant Ground Sloth.” <em>LiveScience</em>, Purch, 5 Nov. 2016, <a href="https://www.livescience.com/56762-giant-ground-sloth.html#:~:text=The%20giant%20ground%20sloth%20was,forests%20along%20rivers%20or%20lakes.&text=Giant%20ground%20sloths%20were%20large,related%20to%20anteaters%20and%20armadillos">www.livescience.com/56762-giant-ground-sloth.html#:~:text=The%20giant%20ground%20sloth%20was,forests%20along%20rivers%20or%20lakes.&text=Giant%20ground%20sloths%20were%20large,related%20to%20anteaters%20and%20armadillos</a>.
                </p>

                <p class="header pl-3">Misc</p>
        		<hr>
                <p>
                    <svg data-icon="claw-marks" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px;">
                        <path fill="var(--lt-gold)" d="M6.99 224.51c-5-2.37-9.4 4.09-5.49 8l85.12 85.13c6 6 9.37 14.14 9.37 22.63V384h43.74c8.49 0 16.63 3.37 22.63 9.37l117.15 117.16c3.86 3.86 10.32-.56 7.99-5.49C206.4 333.11 63.36 251.26 6.99 224.51zM246.63 29.63c6 6 9.37 14.14 9.37 22.63V96h43.74c8.49 0 16.63 3.37 22.63 9.37l52.26 52.26c6 6 9.37 14.14 9.37 22.63V224h43.73c8.49 0 16.63 3.37 22.63 9.37l53.16 53.16c3.86 3.86 10.32-.56 7.99-5.49C430.4 109.11 287.36 27.26 230.99.51c-5-2.37-9.4 4.09-5.49 8l21.13 21.12zm-42.36 90.69c-7.8-6.05-12.27-15.15-12.27-25.03V64h-57.99c-6.01 0-12.04-1.84-17.12-5.05C74.85 32.39 38.37 13.23 12.42.91 3.54-3.3-4.28 8.18 2.67 15.13l179.96 179.96c6 6 9.37 14.14 9.37 22.63V256h38.29c8.49 0 16.62 3.37 22.63 9.37l89.71 89.71c6 6 9.37 14.14 9.37 22.63V416h38.29c8.49 0 16.62 3.37 22.63 9.37l84.01 84.01c6.86 6.86 18.34-.99 14.2-9.76-82.73-175.34-201.55-297.65-306.86-379.3z"></path>
                    </svg>
                    <a href="https://www.fontspace.com/ji-tracks-font-f5490">JI Tracks Font</a> by Jeri Ingalls
                </p>
                <p>
                    <svg data-icon="claw-marks" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 20px;">
                        <path fill="var(--lt-gold)" d="M6.99 224.51c-5-2.37-9.4 4.09-5.49 8l85.12 85.13c6 6 9.37 14.14 9.37 22.63V384h43.74c8.49 0 16.63 3.37 22.63 9.37l117.15 117.16c3.86 3.86 10.32-.56 7.99-5.49C206.4 333.11 63.36 251.26 6.99 224.51zM246.63 29.63c6 6 9.37 14.14 9.37 22.63V96h43.74c8.49 0 16.63 3.37 22.63 9.37l52.26 52.26c6 6 9.37 14.14 9.37 22.63V224h43.73c8.49 0 16.63 3.37 22.63 9.37l53.16 53.16c3.86 3.86 10.32-.56 7.99-5.49C430.4 109.11 287.36 27.26 230.99.51c-5-2.37-9.4 4.09-5.49 8l21.13 21.12zm-42.36 90.69c-7.8-6.05-12.27-15.15-12.27-25.03V64h-57.99c-6.01 0-12.04-1.84-17.12-5.05C74.85 32.39 38.37 13.23 12.42.91 3.54-3.3-4.28 8.18 2.67 15.13l179.96 179.96c6 6 9.37 14.14 9.37 22.63V256h38.29c8.49 0 16.62 3.37 22.63 9.37l89.71 89.71c6 6 9.37 14.14 9.37 22.63V416h38.29c8.49 0 16.62 3.37 22.63 9.37l84.01 84.01c6.86 6.86 18.34-.99 14.2-9.76-82.73-175.34-201.55-297.65-306.86-379.3z"></path>
                    </svg>
                    Background: <a href="http://dontmesswithdinosaurs.com/">http://dontmesswithdinosaurs.com/</a>
                    <br>
                    <a class="pl-5" href="https://mobile.twitter.com/brianengh_art/status/1172561569164791808">Background Image Twitter Post</a>
                </p>
            </div>
        </div>
    </div>

    <?php
        require_once("$headerData[Path]inc/php/fringes/footer.inc.php");
        require_once("$headerData[Path]inc/php/fringes/required.inc.php");
    ?>

</body>
</html>
