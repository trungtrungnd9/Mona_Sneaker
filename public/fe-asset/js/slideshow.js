let slideIndex = 0;
const showSlides = () => {
    const slides = document.querySelectorAll(".slides");
    slides.forEach((slide) => (slide.style.display = "none"));
    slideIndex++;
    if (slideIndex > slides.length) slideIndex = 1;
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 5000);
};
showSlides();

const changeSlide = (n) => {
    slideIndex += n - 1;
    showSlides();
};
