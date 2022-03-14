$(function () {
    $("body").on("click","#Edit",function () {
        window.alert("Would You like to continue?");
        $(this).toggle();
        // $("#btnn").show();
        $("#username").hide();
        $("#email").hide();
        $("#uid").hide();
        $("#Update").toggle();
    });
});

$("body").on("click", ".#Update", function (e) {
    e.preventDefault();
});