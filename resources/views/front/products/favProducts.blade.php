<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Favorite Products</title>
    <link rel="stylesheet" href="{{ asset('normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet" />
</head>

<body>
    <div class="Nav">
        <div class="container">
            <div class="content d-flex justify-content-between align-items-center flex-wrap">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                </div>
                <ul class="links">
                    <a href="{{ route('products') }}">Home</a>
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{ route('Allproducts') }}">Products</a>
                    <a href="{{ route('favProducts') }}">favorites</a>

                </ul>
                <div class="icon">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
    {{-- Display favorite products --}}
    <section class="shop container" style="margin-top: 150px; padding-bottom: 50px;">
        <h2 class="heading text-center mb-5">Favorite Products</h2>
        <!-- Content -->
        <div class="shop-content">
            @forelse($favs as $fav)
                <div class="product-box" data-id="{{ $fav->id }}">
                    <div class="image">
                        <a href="#" target="_blank">
                            <img src="{{ asset('storage/' . $fav->product_image) }}"
                                alt="Product Image">
                        </a>
                    </div>
                    <div class="title_price mt-4">
                        <h2 class="product-title">{{ $fav->name }}</h2>
                        <span class="price">${{ $fav->price }}</span>
                        <span class="compare-price">${{ $fav->compare_price }}</span>
                        <span class="type">{{ $fav->type }}</span>
                    </div>

                </div>
            @empty
                <div class="no-products text-center">
                    <p>No favorite products found.</p>
                </div>
            @endforelse
        </div>
    </section>
    {{-- End display favorite products --}}
    <section class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="box">
                        <div class="image">
                            <img src="{{ asset('images/logo-removebg-preview.png') }}" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem eveniet facilis nostrum
                            corrupti laudantium voluptatibus?</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="box">
                        <h3>quick links</h3>
                        <a class="link" href="{{ route('products') }}"> <i class="las la-angle-right"></i> Home</a>
                        <a class="link" href="{{ route('about') }}"> <i class="las la-angle-right"></i> About</a>
                        <a class="link" href=".{{ route('Allproducts') }}"> <i class="las la-angle-right"> </i> Products</a>
                        <a class="link" href="{{ route('favProducts') }}"> <i class="las la-angle-right"></i> favorites</a>
                        <a class="link" href="#contact"> <i class="las la-angle-right"></i> Contact</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="box">
                        <h3>Business hours</h3>
                        <p> <span>Sat - Fri :</span> 8:00 AM – 8:00 PM</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="box">
                        <h3>contact info</h3>
                        <a href="#" class="link"> <i class="ri-phone-fill"></i>(647) 803-8443</a>
                        <a href="mailto: test@gmail.com" class="link"> <i class="ri-mail-fill"></i> test@gmail.com
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
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
