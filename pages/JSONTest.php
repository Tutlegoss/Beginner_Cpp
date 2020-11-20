<?php

    session_start();

    if(!($_SESSION) || empty($_SESSION) || ($_SESSION['Privilege'] == "Student"))
        header("Location: ../index.php");

	$article = "JSON Test";

	require_once("../inc/header.inc.php");
?>
	<title><?php echo $headerData["Title"]; ?></title>
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">
</head>

<body>

	<?php require_once("../inc/navbar.inc.php"); ?>

	<div class="container-fluid">
	<div class="row">
	<div id="article" class="col-12">
		<?php
            require_once("../inc/codeQuiz.php");
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
                    $numQuestions = ord($arrayJSON[$headerData["Title"]]["NumQuestions"]) - ord('0');
                    for($i = 1; $i <= $numQuestions; ++$i)
                    {
                        $preparedArray = [];
                        $preparedArray = sanitize($arrayJSON[$headerData["Title"]]["$i"]["Question"],
                                                  $arrayJSON[$headerData["Title"]]["$i"]["Code"],
                                                  $arrayJSON[$headerData["Title"]]["$i"]["NumLines"],
                                                  $arrayJSON[$headerData["Title"]]["$i"]["Output"] );

                        echo "<h5 class='co-t questionQuiz'>".$arrayJSON[$headerData["Title"]]["$i"]["Question" ]."</h5><br>";
                        if($arrayJSON[$headerData["Title"]]["$i"]["Code"] !== "NULL")
                        {

                            colorCode($preparedArray["Code"]);
                            $HTML = constructCode("1", $preparedArray["Code"], $preparedArray["NumLines"], $preparedArray["Output"]);

                            echo $HTML;
                        }

                        $numOptions = ord($arrayJSON[$headerData["Title"]]["$i"]["NumOptions"]) - ord('0');
                        for($j = 1; $j <= $numOptions; ++$j)
                        {
                            $option = $arrayJSON[$headerData["Title"]]["$i"]["Options"]["$j"];
                            colorCode($option);
                            echo "<span class='co-g'>".$option."</span><br><br>";
                        }
                    }

                }
            }
        ?>
        <br><br><br>
		</div> <!-- End Article -->
	</div>
	</div>
	</div>

	<?php
		require_once("../inc/footer.inc.php");
	?>

</body>
</html>
