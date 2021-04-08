$(document).ready(function() {

    function windowSize() {
        document.getElementById("dimensions").innerHTML = window.innerWidth + "x" + window.innerHeight;
    };
    windowSize();

    window.addEventListener('resize', windowSize);

});
