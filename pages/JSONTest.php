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
details.description summary::after {
  content: attr(data-open);
  opacity: 0;
  font-size: 50px;
}

details.description[open] summary::after {
  content: attr(data-open);
  opacity: 1;
  font-size: 14px;
}

details.description summary::before {
  content: attr(data-close);
  opacity: 0;
  font-size: 5px;
}

details.description:not([open]) summary::before {
  content: attr(data-close);
  opacity: 1;
  font-size: 14px;
}

details.description summary::after,
details.description summary::before {
  display: inline-block;
  transition: all .4s ease-in-out;
  transform-origin: center bottom;
}

</style>


</head>

<body>

	<?php require_once("../inc/navbar.inc.php"); ?>

	<div class="container-fluid">
	<div class="row">
	<div id="article" class="col-12">
        <details class="description" open>
  <summary data-open="Close" data-close="Show"></summary>
  <p>Description text</p>
</details>
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
                                        ."<input type='radio' name='q$i' id='q$i"."o$j' value='$j'>"
                                        ."<label for='q$i"."o$j' value='q$i"."o$j'>"
                                            ."<span class='ml-3 co-g'>".$option."</span>"
                                 ."</label></p></div>";
                        }
                        /* Flickering prevention / Results / End of question */
                        echo  "<div class='mb-5 dispAnsOuter'
                                               id='dispAnsOuter$i'></div>"
                             ."<div class='mb-5 dispAnsInner'
                                           id='dispAnsInner$i'></div>";
                    }
                    /* End the AJAX form */
                    echo  "<p class='col-2 ml-3'><button type='submit' id='answers' class='btn btnSub mt-4 ml-3'>Check Answers</button></p>"
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

<script>
$(document).ready(function() {

    /* Show/hide answer icon when user skipps a question */
    $(".dispAnsInner, .dispAnsOuter").on("click","details summary", function() {
        if($(this).children("i.fa-eye-slash").length)
            $(this).children("i").removeClass("fa-eye-slash").addClass("fa-eye");
        else
            $(this).children("i").removeClass("fa-eye").addClass("fa-eye-slash");
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
            url:      "../inc/quizResults.php",
            data:     {Title:"<?php echo $headerData["Title"] ?>"},
            async:    true,
            method:   "POST",
            dataType: "json",

            success: function(data)
            {
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
                            $(placement).removeClass("exBoxKelly exBoxMagenta").addClass("exBoxYellow");
                            $(placement).append('<details ' + para + '"><summary class="' + skipped + '<i class="fas fa-eye-slash"></i>'
                                                + qNum + ' Question skipped: Show Answer</summary><p>' + exp + '</details>');
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
                        $(".dispAnsOuter").css("display","");
                        $(".dispAnsInner").css("display","none");
                        $(".dispAnsInner").empty();
                    }
                    else
                    {
                        $(".dispAnsInner").css("display","");
                        $(".dispAnsOuter").css("display","none");
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
