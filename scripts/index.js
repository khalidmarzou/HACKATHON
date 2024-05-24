let currentSlide = 1;
const totalSlides = 10;

function showSlide(n) {
    const slides = document.querySelectorAll('.slide');

    slides.forEach((slide, index) => {
        slide.classList.remove('active');
        slide.style.opacity = '0';
        slide.style.transform = 'translateX(100%)';
    });

    slides[n - 1].classList.add('active');
    slides[n - 1].style.opacity = '1';
    slides[n - 1].style.transform = 'translateX(0)';
}

function nextSlide() {
    showSlide(currentSlide);
    
    if (currentSlide === totalSlides) {
        currentSlide = 1;
    } else {
        currentSlide++;
    }
}

// Show initial slide
showSlide(currentSlide);

// Change slide every 2 seconds
setInterval(nextSlide, 3000);
