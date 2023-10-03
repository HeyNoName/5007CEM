/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}


// Hide all tier containers initially
var tierContainers = document.querySelectorAll(".tier-container");
tierContainers.forEach(function (container) {
    container.style.display = "none";
});

var tierSelect = document.getElementById("tierSelect");

tierSelect.addEventListener("change", function () {
    var selectedValue = this.value;

    // Hide all tier containers
    tierContainers.forEach(function (container) {
        container.style.display = "none";
    });

    // Show the selected tier container and all previous tier containers up to the selected tier
    for (var i = 1; i <= selectedValue; i++) {
        var selectedContainer = document.querySelector('.tier-container[data-tier="' + i + '"]');
        if (selectedContainer) {
            selectedContainer.style.display = "block";
        }
    }
});

// Get the select and textarea elements by their IDs
var styleSelect = document.getElementById("style");
var styleTextarea = document.getElementById("stylec");

// Add an event listener to the select element
styleSelect.addEventListener("change", function () {
    // Check if the selected value is "Others"
    if (styleSelect.value === "5") {
        // If "Others" is selected, display the textarea
        styleTextarea.style.display = "block";
    } else {
        // If any other option is selected, hide the textarea
        styleTextarea.style.display = "none";
    }
});


$(document).ready(function () {
    $('input[type="checkbox"]').click(function () {
        var inputValue = $(this).attr("value");
        $("." + inputValue + "-section").toggle();
    });
});


