@extends('layouts.frontend-master')
@section('frontendHomeActive') active @endsection
@section('content')
<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('pages.inc.category')
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+8801793421368</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg=" {{ asset('frontend') }}/img/hero/banner.jpg">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vegetable <br />100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="#" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- first Product Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach ($products as $product)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset($product->image_one) }}">
                            <h5><a href="{{ url('product/details/'.$product->id) }}">{{ $product->product_name }}</a></h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- first Product Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        @foreach ($categories as $category)
                            <li data-filter=".filter{{ $category->id }}">{{ $category->category_name }}</li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($categories as $category)
                @php
                    $products = App\Models\Product::where('category_id',$category->id)->latest()->get();
                @endphp
                @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix filter{{ $category->id }}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset($product->image_one) }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{ url('add/to-wishlist/'.$product->id) }}"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <form action="{{ url('add/to-cart/'.$product->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                <li><button type="submit" ><i class="fa fa-shopping-cart"></i></button></li>
                            </form>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{ url('product/details/'.$product->id) }}">{{ $product->product_name }}</a></h6>
                            <h5>TK {{ $product->price }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            @endforeach
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
{{-- <div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{ asset('frontend') }}/img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{ asset('frontend') }}/img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach ($lts_p as $product)
                            <div class="latest-prdouct__slider__item">

                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $product->image_one }}" style="height: 40px; width:40px;" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $product->product_name }}</h6>
                                        <span>${{ $product->price }}</span>
                                    </div>
                                </a>
                            </div>
                         @endforeach
                        <div class="latest-prdouct__slider__item">
                            @foreach ($lts_p as $product)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ $product->image_one }}"  style="height: 40px; width:40px;"  alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $product->product_name }}</h6>
                                        <span>${{ $product->price }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                           @foreach ($lts_p as $product)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($product->image_one) }}" style="height: 40px; width:40px;"  alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $product->product_name }}</h6>
                                        <span>${{ $product->price }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="latest-prdouct__slider__item">
                            @foreach ($lts_p as $product)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($product->image_one) }}" style="height: 40px; width:40px;"  alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $product->product_name }}</h6>
                                        <span>${{ $product->price }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Review Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            @foreach ($lts_p as $product)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($product->image_one) }}" style="height: 40px; width:40px;"  alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $product->product_name }}</h6>
                                        <span>${{ $product->price }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="latest-prdouct__slider__item">
                            @foreach ($lts_p as $product)
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset($product->image_one) }}" style="height: 40px; width:40px;"  alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{ $product->product_name }}</h6>
                                        <span>${{ $product->price }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->

@endsection