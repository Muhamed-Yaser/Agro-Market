<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>
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
                    <a href="#contact">Contact</a>
                </ul>
                <div class="icon">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Start product  --}}
    <section class="best_seller">
        <div class="container">
            <div class="info">
                <div class="heading d-flex justify-content-between align-items-center">
                    <h3 class="m-0">Best Products</h3>
                    <a class="view_all" href="{{ route('Allproducts') }}">
                        <span>View All</span>
                        <div class="icon">
                            <i class="ri-arrow-drop-right-line"></i>
                        </div>
                    </a>
                </div>
                <div class="d-flex justify-content-start align-items-end">
                    <div class="splide best_seller overflow-hidden w-100" aria-labelledby="carousel-heading">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($products as $product)
                                    <li class="splide__slide">
                                        <div class="product">
                                            <div class="image">
                                                <a href="#" target="_blank">
                                                    <img src="{{ asset('storage/' . $product->product_image) }}"
                                                        alt="Product Image" height="50">
                                                </a>
                                            </div>
                                            <div class="title_price mt-4">
                                                <h2 class="product-title">{{ $product->name }}</h2>
                                                <span class="price">${{ $product->price }}</span>
                                                <span class="compare-price">${{ $product->compare_price }}</span>
                                                <span class="type">{{ $product->type }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Product  --}}

    {{-- start seller  --}}
    <div class="our_sellers">
        <div class="container">
            <h1 class="heading"> <span>Our</span> Sellers </h1>
            <div class="d-flex justify-content-start align-items-end">
                @foreach ($sellers as $seller)
                    <a href="#" class="profile">
                        <div class="image">
                            <img src="{{ asset('storage/'. $seller->image) }}" alt="Product Image" height="50">
                        </div>
                        <div class="info text-center mt-3">
                            <h5>{{ $seller->name }}</h5>
                            <p>{{ $seller->role }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    {{-- end seller  --}}

    <!--------------------------------------------start of contact ---------------------------------->
    <section class="contact" id="contact">
        <h1 class="heading"> <span>contact</span> us </h1>
        <div class="container">
            <h3 class="contact-title text-center">Have You Any Question ?</h3>
            <h4 class="contact-sub-title text-center">I'M AT YOUR SERVICES</h4>
            <div class="boxes d-flex justify-content-center align-items-center flex-wrap">
                <div class="box">
                    <div class="icon">
                        <i class="fa-solid fa-business-time"></i>
                    </div>
                    <h4>Business hours</h4>
                    <p class="m-0"> <span>Saturday-Friday :</span> 8:00 AM – 8:00 PM</p>
                </div>
                <div class="box">
                    <div class="icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <h4>Call Us On</h4>
                    <p>(647) 803-8443</p>
                </div>
                <div class="box">
                    <div class="icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <h4>Email</h4>
                    <p>test@gmail.com</p>
                </div>
            </div>
        </div>
    </section>
    <!--------------------------------------- end of contact ---------------------------------->

    <section class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <div class="box">
                        <div class="image">
                            <img src="../images/logo-removebg-preview.png" alt="">
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
                        @auth
                        <form id="logout-form" action="{{ route('logoutCustomer') }}" method="POST">
                            @csrf
                            <button class="btn btn-success" type="submit">Logout</button>
                        </form>
                    @endauth
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
