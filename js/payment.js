/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */
$(document).ready(function () {
    $(".select").not(":first").hide();

    $('input[type="radio"]').click(function () { });

    $('input[type="radio"]').click(function () {
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);

        var isVisible = $(targetBox).is(":visible");

        $(".select").hide();

        $('input[type="radio"]').prop('checked', false);

        if (!isVisible) {
            $(targetBox).show();
            $(this).prop('checked', true);
        }
    });

});

