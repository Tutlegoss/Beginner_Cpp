<?php
    require_once("$headerData[Path]inc/php/quiz/quizCode.php");
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
            echo "<form name='quiz' id='quiz' class='mt-4 mb-4' action='#' method='POST'>";
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
                    $HTML = constructCode("$i", $preparedArray["Code"], $preparedArray["NumLines"], $preparedArray["Output"]);

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
                                    <label class='radioQuizLabel' for='q$i"."o$j'>"
                                        . $option .
                                    "</label>
                                </p>
                            </div>";
                }
                echo "<br><br>";

                /* Flickering prevention / Results / End of question */
                echo "<div class='row'>"
                     .    "<div class='col-auto'>"
                     .        "<div style='display: none' class='dispAnsOuter' id='dispAnsOuter$i'></div>"
                     .        "<div style='display: none' class='dispAnsInner' id='dispAnsInner$i'></div>"
                     .    "</div>"
                     ."</div>";
            }
            /* End the AJAX form */
            echo  "<div class='row mt-3'>"
                 .     "<div class='col-12'>"
                 .         "<button type='submit' id='answers' class='btn btnQuiz'>Check <br> Answers</button>"
                 .         "<button type='button' class='btn ml-3 cancel text-wrap' id='clearRadio'>Clear <br> Selections</button>"
                 .     "</div>"
                 ."</div>"
                 ."</form><br>";
        }
    }
