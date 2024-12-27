$(document).ready(function () {
    const $carouselSlide = $('.carousel-slide');
    const $carouselItems = $('.carousel-item');
    const slideWidth = $carouselItems.outerWidth(true); // Lebar satu slide
    const totalSlides = $carouselItems.length;

    // Gandakan konten untuk seamless loop
    $carouselSlide.append($carouselSlide.html());

    let currentPosition = 0;

    function moveCarousel() {
        currentPosition -= slideWidth;

        // Animasi transisi
        $carouselSlide.css('transition', 'transform 0.5s ease');
        $carouselSlide.css('transform', `translateX(${currentPosition}px)`);

        // Jika mencapai ujung konten asli, reset posisi tanpa animasi
        if (Math.abs(currentPosition) >= slideWidth * totalSlides) {
            setTimeout(() => {
                $carouselSlide.css('transition', 'none');
                currentPosition = 0;
                $carouselSlide.css('transform', `translateX(${currentPosition}px)`);
            }, 500); // Durasi transisi
        }
    }

    // Pindahkan gambar secara otomatis setiap 3 detik
    setInterval(moveCarousel, 3000);
});
