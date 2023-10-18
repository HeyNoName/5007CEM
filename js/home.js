/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */



//slider
let slideIndex = 0;
showSlides();

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n - 1);
}

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("carousel-indicators")[0].getElementsByTagName("li"); // Access the individual <li> elements

    if (slideIndex >= slides.length) {
        slideIndex = 0;
    }
    if (slideIndex < 0) {
        slideIndex = slides.length - 1;
    }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    slides[slideIndex].style.display = "block";
    dots[slideIndex].className += " active";

    // Increment the slide index for the next automatic slide
    slideIndex++;

    // Set a timeout for the next automatic slide (adjust the time as needed)
    setTimeout(showSlides, 8000); // Change slide every 5 seconds
}


// showSlides(slideIndex += n);
//}
//
//function currentSlide(n) {
//  showSlides(slideIndex = n - 1);
//}
//
//function showSlides() {
//  let i;
//  let slides = document.getElementsByClassName("mySlides");
//  let dots = document.getElementsByClassName("dot");
//
//  if (slideIndex >= slides.length) { slideIndex = 0 }
//  if (slideIndex < 0) { slideIndex = slides.length - 1 }
//
//  for (i = 0; i < slides.length; i++) {
//    slides[i].style.display = "none";
//  }
//  for (i = 0; i < dots.length; i++) {
//    dots[i].className = dots[i].className.replace(" active", "");
//  }
//
//  slides[slideIndex].style.display = "block";
//  dots[slideIndex].className += " active";
//
//  // Increment the slide index for the next automatic slide
//  slideIndex++;
//  
//  // Set a timeout for the next automatic slide (adjust the time as needed)
//  setTimeout(showSlides, 5000); // Change slide every 3 seconds



//window.onscroll = function () {
//    myFunction()
//};

//            var header = document.getElementById("myHeader");
//            var sticky = header.offsetTop;
//
//            function myFunction() {
//                if (window.pageYOffset > sticky) {
//                    header.classList.add("sticky");
//                } else {
//                    header.classList.remove("sticky");
//                }
//            }

//best seller
//var multipleCardCarousel = document.querySelector(
//        "#carouselExampleControls"
//        );
//if (window.matchMedia("(min-width: 768px)").matches) {
//    var carousel = new bootstrap.Carousel(multipleCardCarousel, {
//        interval: false,
//    });
//    var carouselWidth = $(".carousel-inner")[0].scrollWidth;
//    var cardWidth = $(".carousel-item").width();
//    var scrollPosition = 0;
//    $("#carouselExampleControls .carousel-control-next").on("click", function () {
//        if (scrollPosition < carouselWidth - cardWidth * 4) {
//            scrollPosition += cardWidth;
//            $("#carouselExampleControls .carousel-inner").animate(
//                    {scrollLeft: scrollPosition},
//                    600
//                    );
//        }
//    });
//    $("#carouselExampleControls .carousel-control-prev").on("click", function () {
//        if (scrollPosition > 0) {
//            scrollPosition -= cardWidth;
//            $("#carouselExampleControls .carousel-inner").animate(
//                    {scrollLeft: scrollPosition},
//                    600
//                    );
//        }
//    });
//} else {
//    $(multipleCardCarousel).addClass("slide");
//}

$(document).ready(function () {
    // Activate Carousel
    $("#myCarousel").carousel();

    // Enable Carousel Indicators
    $(".item1").click(function () {
        $("#myCarousel").carousel(0);
    });
    $(".item2").click(function () {
        $("#myCarousel").carousel(1);
    });
    $(".item3").click(function () {
        $("#myCarousel").carousel(2);
    });

    // Enable Carousel Controls
    $(".carousel-control-prev").click(function () {
        $("#myCarousel").carousel("prev");
    });
    $(".carousel-control-next").click(function () {
        $("#myCarousel").carousel("next");
    });
});

function myFunction() {
    var x = document.getElementById("search");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

//function myFunction2() {
//    var x = document.getElementById("search");
//    if (x.style.display === "none") {
//        x.style.display = "block";
//    } else {
//        x.style.display = "none";
//    }
//}
//// Get references to the search input and search button
//const searchInput = document.getElementById('search');
//const searchButton = document.getElementById('searchButton');
//
//// Function to toggle the search bar
//function toggleSearch() {
//    if (searchInput.style.display === 'none' || searchInput.style.display === '') {
//        searchInput.style.display = 'inline-block'; // Show the input
//    } else {
//        searchInput.style.display = 'none'; // Hide the input
//    }
//}
//
//// You can add additional logic for handling search functionality here







