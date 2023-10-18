/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */
/* global AOS */

// Initialize AOS with your desired configuration
AOS.init({
  duration: 1000, // Animation duration in milliseconds
  easing: 'ease', // Easing type ('ease', 'linear', 'ease-in', 'ease-out', 'ease-in-out')
  once: true // Whether to only animate elements once
});

// Add a scroll event listener
window.addEventListener('scroll', function () {
    const elements = document.querySelectorAll('[data-aos]');
    elements.forEach((element) => {
        if (isElementInViewport(element)) {
            element.classList.add('aos-animate');
        }
    });
});

// Function to check if an element is in the viewport
function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
}

