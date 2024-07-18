<script src="../js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    var splide = new Splide(".splide", {
      // type   : 'loop',
      perPage: 3,
      perMove: 1,
      breakpoints: {
        767: {
          perPage: 1,
        },
        991: {
          perPage: 2,
        },
      },
    });
    splide.mount();
  });
</script>
@yield('scripts')
