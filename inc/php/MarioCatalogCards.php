<?php
    $getCatalogData = file_get_contents("$headerData[Path]inc/js/json/MarioCatalog.json");

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
            $numEntries = intval($arrayJSON["TotalEntryNum"]);
            for($i = 1; $i <= $numEntries; ++$i, ++$carouselIDCounter)
            {
                $entry = "Mario" . strval($i);

                /* Start of card info */
                echo "<div class='col-12 col-md-6 mt-4 d-flex align-items-stretch'>"
                     .   "<div class='card marioCard'>";

                /*
                    If you change the class name for image formatting, you have to change the IMGCLs JSON field
                    The carousel does not automatically change photos, but has a fade effect when < > are clicked
                        This is data-interval='false'. Make true to auto-change
                */
                echo "<p class='text-center superMario marioHeader'>" . $arrayJSON[$entry]["Name"] . "</p>"
                     ."<div id='controls" . $carouselIDCounter . "' class='carousel slide carousel-fade mt-4' data-interval='false'>"
                     .  "<div class='carousel-inner'>"
                     .      "<div class='carousel-item active text-center'>"
                     .          "<a href='$headerData[Path]" . $arrayJSON[$entry]["IMGFnt"] . "' class='" . $arrayJSON[$entry]["IMGCls"] . "' alt='" . $arrayJSON[$entry]["Name"] . "'>"
                     .              "<img src='$headerData[Path]" . $arrayJSON[$entry]["IMGFnt"] . "' class='" . $arrayJSON[$entry]["IMGCls"] . "' alt='" . $arrayJSON[$entry]["Name"] . "'>"
                     .          "</a>"
                     .      "</div>";

                /* Reverse image if it exists */
                if($arrayJSON["$entry"]["IMGBak"] != "NOIMG")
                {
                    echo "<div class='carousel-item text-center'>"
                         .  "<a href='$headerData[Path]" . $arrayJSON[$entry]["IMGBak"] . "' class='" . $arrayJSON[$entry]["IMGCls"] . "' alt='" . $arrayJSON[$entry]["Name"] . "'>"
                         .      "<img src='$headerData[Path]" . $arrayJSON[$entry]["IMGBak"] . "' class='" . $arrayJSON[$entry]["IMGCls"] . "' alt='" . $arrayJSON[$entry]["Name"] . "'>"
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
                     .              "<pre class='jakks-grn'>Price: \$" . $arrayJSON[$entry]["Price"] . "</pre>"
                     .              "<pre class='mario-ylw'>Store: " . $arrayJSON[$entry]["Store"] . "</pre>"
                     .              "<pre class='mario-blu'>Date: " . $arrayJSON[$entry]["Date"] . "</pre>"
                     .              "<pre class='jakks-red'>Notes:</pre>"
                     .          "</div>"
                     .          "<div class='col-12'>"
                     .              "<p class='co-w marioNotes'>" . $arrayJSON[$entry]["Notes"] . "</p>"
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
        }
    }
