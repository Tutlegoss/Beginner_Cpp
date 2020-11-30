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
            require_once("$headerData[Path]inc/php/quizCode.php");
            $fn = str_replace(' ', '_', $headerData["Title"]);
            $getJSON = file_get_contents("$headerData[Path]inc/js/json/$fn.json");

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
                    $numQuestions = ord($arrayJSON["NumQuestions"]) - ord('0');

                    /* Prepare question and code (if it exists) for display */
                    for($i = 1; $i <= $numQuestions; ++$i)
                    {
                        $preparedArray = [];
                        $preparedArray = sanitize($arrayJSON["$i"]["Question"],
                                                  $arrayJSON["$i"]["Code"],
                                                  $arrayJSON["$i"]["NumLines"],
                                                  $arrayJSON["$i"]["Output"] );

                        /* Display actual question */
                        echo    "<div class='col-xl-7 col-lg-8 col-md-10 col-12'>
                                    <p class='text-justify'><span class='kentYellow'>$i]    </span>"
                             .$arrayJSON["$i"]["Question" ]
                                    ."</p>
                                </div>";

                        /* Display actual code */
                        if($arrayJSON["$i"]["Code"] !== "NULL")
                        {

                            colorCode($preparedArray["Code"]);
                            $HTML = constructCode("1", $preparedArray["Code"], $preparedArray["NumLines"], $preparedArray["Output"]);

                            echo "<div class='col-xl-7 col-lg-8 col-md-10 col-12 ml-md-3'>".$HTML."</div>";
                        }

                        /* Get total number of options for current question */
                        $numOptions = ord($arrayJSON["$i"]["NumOptions"]) - ord('0');
                        /* Display every option with radio buttons */
                        for($j = 1; $j <= $numOptions; ++$j)
                        {
                            $option = $arrayJSON["$i"]["Options"]["$j"];
                            colorCode($option);
                            /* Display the potential answer itself as a label */
                            echo    "<div class='col-xl-7 col-lg-8 col-md-10 col-12 ml-md-4'>
                                        <p class='ml-3'>
                                            <input type='radio' name='q$i' id='q$i"."o$j' value='$j'>
                                            <label class='radioQuizLabel' for='q$i"."o$j' value='q$i"."o$j'>"
                                                . $option .
                                            "</label>
                                        </p>
                                    </div>";
                        }
                        echo "<br><br>";
                        /* Flickering prevention / Results / End of question */
                        echo  "<div style='display: none' class='dispAnsOuter'
                                                        id='dispAnsOuter$i'></div>"
                             ."<div style='display: none' class='dispAnsInner'
                                                        id='dispAnsInner$i'></div>";
                    }
                    /* End the AJAX form */
                    echo  "<div class='row'>"
                            ."<p class='col-4 ml-3 mt-md-0'><button type='submit' id='answers'
                                 class='btn btnQuiz mt-4 ml-3'>Check <br> Answers</button></p>"
                         ."</div>"
                         ."<div class='row'>"
                            ."<p class='col-4 ml-3 mt-3'><button type='button'
                                 class='btn ml-3 cancel text-wrap' id='clearRadio'>Clear <br> Selections</button></p>"
                         ."</div>"
                         ."</form><br>";
                }
            }
        ?>
	</div> <!-- End Article -->
	</div>
	</div>

	<?php
		require_once("$headerData[Path]inc/php/Fringes/footer.inc.php");
	?>

<script>
$(document).ready(function() {

    /* Reset all quiz selections */
    $("#clearRadio").click(function() {
        $("input[type |= radio]").each(function() {
            $(this).prop("checked", false);
        });
    });

    /* Show/hide answer icon when user skipps a question */
    $(".dispAnsInner, .dispAnsOuter").on("click", "details summary", function() {
        if($(this).children("i.fa-eye-slash").length)
        {
            $(this).children("i").removeClass("fa-eye-slash").addClass("fa-eye");
            $(this).children("span").html("Hide");
        }
        else
        {
            $(this).children("i").removeClass("fa-eye").addClass("fa-eye-slash");
            $(this).children("span").html("Show");
        }
    });

    /* AJAX request - Move to separate file when done */
    $("#answers").click(function() {
        /* Do not reload the page */
        event.preventDefault();

        /* Houses user-chosen option */
        var choices = new Array();
        /* Loop to obtain user's choice per question */
        var i = 1;
        while(i <= <?php echo $numQuestions ?>) {
            var id = "q" + i.toString();
            choices.push($('input[name="' + id + '"]:checked').val());
            ++i;
        }

        $.ajax({
            url:      "<?php echo $headerData['Path']; ?>inc/php/quizResults.php",
            data:     {Title:"<?php echo $fn ?>"},
            async:    true,
            method:   "POST",
            dataType: "json",

            success: function(data)
            {
                $(document).scrollTop($("#quiz").offset().top);
                if( Object.keys(data).length === 1)
                    alert(data["Error"]);
                else
                {
                    /* Prevent flickering when submitting second + times */
                    var display;
                    if($(".dispAnsOuter").css("display") == "none")
                        display = ".dispAnsOuter";

                    else
                        display = ".dispAnsInner";

                    /* Number of questions and corresponding colors */
                    var numResults = Object.keys(data).length / 2;
                    var correct = 'co-kg">';
                    var wrong = 'co-m">';
                    var skipped = 'kentYellow">';

                    /* data starts at index 0, but everything else starts at 1 */
                    for(var i = 1; i <= numResults; ++i) {

                        /* Used to shorten next section. Style of answer boxes */
                        var num = i.toString();
                        var para = 'id="res' + num + '" class="my-auto ';

                        /* Start of display */
                        var qNum = num + '] '
                        var exp = data["Explanation" + num] + '</p>';

                        /* Appropriate placement of result */
                        var placement = display;
                        placement = placement.replace('.','#');
                        placement += num;

                        /* User ignored question */
                        if(choices[i-1] === undefined)
                        {

                            var skip =  '<details ' + para + '">'
                                            + '<summary class="' + skipped
                                                + '<i class="fas fa-eye-slash"></i>'
                                                + qNum +  'Question skipped: <span class="p-0">Show</span> Answer'
                                            + '</summary>'
                                            + '<p>' + exp
                                      + '</details>';

                            $(placement).removeClass("exBoxKelly exBoxMagenta").addClass("exBoxYellow");
                            $(placement).append(skip);
                        }

                        /* Correct answer */
                        else if(choices[i-1] == data["Answers" + num])
                        {
                            $(placement).removeClass("exBoxYellow exBoxMagenta").addClass("exBoxKelly");
                            $(placement).append("<p " + para + correct + qNum + "Correct: " + exp);
                        }

                        /* Incorrect answer */
                        else
                        {
                            $(placement).removeClass("exBoxKelly exBoxYellow").addClass("exBoxMagenta");
                            $(placement).append("<p " + para + wrong + qNum + "Incorrect: " + exp);
                        }
                    }

                    /* Buffing technique */
                    if(display === ".dispAnsOuter")
                    {
                        $(".dispAnsOuter").css("display", "");
                        $(".dispAnsInner").css("display", "none");
                        $(".dispAnsInner").empty();
                    }
                    else
                    {
                        $(".dispAnsInner").css("display", "");
                        $(".dispAnsOuter").css("display", "none");
                        $(".dispAnsOuter").empty();
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert("Sorry, the quiz results could not be obtained.\nPlease try later.");
            }
        });
    });
});
</script>
</body>
</html>
