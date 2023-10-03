/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */
$(document).ready(function () {
    // Hide all content boxes except the first one
    $(".select").not(":first").hide();

    // Check the first radio button
    $('input[type="radio"]').click(function () { });

    $('input[type="radio"]').click(function () {
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);

        // Check if the targetBox is currently visible
        var isVisible = $(targetBox).is(":visible");

        // Hide all content boxes
        $(".select").hide();

        // Uncheck all radio buttons
        $('input[type="radio"]').prop('checked', false);

        // If the targetBox was not visible before, show it and check the corresponding radio button
        if (!isVisible) {
            $(targetBox).show();
            $(this).prop('checked', true);
        }
    });

});

