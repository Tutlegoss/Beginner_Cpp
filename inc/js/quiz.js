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
        while(i <= numQuestions) {
            var id = "q" + i.toString();
            choices.push($('input[name="' + id + '"]:checked').val());
            ++i;
        }

        $.ajax({
            url:      path + "inc/php/quizResults.php",
            data:     {Title:fn},
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
