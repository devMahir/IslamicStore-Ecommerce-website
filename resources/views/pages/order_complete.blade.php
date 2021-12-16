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
                    <h2>Order Done</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Order Done</span>
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
        <h3>
            @if(session('orderComplete'))
            <div class="alert alert-danger success-dismissible fade show" role="alert">
            <strong>{{session('orderComplete')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
        </h3>
    </div>
</section>
<!-- Checkout Section End -->
@endsection