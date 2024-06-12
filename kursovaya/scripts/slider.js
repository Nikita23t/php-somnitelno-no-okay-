const sliderWrapper = document.getElementById('slider-wrapper');
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');
const indicators = document.querySelectorAll('.indicator');

let currentSlide = 0;

function showSlide(index) {
    const translateValue = -index * 100 + '%';
    sliderWrapper.style.transform = 'translateX(' + translateValue + ')';
}

function updateIndicators(index) {
    indicators.forEach((indicator, i) => {
        indicator.checked = i === index;
    });
}

function goToSlide(index) {
    currentSlide = index;
    showSlide(currentSlide);
    updateIndicators(currentSlide);
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % indicators.length;
    showSlide(currentSlide);
    updateIndicators(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + indicators.length) % indicators.length;
    showSlide(currentSlide);
    updateIndicators(currentSlide);
}

nextButton.addEventListener('click', nextSlide);
prevButton.addEventListener('click', prevSlide);

indicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => {
        goToSlide(index);
    });
});