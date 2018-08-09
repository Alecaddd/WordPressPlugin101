//global vars
const sliderView = document.querySelector('.ac-slider--view > ul'),
    sliderViewSlides = document.querySelectorAll('.ac-slider--view__slides'),
    arrowLeft = document.querySelector('.ac-slider--arrows__left'),
    arrowRight = document.querySelector('.ac-slider--arrows__right'),
    sliderLength = sliderViewSlides.length;

//slide me function
const slideMe = function (sliderViewItems, isActiveItem, sliderActiveItem) {
    isActiveItem.classList.remove('is-active');
    sliderActiveItem.classList.remove('is-active');
    sliderViewItems.classList.add('is-active');

    sliderView.setAttribute('style', 'transform:translateX(-' + sliderViewItems.offsetLeft + 'px)');
}

const beforeSlide = function(i) {
    let isActiveItem = document.querySelector('.ac-slider--view__slides.is-active'),
        currentItem = Array.from(sliderViewSlides).indexOf(isActiveItem) + i,
        nextItem = currentItem + i,
        sliderViewItems = document.querySelector('.ac-slider--view__slides:nth-child(' + nextItem + ')'),
        sliderActiveItem = document.querySelector('.ac-slider--view__slides.is-active');

    if (nextItem > sliderLength) {
        sliderViewItems = document.querySelector('.ac-slider--view__slides:nth-child(1)');
    }

    if (nextItem == 0) {
        sliderViewItems = document.querySelector('.ac-slider--view__slides:nth-child(' + sliderLength + ')');
    }

    slideMe(sliderViewItems, isActiveItem, sliderActiveItem);
}

//arrow function
arrowRight.addEventListener('click', () => beforeSlide(1));
arrowLeft.addEventListener('click', () => beforeSlide(0));