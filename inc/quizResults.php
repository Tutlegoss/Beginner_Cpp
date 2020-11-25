<?php
    function fetchQuizResults()
    {

        header('Content-type: application/json');

        /* Contains all data for quiz */
        $getJSON = file_get_contents("../inc/quiz.json");

        /* Take care of any malformed queries */
        if($getJSON == FALSE || !isset($_POST["Title"]) || empty($_POST["Title"]))
            echo json_encode(array("Error" => "Quiz results currently unavailable.\nJSON or article title malformed."));
        else
        {
            /* Prepare JSON for parsing and ensure data is good */
            $arrayJSON = json_decode($getJSON, true);
            if($arrayJSON == FALSE)
                echo json_encode(array("Error" => "Quiz results currently unavailable.\nJSON or article title malformed."));
            else
            {
                /* Array declaration for answers */
                $results = [];

                /* Loop number of questions times */
                $numQuestions = ord($arrayJSON[$_POST["Title"]]["NumQuestions"]) - ord('0');
                for($i = 1; $i <= $numQuestions; ++$i)
                {
                    /* Store correct answer and a general explanation of the question */
                    $results["Answers$i"] = $arrayJSON[$_POST["Title"]]["$i"]["Answer"];
                    $results["Explanation$i"] = $arrayJSON[$_POST["Title"]]["$i"]["Explanation"];
                }

                /* Return the data for display */
                echo json_encode($results);
            }
        }
    }

    exit(fetchQuizResults());
