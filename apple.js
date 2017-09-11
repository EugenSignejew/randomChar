$(document).ready(function () {

    $("#showDice").click(function () {
        $("#diceRoller").animate({
            height: 'toggle'
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
        $("#login").css("height", "55%");
    });
    //hide the overlay
    $("#hideLogin").click(function () {
        $("#login").css("height", "0%");
        return (false)
    });

    //show register overlay
    $("#registerButton").click(function () {
        $("#register").css("height", "55%");
    });
    //hide the overlay
    $("#hideRegister").click(function () {
        $("#register").css("height", "0%");
        return (false)
    });


    function bigText($param) {
        $param.animate({fontSize: '1.5em'}, "slow");
    }

    $("#secretButton").click(function () {
        $("#secret").css("height", "100%");
        $("#half").delay(300).animate({width: 1745}, 1000);
        $("#skel").delay(2000).animate({left: 1900}, 3500);
        $("#spook").delay(5000).animate({
            height: "toggle"
        }, 5000);
    });
    //hide the overlay
    $("#hideSecret").click(function () {
        $("#secret").css("height", "0%");
        $("#half").animate({width: 0}, 200);
        $("#skel").delay.animate({left: -50}, 3500);
        $("#spook").animate({
            height: "toggle"
        }, 500);
        return (false)
    });


    $("#sword").delay(1000).animate({top: "30%"});
    $("#sword2").delay(1000).animate({top: "30%"});




    //change the apple again
});