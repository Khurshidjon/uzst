<!DOCTYPE html>
<html lang="en">
<head>
    <title>Single Product</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('front/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/product_responsive.css') }}">
</head>

<body>

<div class="super_container">
    <!-- Header -->
    <header class="header">

        <!-- Top Bar -->

        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('images/phone.png') }}" alt=""></div>+38 068 005 3570</div>
                        <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('images/mail.png') }}" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
                        <div class="top_bar_content ml-auto">
                            <div class="top_bar_menu">
                                <ul class="standard_dropdown top_bar_dropdown">
                                    <li>
                                        <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="#">Italian</a></li>
                                            <li><a href="#">Spanish</a></li>
                                            <li><a href="#">Japanese</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="#">EUR Euro</a></li>
                                            <li><a href="#">GBP British Pound</a></li>
                                            <li><a href="#">JPY Japanese Yen</a></li>
                                        </ul>
                                    </li>

                                    <div class="top_bar_user">
                                        @guest
                                            <div>
                                                <div class="user_icon"><img src="images/user.svg" alt=""></div>
                                                <a href="{{ route('register') }}">Register</a>
                                            </div>
                                            <div>
                                                <div class="user_icon"><img src="images/user.svg" alt=""></div>
                                                <a href="{{ route('login') }}">Sign in</a>
                                            </div>
                                        @else
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                                    <i class="fa fa-user-circle"></i>
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                            Logout
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endguest
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{--Section for add new danger product--}}
    <div class="container w-75">
        <h2 class="text-info">Add new Product</h2>
        <form action="{{ route('create.product') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category_id">Mahsulot kategoriyas <span class="text-danger">*</span></label>
                        <select name="category_id" id="" class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                            @if ($errors->has('category_id'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                            @endif
                                <option value="" disabled selected>--Select once--</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->categories }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="country_id">Kelib chiqishi <span class="text-danger">*</span></label>
                        <select name="country_id" id="" class="form-control {{ $errors->has('country_id') ? ' is-invalid' : '' }}">
                            @if ($errors->has('country_id'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('country_id') }}</strong>
                        </span>
                            @endif
                                <option value="" disabled selected>--Select once--</option>
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->countries }}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="date_born">Ishlab chiqarilgan sanasi <span class="text-danger">*</span></label>
                        <input id="date_born" name="date_born" type="date"  class="form-control {{ $errors->has('date_born') ? ' is-invalid' : '' }}" placeholder="01/01/2018">
                        @if ($errors->has('date_born'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('date_born') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="found_date">Yaroqsizlik aniqlangan sana <span class="text-danger">*</span></label>
                        <input id="found_date" name="found_date" type="date"  class="form-control {{ $errors->has('found_date') ? ' is-invalid' : '' }}" placeholder="01/01/2018">
                        @if ($errors->has('found_date'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('found_date') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="date_death">Yaroqlilik muddati <span class="text-danger">*</span></label>
                        <input id="date_death" name="date_death" type="date"  class="form-control {{ $errors->has('date_death') ? ' is-invalid' : '' }}" placeholder="01/01/2018">
                        @if ($errors->has('date_death'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('date_death') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                    <div class="col-md-8">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Mahsulot nomi <span class="text-danger">*</span></label>
                    <input id="title" type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" >
                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="buy_place">Xarid qilingan joy <span class="text-danger">*</span></label>
                    <input id="buy_place" type="text" name="buy_place" class="form-control {{ $errors->has('buy_place') ? ' is-invalid' : '' }}" >
                    @if ($errors->has('buy_place'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('buy_place') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="details">Mahsulot haqida <span class="text-danger">*</span></label>
                    <textarea id="details" name="details" rows="4" class="form-control {{ $errors->has('details') ? ' is-invalid' : '' }}"></textarea>
                    @if ($errors->has('details'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('details') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="danger">Mahsulot xavfi haqida <span class="text-danger">*</span></label>
                    <textarea id="danger" name="danger" rows="4" class="form-control {{ $errors->has('danger') ? ' is-invalid' : '' }}"></textarea>
                    @if ($errors->has('danger'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('danger') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="danger_type">Mahsulot aybi <span class="text-danger">*</span></label>
                    <textarea id="danger_type" name="danger_type" rows="4" class="form-control {{ $errors->has('danger_type') ? ' is-invalid' : '' }}"></textarea>
                    @if ($errors->has('danger_type'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('danger_type') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="product_photo">Mahsulot rasmi <span class="text-danger">*</span></label>
                    <input id="product_photo" type="file" name="photos[]" class="form-control {{ $errors->has('photos') ? ' is-invalid' : '' }}" multiple>
                    @if ($errors->has('photos'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('photos') }}</strong>
                        </span>
                    @endif
                </div>
                </div>

            </div>
            <button type="submit" class="btn btn-outline-info">Add new Product</button>
        </form>
    </div>
    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 footer_col">
                    <div class="footer_column footer_contact">
                        <div class="logo_container">
                            <div class="logo"><a href="#">OneTech</a></div>
                        </div>
                        <div class="footer_title">Got Question? Call Us 24/7</div>
                        <div class="footer_phone">+38 068 005 3570</div>
                        <div class="footer_contact_text">
                            <p>17 Princess Road, London</p>
                            <p>Grester London NW18JR, UK</p>
                        </div>
                        <div class="footer_social">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-google"></i></a></li>
                                <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 offset-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Find it Fast</div>
                        <ul class="footer_list">
                            <li><a href="#">Computers & Laptops</a></li>
                            <li><a href="#">Cameras & Photos</a></li>
                            <li><a href="#">Hardware</a></li>
                            <li><a href="#">Smartphones & Tablets</a></li>
                            <li><a href="#">TV & Audio</a></li>
                        </ul>
                        <div class="footer_subtitle">Gadgets</div>
                        <ul class="footer_list">
                            <li><a href="#">Car Electronics</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer_column">
                        <ul class="footer_list footer_list_2">
                            <li><a href="#">Video Games & Consoles</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Cameras & Photos</a></li>
                            <li><a href="#">Hardware</a></li>
                            <li><a href="#">Computers & Laptops</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Customer Care</div>
                        <ul class="footer_list">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Order Tracking</a></li>
                            <li><a href="#">Wish List</a></li>
                            <li><a href="#">Customer Services</a></li>
                            <li><a href="#">Returns / Exchange</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Product Support</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <!-- Copyright -->

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                        <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="logos ml-sm-auto">
                            <ul class="logos_list">
                                <li><a href="#"><img src="{{ asset('images/logos_1.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('images/logos_2.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('images/logos_3.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('images/logos_4.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('front/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('front/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('front/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('front/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('front/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('front/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('front/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('front/js/product_custom.js') }}"></script>
</body>

</html>