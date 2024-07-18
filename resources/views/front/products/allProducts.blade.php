<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ALL Products</title>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .alert {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px 20px;
            background-color: rgba(25, 212, 25, 0.8);
            color: #fff;
            border-radius: 5px;
            z-index: 9999;
        }

        /* Cart container */
        .cart {
            position: fixed;
            right: 0;
            top: 0;
            width: 300px;
            height: 100%;
            background-color: #fff;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            display: none;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Cart title */
        .cart-title {
            font-size: 1.5em;
            text-align: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        /* Cart content */
        .cart-content {
            flex-grow: 1;
            overflow-y: auto;
        }

        /* Individual cart item */
        .cart-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        /* Product image */
        .cart-item img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            margin-right: 10px;
            border-radius: 5px;
        }

        /* Item details */
        .item-details {
            flex-grow: 1;
        }

        .item-details h4 {
            font-size: 1em;
            margin: 0;
        }

        .item-details p {
            color: #888;
            margin: 5px 0;
        }

        /* Quantity input */
        .quantity-input {
            width: 50px;
            margin: 5px 0;
        }

        /* Delete button */
        .delete-btn {
            background-color: #ff4d4d;
            width: 33%;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 3px 5px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #ff0000;
        }

        /* Item total */
        .item-total {
            font-size: 1em;
            font-weight: bold;
            color: #333;
        }

        /* Total section */
        .total {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-top: 1px solid #ddd;
        }

        .total-title {
            font-size: 1.2em;
        }

        .total-price {
            font-size: 1.2em;
            font-weight: bold;
            color: #333;
        }

        /* Buy Now button */
        .btn-buy {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 1em;
            width: 100%;
            text-align: center;
            border-radius: 0 0 5px 5px;
        }

        .btn-buy:hover {
            background-color: #45a049;
        }

        /* Close icon */
        .icons {
            text-align: right;
            padding: 10px;
        }

        .icons i {
            cursor: pointer;
            font-size: 1.5em;
            color: #333;
        }
    </style>

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
                <div class="iconShopping">
                    <i class="ri-shopping-cart-line" id="cart-icon"></i>
                    <span id="count">{{ count($cartItems )}}</span>
                  </div>
            </div>
        </div>
    </div>


    <div class="splide">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">Slide 1</li>
                <li class="splide__slide">Slide 2</li>
                <li class="splide__slide">Slide 3</li>
            </ul>
        </div>
    </div>


    {{-- display all products  --}}
    <section class="shop container" style="margin-top: 150px; padding-bottom: 50px;">
        <h2 class="heading text-center mb-5">ALL Products</h2>
        <!-- Content  -->
        <div class="shop-content">
            @foreach ($allProducts as $product)
                <div class="product-box" data-id="{{ $product->id }}">
                    <div class="image">
                        <a href="#" target="_blank">
                            <img src="{{ asset('storage/'. $product->product_image) }}" alt="Product Image"
                                class="product-img">
                        </a>
                    </div>
                    <div class="title_price mt-4 ms-2" >
                        <h2 class="product-title">Product Name : {{ $product->name }}</h2>
                        <p class="price">price : {{ $product->price }}$</p>
                        <p class="compare-price">Compare-price : {{ $product->compare_price }}$</p>
                        <p class="compare-price">Description : {{ $product->description }}</p>
                        <p class="type">Type : {{ $product->type }}</p>
                    </div>
                    <div class="product_icons">
                        {{-- <i class="fa-solid fa-cart-shopping add-cart" data-id="{{ $product->id }}"></i> --}}

                        <div class="product">
                            <i class="fas fa-cart-plus add-cart" data-id="{{ $product->id }}"></i>
                        </div>

                        <i style="color: rgb(25, 212, 25)"
                            class="fa-solid fa-heart add-heart {{ $product->product_id ? 'red-heart' : '' }}"
                            data-id="{{ $product->id }}"></i>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    {{-- end display all products  --}}

    <div class="cart" id="cart">
        <h2 class="cart-title">Your Cart</h2>
        <!-- Content -->
        <div class="cart-content">
            @foreach ($cartItems as $item)
                <div class="cart-item">
                    <img src="{{ $item['product_image'] }}" alt="{{ $item['name'] }}">
                    <div class="item-details">
                        <h4 style="font-size: 20px">{{ $item['name'] }}</h4>
                        <p>${{ $item['price'] }}</p>
                        Q:<input style="border: none;" type="number" value="{{ $item['quantity'] }}"
                            data-id="{{ $item['product_id'] }}" class="quantity-input">
                        <button class="delete-btn" data-id="{{ $item['product_id'] }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <div class="item-total">
                        ${{ $item['total_price'] }}
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Total  -->
        <div class="total">
            <div class="total-title">Total</div>
            <div class="total-price">${{ $totalSum }}</div>
        </div>
        <!-- Buy Now  -->
        <button type="button" class="btn-buy">Buy Now</button>
        <!-- Cart Close  -->
        <div class="icons">
            <i class="ri-close-line" id="close-cart"></i>
        </div>
    </div>



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

    <script>
        $(document).ready(function() {
            $('#cart-icon').on('click', function() {
                $('#cart').toggle();
            });

            // Close cart on close icon click
            $('#close-cart').on('click', function() {
                $('#cart').hide();
            });
        });
    </script>
    {{-- <script src="{{ asset('js/main.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/js/splide.min.js"></script>
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
    <script>
        $(document).ready(function() {
            $('.add-heart').on('click', function() {
                var productId = $(this).data('id');
                var heartIcon = $(this);

                $.ajax({
                    url: "{{ route('wishlist.add') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_id: productId
                    },
                    success: function(response) {
                        heartIcon.toggleClass('red-heart');
                        showAlert('Product added to wishlist successfully');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // Debugging
                    }
                });
            });

            function showAlert(message) {
                var alert = $('<div class="alert alert-success">' + message + '</div>');
                $('body').append(alert);
                setTimeout(function() {
                    alert.fadeOut('slow');
                }, 4000); // 4 seconds
            }
        });
    </script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

    <!-- Custom Scripts -->
    <script>
        $(document).ready(function() {
            // Toggle cart display
            $('#iconShopping').on('click', function() {
                $('#cart').show();
            });
            $('#iconShopping').on('click', function() {
                $('#cart').hide();
            });

            // Add to cart functionality
            $('.add-cart').on('click', function() {
                var productId = $(this).data('id');
                $.ajax({
                    url: '{{ route('add.to.cart') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        product_id: productId,
                        quantity: 1
                    },
                    success: function(response) {
                        if (response.success) {
                            var currentCount = parseInt($('#count').text());
                            $('#count').text(currentCount + 1);
                            alert(response.message);
                            location.reload(); // Refresh cart
                        } else {
                            alert('Failed to add item to cart');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('An error occurred. Please try again later.');
                    }
                });
            });

            // Update cart item quantity
            $('.quantity-input').on('change', function() {
                var productId = $(this).data('id');
                var quantity = $(this).val();
                $.ajax({
                    url: '{{ route('cart.update') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        product_id: productId,
                        quantity: quantity
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            location.reload(); // Refresh cart
                        } else {
                            alert('Failed to update cart');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('An error occurred. Please try again later.');
                    }
                });
            });

            // Delete cart item
            $(document).ready(function() {
                // Delete cart item
                $('.delete-btn').on('click', function() {
                    var productId = $(this).data('id');
                    $.ajax({
                        url: '{{ route('cart.delete') }}',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            product_id: productId
                        },
                        success: function(response) {
                            if (response.success) {
                                alert(response.message);
                                location.reload(); // Refresh cart
                            } else {
                                alert('Failed to delete item from cart');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('An error occurred. Please try again later.');
                        }
                    });
                });
            });

        });
    </script>

</body>

</html>
