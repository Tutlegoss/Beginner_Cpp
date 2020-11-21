<?php

    /* Sanitize code and questions to contain HTML special chars */
    function sanitize($question = NULL, $code = NULL, $numLines = NULL, $output = NULL)
    {
        /* Do text replacement so as to not have HTML injection */
        $actualChars = ["&", "<", ">", "'", '"', "\\n"];
        $specialChars = ["&amp;", "&lt;", "&gt;", "&apos;", "&quot;", "\n"];

        /* str_replace(Existing, New, String) */
        $question = str_replace($actualChars, $specialChars, $question);
        $code = str_replace($actualChars, $specialChars, $code);
        $numLines = str_replace($actualChars[5], $specialChars[5], $numLines);
        $output = str_ireplace("``N", "<br>", $output);

        return array("Question" => $question, "Code" => $code, "NumLines" => $numLines, "Output" => $output);
    }

    /* The next two functions explain themselves pretty well */
    function colorCode(&$code)
    {
        $symbols = ["``C", "``G", "``M", "``O", "``R", "``T", "``W", "``Y", "`~"];
        $spans = ["<span class='co-c'>", "<span class='co-g'>", "<span class='co-m'>",
                  "<span class='co-o'>", "<span class='co-r'>", "<span class='co-t'>",
                  "<span class='co-w'>", "<span class='co-y'>", "</span>"];
        $code = str_ireplace($symbols, $spans, $code);
    }

    function constructCode($qNum, $code, $numLines, $output = NULL)
    {
        $html = "<div class='exBoxPurpleQuiz' id='result$qNum'> \r\n"
                ."<figure class='code'> \r\n"
                ."<pre><table class='table borderless my-auto'> \r\n"
                ."<tr> \r\n"
                ."<td><pre id='lineNum$qNum' class='co-o'>$numLines"
                ."</pre></td> \r\n"
                ."<td><pre class='co-g' id='sourceCode$qNum'>$code"
                ."</pre></td> \r\n"
                ."</tr></table></pre> \r\n"
                ."<p class='ml-2 mb-2' id='output$qNum'>$output</p> \r\n"
                ."</figure> \r\n"
                ."</div> \r\n";

        return $html;
    }