<?php

    function data($arrayJSON)
    {
        /* Array declaration for answers */
        $results = [];

        /* Loop number of questions times */
        $numQuestions = ord($arrayJSON["NumQuestions"]) - ord('0');
        for($i = 1; $i <= $numQuestions; ++$i)
        {
            /* Store correct answer and a general explanation of the question */
            $results["Answers$i"] = $arrayJSON["$i"]["Answer"];
            $results["Explanation$i"] = $arrayJSON["$i"]["Explanation"];
        }

        /* Return the data for display */
        echo json_encode($results);
    }

    function err()
    {
        echo json_encode(array("Error" => "Quiz results currently unavailable.\nJSON or article title malformed."));
    }

    function fetchQuizResults()
    {
        header('Content-type: application/json');

        /* Contains all data for quiz */
        $getJSON = file_get_contents("../js/json/$_POST[Title].json");

        /* Take care of any malformed queries */
        if($getJSON == FALSE || !isset($_POST["Title"]) || empty($_POST["Title"]))
            err();
        else
        {
            /* Prepare JSON for parsing and ensure data is good */
            $arrayJSON = json_decode($getJSON, true);
            if($arrayJSON == FALSE)
                err();
            else
                data($arrayJSON);
        }
    }

    exit(fetchQuizResults());
