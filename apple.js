$(document).ready(function () {

    $(function(){
        $('#showDice').on('click',function(){
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

    $(".roll").on("click", function() {
        dieNum = $(this).html();
        rollDie(dieNum);
    });

});