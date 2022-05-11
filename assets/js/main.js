/* SLIDER */
let currentSlide = 0;

const switchSlides = (a, b) => {
    const sliderItems = Array.from(document.querySelectorAll('.slider__item'));
    const sliderDots = Array.from(document.querySelectorAll('.slider__controls__item--dot'));

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

/* MOBILE MENU */
const openMobileMenu = () => {
    const mobileMenu = document.querySelector('.mobileMenu');
    const mobileMenuChildren = Array.from(document.querySelectorAll('.mobileMenu>*'));

    mobileMenu.style.transform = 'scaleX(1)';
    setTimeout(() => {
        mobileMenuChildren.forEach((item) => {
           item.style.opacity = '1';
        });
    }, 300);
}

const closeMobileMenu = () => {
    const mobileMenu = document.querySelector('.mobileMenu');
    const mobileMenuChildren = Array.from(document.querySelectorAll('.mobileMenu>*'));

    mobileMenuChildren.forEach(((item) => {
        item.style.opacity = '0';
    }));
    setTimeout(() => {
        mobileMenu.style.transform = 'scaleX(0)';
    }, 300);
}

/* Shop filters */
let categoriesVisible = false;

const toggleCategories = () => {
    this.event.stopPropagation();
    const categories = document.querySelector('.filters__select__options');
    if(categories) {
        if(categoriesVisible) {
            categories.style.opacity = '0';
            categories.style.zIndex = '-1';
        }
        else {
            categories.style.opacity = '1';
            categories.style.zIndex = '3';
        }

        categoriesVisible = !categoriesVisible;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const archivePage = document.querySelector('.archive');
    if(archivePage) {
        archivePage.addEventListener('click', (event) => {
            console.log('click');
            if(categoriesVisible) {
                toggleCategories();
            }
        });
    }

    /* Contact translation */
    const labelSpans = Array.from(document.querySelectorAll('.grunion-field-label>span'));
    const submitBtn = document.querySelector('.contact__form .contact-submit button[type=submit]');

    if(labelSpans?.length) {
        labelSpans.forEach((item) => {
            item.textContent = '*';
        });
    }
    if(submitBtn) {
        submitBtn.textContent = 'Wyślij wiadomość';
    }
});