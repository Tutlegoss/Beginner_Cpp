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
                     .      "<h5 class='marioTopNote fontNin'>" . $arrayJSON["Note"] . "</h5>"
                     .  "</div>"
                     ."</div>";
            }

            $numSections = intval($arrayJSON["TotalSections"]);
            for($section = 1; $section <= $numSections; ++$section)
            {
                /* Section Header */
                echo "<div class='row'>"
                     .  "<div class='col-12 mt-4 mb-4'>"
                     .      "<h1 class='fontSnes'>" . $arrayJSON[$section]["SectionName"] . "</h1>"
                     .  "</div>"
                     ."</div>";

                /* Start of cards */
                echo "<div class='container-fluid'>"
                     .  "<div class='row'>";

                $numEntries = intval($arrayJSON[$section]["TotalEntryNum"]);
                for($marioEntryNum = 1; $marioEntryNum <= $numEntries; ++$marioEntryNum, ++$carouselIDCounter)
                {
                    $entry = "Mario" . strval($marioEntryNum);

                    /* Start of card info */
                    echo "<div class='col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 mt-4 mb-4 d-flex align-items-stretch mx-sm-0 mx-lg-0 p-sm-0 p-md-1 p-lg-0'>"
                         .   "<div class='card marioCard'>";

                    /*
                        If you change the class name for image formatting, you have to change the IMGCLs JSON field
                        The carousel does not automatically change photos, but has a fade effect when < > are clicked
                            This is data-interval='false'. Make true to auto-change
                    */
                    echo "<p class='text-center fontSuperMario marioHeader' style='color: " . $arrayJSON[$section][$entry]["Color"] . ";'>" . $arrayJSON[$section][$entry]["Name"] . "</p>"
                         ."<div id='controls" . $carouselIDCounter . "' class='carousel slide carousel-fade' data-interval='false'>"
                         .  "<div class='carousel-inner'>";

                    /* Attach photos. Entries usually contain a front and back, but there are exceptions such as a 'Funko-esque' box */
                    $numImgs = intval($arrayJSON[$section][$entry]["ImgCount"]);
                    for($imgEntryNum = 1; $imgEntryNum <= $numImgs; ++$imgEntryNum)
                    {
                        if($imgEntryNum == 1)
                            echo "<div class='carousel-item active carousel-marioSize'>";
                        else
                            echo "<div class='carousel-item carousel-marioSize'>";

                        echo    "<a href='$headerData[Path]" . $arrayJSON[$section][$entry]["Images"][$imgEntryNum] . "'>"
                             .      "<img src='#' data-src='$headerData[Path]" . $arrayJSON[$section][$entry]["Images"][$imgEntryNum] . "' class='lazy marioImgSize' alt='" . $arrayJSON[$section][$entry]["Name"] . "'>"
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
                         .          "<div class='col-12 mt-1'>"
                         .              "<pre class='jakks-grn'>Price: \$" . $arrayJSON[$section][$entry]["Price"] . "</pre>"
                         .              "<pre class='mario-ylw'>Store: " . $arrayJSON[$section][$entry]["Store"] . "</pre>"
                         .              "<pre class='mario-blu'>Date: " . $arrayJSON[$section][$entry]["Date"] . "</pre>"
                         .              "<pre class='jakks-red text-center'>Notes:</pre>"
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
