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

    // document.getElementById("toggleBtn").onclick = function() {
    //     var secondDiv = document.getElementById("hero-video");
    //     if (secondDiv.style.display === "none") {
    //         secondDiv.style.display = "block";
    //     } else {
    //         secondDiv.style.display = "none";
    //     }
    // };

});

// function playVideo() {
//     var videoContainer = document.getElementById("hero-video");
//     var video = document.getElementById("short-video");
//
//     // Show the video container
//     videoContainer.style.display = "block";
//
//     // Reset the video to the beginning and play
//     video.currentTime = 0;
//     video.play();
// }

document.addEventListener("DOMContentLoaded", function () {
    // Button Click Event
    document.getElementById("show-video-btn").addEventListener("click", function () {
        document.getElementById("hero-video").style.display = "block";
        document.getElementById("video").currentTime = 0;
        document.getElementById("video").play();
    });

    // Close Button Click Event
    document.getElementById("close-btn").addEventListener("click", function () {
        document.getElementById("hero-video").style.display = "none";
        document.getElementById("video").pause();
    });

    // Click Outside Video Container Event
    window.addEventListener("click", function (event) {
        var videoContainer = document.getElementById("hero-video");
        var video = document.getElementById("video");

        if (event.target === videoContainer) {
            videoContainer.style.display = "none";
            video.pause();
        }
    });
});