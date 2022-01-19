<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Islamic | Store</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href=" {{ asset('frontend') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href=" {{ asset('frontend') }}/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ url('/') }}"><img src=" {{ asset('frontend') }}/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            @php
                $total = App\Models\Cart::all()->where('user_ip', request()->ip())->sum(
                    function($t){
                        return $t->price * $t->qty;
                    }
                );
                $quantity = App\Models\Cart::all()->where('user_ip', request()->ip())->sum('qty');
                $wishlist = App\Models\Wishlist::where('user_id', Auth::id())->get();
            @endphp
            <ul>
                <li><a href="{{ url('wishlist') }}"><i class="fa fa-heart"></i> <span>{{ count($wishlist) }}</span></a></li>
                <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-bag"></i> <span>{{ $quantity }}</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>TK: {{ $total }}</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src=" {{ asset('frontend') }}/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="@yield('frontendHomeActive')"><a href="{{ route('frontend.home') }}">Home</a></li>
                <li class="@yield('frontendShopActive')"><a href="{{ route('shop.page') }}">Shop</a></li>
                <li class="@yield('frontendContactActive')"><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a target="_blank" href="https://www.facebook.com/mahir.shahriaradnan/"><i class="fa fa-facebook"></i></a>
            <a target="_blank" href="https://twitter.com/i/flow/login"><i class="fa fa-twitter"></i></a>
            <a target="_blank" href="https://www.instagram.com/mahir_shahriar_/"><i class="fa fa-linkedin"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> mahirshahriar10@gmail.com</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> mahirshahriar10@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a target="_blank" href="https://www.facebook.com/mahir.shahriaradnan/"><i class="fa fa-facebook"></i></a>
                                <a target="_blank" href="https://twitter.com/i/flow/login"><i class="fa fa-twitter"></i></a>
                                <a target="_blank" href="https://www.instagram.com/mahir_shahriar_/"><i class="fa fa-linkedin"></i></a>
                            </div>
                            
                            <div class="header__top__right__auth">
                                @auth
                                    <a href="{{ route('home') }}"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a>
                                @else
                                <div>
                                    <a style="display:inline;" href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                                    <a style="display:inline; margin-left: 10px;" href="{{ route('register') }}"><i class="fa fa-user"></i> Register</a>
                                </div>
                                    
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @if (session('cart'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('cart')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ url('/') }}"><img src=" {{ asset('frontend') }}/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="@yield('frontendHomeActive')"><a href="{{ route('frontend.home') }}">Home</a></li>
                            <li class="@yield('frontendShopActive')"><a href="{{ route('shop.page') }}">Shop</a></li>
                            <li class="@yield('frontendContactActive')"><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        @php
                            $total = App\Models\Cart::all()->where('user_ip', request()->ip())->sum(
                                function($t){
                                    return $t->price * $t->qty;
                                }
                            );
                            $quantity = App\Models\Cart::all()->where('user_ip', request()->ip())->sum('qty');
                            $wishlist = App\Models\Wishlist::where('user_id', Auth::id())->get();
                        @endphp
                        <ul>
                            <li><a href="{{ url('wishlist') }}"><i class="fa fa-heart"></i> <span>{{ count($wishlist) }}</span></a></li>
                            <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-bag"></i> <span>{{ $quantity }}</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>TK: {{ $total }}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ url('/') }}"><img src=" {{ asset('frontend') }}/img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Block F, Road-3, House-13, Mirpur 1, Dhaka</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Wishlist</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Social Links</h6><br>{{-- 
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form> --}}
                        <div class="footer__widget__social">
                            <a target="_blank" href="https://www.facebook.com/mahir.shahriaradnan/"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="https://twitter.com/i/flow/login"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href="https://www.instagram.com/mahir_shahriar_/"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This System is made <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://www.facebook.com/mahir.shahriaradnan" target="_blank">Mahir Shahriar</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src=" {{ asset('frontend') }}/js/jquery-3.3.1.min.js"></script>
    <script src=" {{ asset('frontend') }}/js/bootstrap.min.js"></script>
    <script src=" {{ asset('frontend') }}/js/jquery.nice-select.min.js"></script>
    <script src=" {{ asset('frontend') }}/js/jquery-ui.min.js"></script>
    <script src=" {{ asset('frontend') }}/js/jquery.slicknav.js"></script>
    <script src=" {{ asset('frontend') }}/js/mixitup.min.js"></script>
    <script src=" {{ asset('frontend') }}/js/owl.carousel.min.js"></script>
    <script src=" {{ asset('frontend') }}/js/main.js"></script>



</body>

</html>