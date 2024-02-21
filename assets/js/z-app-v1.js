var $ = jQuery;

document.addEventListener("DOMContentLoaded", function () {
    if (window.innerWidth > 992) {

        document.querySelectorAll('.navbar .nav-item').forEach(function (everyitem) {

            everyitem.addEventListener('mouseover', function (e) {

                let el_link = this.querySelector('a[data-bs-toggle]');

                if (el_link != null) {
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.add('show');
                    nextEl.classList.add('show');
                }

            });
            everyitem.addEventListener('mouseleave', function (e) {
                let el_link = this.querySelector('a[data-bs-toggle]');

                if (el_link != null) {
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.remove('show');
                    nextEl.classList.remove('show');
                }


            })
        });

    }
});

$(document).ready(function () {


    if (window.innerWidth > 767) {
        $(".nav-link").on("click", function () {
            location.href = $(this).attr("href")
        });
    }

    var swiper = new Swiper(".swiper", {
        autoplay: {
            delay: 11000,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
    });

    $(".news-hero .col-4, .news-section .news-box").on("click", function () {
        location.href = '/single-news'
    });

    $(".blog-section .col-4").on("click", function () {
        location.href = '/single-blog'
    });
	


});

