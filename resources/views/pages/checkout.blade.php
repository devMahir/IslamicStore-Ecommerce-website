@extends('layouts.frontend-master')
@section('content')
<!-- Hero Section Begin -->
@include('pages.inc.header')
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend') }}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Checkout Page</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Shipping Address</h4>
            <form action="{{ route('place_order') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text" name="shipping_first_name" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" name="shipping_last_name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="shipping_phone" >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="shipping_email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="Street Address" class="checkout__input__add" name="address">
                        </div>
                        <div class="checkout__input">
                            <p>Country/State<span>*</span></p>
                            <input type="text" name="state">
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text" name="post_code">
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                @foreach ($carts as $cart)
                                <li>{{  $cart->product->product_name }} ({{ $cart->qty }}) <span>${{ $cart->price * $cart->qty }}</span></li>
                                @endforeach
                            </ul>

                            @if (Session::has('coupon'))
                                    <div class="checkout__order__total">Total <span>$ {{ $subtotal - session()->get('coupon')['discount_amount'] }}</span></div>

                                    <input type="hidden" name="coupon_discount" value="{{ session()->get('coupon')['coupon_discount'] }}">
                                    <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                                    <input type="hidden" name="total" value="{{ $subtotal - session()->get('coupon')['discount_amount'] }}">
                            @else
                                <div class="checkout__order__subtotal">Subtotal 
                                    <span>${{ $subtotal }}</span>
                                </div>
                                <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                                <input type="hidden" name="total" value="{{ $subtotal }}">
                            @endif

                            <h5>Select Payment Method</h5><br>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    COD
                                    <input type="checkbox" id="payment" value="COD" name="payment_type">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    bKash
                                    <input type="checkbox" id="bKash" value="bKash" name="payment_type">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection
