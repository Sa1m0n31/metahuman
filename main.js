let currentSlide = 0;

const sliderItems = Array.from(document.querySelectorAll('.slider__item'));
const sliderDots = Array.from(document.querySelectorAll('.slider__controls__item--dot'));

const switchSlides = (a, b) => {
    sliderItems[a].style.zIndex = '-1';
    sliderItems[a].style.opacity = '0';
    sliderItems[b].style.zIndex = '3';
    sliderItems[b].style.opacity = '1';

    sliderDots[a].style.background = 'transparent';
    sliderDots[b].style.background = '#fff';
}

const nextSlide = () => {
    const oldSlide = currentSlide;

    if(currentSlide === 2) {
        currentSlide = 0;
    }
    else {
        currentSlide++;
    }

    switchSlides(oldSlide, currentSlide);
}

const prevSlide = () => {
    const oldSlide = currentSlide;

    if(currentSlide === 0) {
        currentSlide = 2;
    }
    else {
        currentSlide--;
    }

    switchSlides(oldSlide, currentSlide);
}

const goToSlide = (n) => {
    const oldSlide = currentSlide;
    currentSlide = n;

    switchSlides(oldSlide, currentSlide);
}
