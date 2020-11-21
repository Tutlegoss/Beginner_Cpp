<?php

    session_start();

    if(!($_SESSION) || empty($_SESSION) || ($_SESSION['Privilege'] == "Student"))
        header("Location: ../index.php");

	$article = "JSON Test";

	require_once("../inc/header.inc.php");
?>
	<title><?php echo $headerData["Title"]; ?></title>
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">

    <style>
    /* https://codepen.io/manabox/pen/raQmpL with my modifications */
    [type="radio"]:checked,
    [type="radio"]:not(:checked) {
        position: absolute;
        left: -9999px;
    }
    [type="radio"]:checked + label,
    [type="radio"]:not(:checked) + label
    {
        position: relative;
        padding-left: 28px;
        cursor: pointer;
        line-height: 1em;
        display: inline-block;
    }
    [type="radio"]:checked + label:before,
    [type="radio"]:not(:checked) + label:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 1em;
        height: 1em;
        border: 1px solid rgb(26, 26, 26);
        border-radius: 100%;
        background: #F8EB61;
    }
    [type="radio"]:checked + label:after,
    [type="radio"]:not(:checked) + label:after {
        content: '';
        width: 1em;
        height: 1em;
        background: #4994CB;
        position: absolute;
        top: 0;
        left: 0;
        border-radius: 100%;
        -webkit-transition: all 0.4s cubic-bezier(.09,.7,.78,.26);
        transition: all 0.4s cubic-bezier(.09,.7,.78,.26);
    }
    [type="radio"]:not(:checked) + label:after {
        opacity: 0;
        -webkit-transform: scale(1);
        transform: scale(1);
    }
    [type="radio"]:checked + label:after {
        opacity: 1;
        -webkit-transform: scale(1.2);
        transform: scale(1.2);
    }
</style>
</head>

<body>

	<?php require_once("../inc/navbar.inc.php"); ?>

	<div class="container-fluid">
	<div class="row">
	<div id="article" class="col-12">
		<?php
            require_once("../inc/quizCode.php");
            $getJSON = file_get_contents("../inc/quiz.json");

            if($getJSON == FALSE)
            {
                echo "<p>The quiz is currently unavailable<br></p>";
            }
            else
            {
                $arrayJSON = json_decode($getJSON, true);
                if($arrayJSON == FALSE)
                {
                    echo "<p>The quiz is currently unavailable<br></p>";
                }
                else
                {
                    /* Start the form for AJAX */
                    echo "<form name='quiz' id='quiz' class='mt-4 mb-5' action='./JSONTest.php' method='POST'>";
                    /* Get total number of questions */
                    $numQuestions = ord($arrayJSON[$headerData["Title"]]["NumQuestions"]) - ord('0');

                    /* Prepare question and code (if it exists) for display */
                    for($i = 1; $i <= $numQuestions; ++$i)
                    {
                        $preparedArray = [];
                        $preparedArray = sanitize($arrayJSON[$headerData["Title"]]["$i"]["Question"],
                                                  $arrayJSON[$headerData["Title"]]["$i"]["Code"],
                                                  $arrayJSON[$headerData["Title"]]["$i"]["NumLines"],
                                                  $arrayJSON[$headerData["Title"]]["$i"]["Output"] );

                        /* Display actual question */
                        echo  "<div class='col-xl-7 col-lg-8 col-md-10 col-12'><p class='text-justify'><span class='kentYellow'>$i]    </span>"
                             .$arrayJSON[$headerData["Title"]]["$i"]["Question" ]
                             ."</p></div>";

                        /* Display actual code */
                        if($arrayJSON[$headerData["Title"]]["$i"]["Code"] !== "NULL")
                        {

                            colorCode($preparedArray["Code"]);
                            $HTML = constructCode("1", $preparedArray["Code"], $preparedArray["NumLines"], $preparedArray["Output"]);

                            echo "<div class='col-xl-7 col-lg-8 col-md-10 col-12 ml-md-3'>".$HTML."</div>";
                        }

                        /* Get total number of options for current question */
                        $numOptions = ord($arrayJSON[$headerData["Title"]]["$i"]["NumOptions"]) - ord('0');
                        /* Display every option with radio buttons */
                        for($j = 1; $j <= $numOptions; ++$j)
                        {
                            $option = $arrayJSON[$headerData["Title"]]["$i"]["Options"]["$j"];
                            colorCode($option);
                            /* Display the potential answer itself as a label */
                            echo  "<div class='col-xl-7 col-lg-8 col-md-10 col-12 ml-md-4'>"
                                 ."<p class='ml-3'>"
                                 ."<input type='radio' name='q$i' id='q$i"."o$j'>"
                                 ."<label for='q$i"."o$j' value='q$i"."o$j'>"
                                 ."<span class='ml-3 co-g'>".$option."</span>"
                                 ."</label></p></div>";
                        }
                        echo "<br>";
                    }
                    /* End the AJAX form */
                    echo  "<button type='submit' id='answers' class='btn btnSub mt-4 ml-3'>Check Ans</button>"
                         ."</form><br>";
                }
            }
        ?>
	</div> <!-- End Article -->
	</div>
	</div>


	<?php
		require_once("../inc/footer.inc.php");
	?>

</body>
</html>
