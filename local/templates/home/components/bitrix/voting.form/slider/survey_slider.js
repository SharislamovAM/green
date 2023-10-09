
$('.nonloop-block-4').owlCarousel({
    center: true,
    items: 1,
    loop: false,
    dots: false,
    margin: 10,
    nav: true,
    mouseDrag: false,
    touchDrag: false,
    navText: ['<span class="icon-arrow_back">', ''],
    responsive: {
        600: {
            items: 1,
            nav: true,
            loop: false
        }
    },
});

let owl = $('.owl-carousel');
const radios = document.querySelectorAll('input[type="radio"]');

radios.forEach(radio => {
    radio.addEventListener('click', () => {
        if (radio.checked) {
            owl.trigger('next.owl.carousel');
        }
    });
});