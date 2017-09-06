$(document).ready(function () {

    $(function () {
        $('#showDice').on('click', function () {
            $('#diceRoller').toggle();
        });
    });

    var dieNum;

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    function rollDie(num) {
        num = num.substring(1, num.length);
        $(".die").html(getRandomInt(1, num));
    }

    $(".roll").on("click", function () {
        dieNum = $(this).html();
        rollDie(dieNum);
    });

    //show login overlay
    $("#loginButton").click(function () {
        $("#login").css("height", "25%")
    });
    //hide the overlay
    $("#hideLogin").click(function () {
        $("#login").css("height", "0%");
        return (false)
    });

    //show register overlay
    $("#registerButton").click(function () {
        $("#register").css("height", "30%")
    });
    //hide the overlay
    $("#hideRegister").click(function () {
        $("#register").css("height", "0%");
        return (false)
    });


});