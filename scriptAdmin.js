/*
*
*
*
seconde landing scroling images
*
*
*
* */
const carousel = document.querySelector('.carousel');
const items = document.querySelectorAll('.item');

let currentIndex = 0;

function moveCarousel() {
    currentIndex = (currentIndex + 1) % (items.length - 2); // Adjusted for three images at a time
    const transformValue = `translateX(-${currentIndex * (33.33 + 10)}%)`; // Including margin-right
    carousel.style.transform = transformValue;
}

setInterval(moveCarousel, 5000); // Move carousel every 5 seconds


  
  
/*
*
*
*
seconde landing scroling images
*
*
*
* */