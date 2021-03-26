<?php
    $JSONFile = "$headerData[Path]inc/js/json/" . $JSONID . ".json";
    $getCatalogData = file_get_contents($JSONFile);

    if($getCatalogData == FALSE)
    {
        echo "<p>Catalog JSON didn't fetch.</p>";
    }
    else
    {
        $arrayJSON = json_decode($getCatalogData, TRUE);
        if($arrayJSON == FALSE)
        {
            echo "<p>Catalog JSON didn't decode.</p>";
        }
        else
        {
            if(array_key_exists("Note", $arrayJSON))
            {
                echo "<div class='row'>"
                     .  "<div class='col-12 col-md-8 mt-4 mb-4 mx-auto'>"
                     .      "<h5 class='marioTopNote ninFont ml-4'>" . $arrayJSON["Note"] . "</h5>"
                     .  "</div>"
                     ."</div>";
            }

            $numSections = intval($arrayJSON["TotalSections"]);
            for($section = 1; $section <= $numSections; ++$section)
            {
                /* Section Header */
                echo "<div class='row'>"
                     .  "<div class='col-12 mt-4 mb-4'>"
                     .      "<h1 class='snes ml-4'>" . $arrayJSON[$section]["SectionName"] . "</h1>"
                     .  "</div>"
                     ."</div>";

                /* Start of cards */
                echo "<div class='container-fluid'>"
                     .  "<div class='row marioRowPadding'>";

                $numEntries = intval($arrayJSON[$section]["TotalEntryNum"]);
                for($marioEntryNum = 1; $marioEntryNum <= $numEntries; ++$marioEntryNum, ++$carouselIDCounter)
                {
                    $entry = "Mario" . strval($marioEntryNum);

                    /* Start of card info */
                    echo "<div class='col-12 col-md-6 mt-4 d-flex align-items-stretch'>"
                         .   "<div class='card marioCard'>";

                    /*
                        If you change the class name for image formatting, you have to change the IMGCLs JSON field
                        The carousel does not automatically change photos, but has a fade effect when < > are clicked
                            This is data-interval='false'. Make true to auto-change
                    */
                    echo "<p class='text-center superMario marioHeader'>" . $arrayJSON[$section][$entry]["Name"] . "</p>"
                         ."<div id='controls" . $carouselIDCounter . "' class='carousel slide carousel-fade mt-4' data-interval='false'>"
                         .  "<div class='carousel-inner'>";

                    /* Attach photos. Entries usually contain a front and back, but there are exceptions such as a 'Funko-esque' box */
                    $numImgs = intval($arrayJSON[$section][$entry]["ImgCount"]);
                    for($imgEntryNum = 1; $imgEntryNum <= $numImgs; ++$imgEntryNum)
                    {
                        if($imgEntryNum == 1)
                            echo "<div class='carousel-item active text-center'>";
                        else
                            echo "<div class='carousel-item text-center'>";

                        echo    "<a href='$headerData[Path]" . $arrayJSON[$section][$entry]["Images"][$imgEntryNum] . "' class='" . $arrayJSON[$section][$entry]["IMGCls"] . "' alt='" . $arrayJSON[$section][$entry]["Name"] . "'>"
                             .      "<img data-src='$headerData[Path]" . $arrayJSON[$section][$entry]["Images"][$imgEntryNum] . "' class='lazy " . $arrayJSON[$section][$entry]["IMGCls"] . "' alt='" . $arrayJSON[$section][$entry]["Name"] . "'>"
                             .  "</a>"
                             ."</div>";
                    }

                    /* End of <div class='carousel-inner'> */
                    echo "</div>";

                    /*
                        Controls to switch between front and back images
                        End of <div id='controls" . $carouselIDCounter . "' class='carousel slide carousel-fade mt-4' data-interval='false'
                    */
                    echo "<a class='carousel-control-prev' href='#controls" . $carouselIDCounter . "' role='button' data-slide='prev'>"
                         .  "<span class='carousel-control-prev-icon' aria-hidden='true'></span>"
                         .  "<span class='sr-only'>Previous</span>"
                         ."</a>"
                         ."<a class='carousel-control-next' href='#controls" . $carouselIDCounter . "' role='button' data-slide='next'>"
                         .  "<span class='carousel-control-next-icon' aria-hidden='true'></span>"
                         .  "<span class='sr-only'>Next</span>"
                         ."</a>"
                        ."</div>";

                    /*  Card body - Information about item */
                    echo "<div class='card-body'>"
                         .  "<div class='marioInfo'>"
                         .      "<div class='row'>"
                         .          "<div class='col-12 mt-2 text-center'>"
                         .              "<pre class='jakks-grn'>Price: \$" . $arrayJSON[$section][$entry]["Price"] . "</pre>"
                         .              "<pre class='mario-ylw'>Store: " . $arrayJSON[$section][$entry]["Store"] . "</pre>"
                         .              "<pre class='mario-blu'>Date: " . $arrayJSON[$section][$entry]["Date"] . "</pre>"
                         .              "<pre class='jakks-red'>Notes:</pre>"
                         .          "</div>"
                         .          "<div class='col-12'>"
                         .              "<p class='co-w marioNotes'>" . $arrayJSON[$section][$entry]["Notes"] . "</p>"
                         .          "</div>"
                         .      "</div>"
                         .  "</div>"
                         ."</div>";

                    /*
                        End of      <div class='card marioCard'>
                                <div class='col-12 col-md-6 mt-4 d-flex align-items-stretch'>
                    */
                    echo "</div></div>";
                }

                /*
                    End of      <div class='container-fluid'>
                           <div class='row marioRowPadding'>
                */
                echo "</div></div>";
            }
        }
    }
