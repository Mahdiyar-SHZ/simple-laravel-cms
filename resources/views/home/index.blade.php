@extends('home.home_master')
@section('home')

@php
$title = App\Models\Title::find(1);
$isLoggedIn = auth()->check();
@endphp

@include('home.home-layout.slider')
<!-- end hero -->
<div class="lonyo-content-shape1">
    <img src="{{ asset('frontend/assets/images/shape/shape1.svg') }}" alt="">
</div>
@include('home.home-layout.features')
<!-- end content -->

@include('home.home-layout.clarifies')
<!-- end content -->


<div class="lonyo-content-shape3">
    <img src="{{ asset('frontend/assets/images/shape/shape2.svg') }}" alt="">
</div>
<!-- end content -->

@include('home.home-layout.get-all')
<div class="lonyo-content-shape1">
    <img src="{{ asset('frontend/assets/images/shape/shape3.svg') }}" alt="">
</div>
<!-- end video -->

<div class="lonyo-section-padding position-relative overflow-hidden">
    <div class="container">
        <div class="lonyo-section-title">
            <div class="row">
                <div class="col-xl-8 col-lg-8">

                    <h2 id="reviews-title" contenteditable="{{ $isLoggedIn ? 'true' : 'false' }}" data-endpoint="edit-reviews" data-id="{{ $title?->id }}">{{ $title?->reviews ?? 'Reviews' }}</h2>

                </div>
                <div class="col-xl-4 col-lg-4 d-flex align-items-center justify-content-end">
                    <div class="lonyo-title-btn">
                        <a class="lonyo-default-btn t-btn" href="contact-us.html">Read Customer Stories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lonyo-testimonial-slider-init">

        @foreach ($reviews as $key=> $item)
        <div class="lonyo-t-wrap wrap2 light-bg">
            <div class="lonyo-t-ratting">
                <img src="{{ asset('frontend/assets/images/shape/star.svg') }}" alt="">
            </div>
            <div class="lonyo-t-text">
                <p>{{ $item->message }}</p>
            </div>
            <div class="lonyo-t-author">
                <div class="lonyo-t-author-thumb">
                    <img src="{{ asset($item->image) }}" alt="">
                </div>
                <div class="lonyo-t-author-data">
                    <p>{{ $item->name }}</p>
                    <span>{{ $item->position  }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="lonyo-t-overlay2">
        <img src="{{ asset('frontend/assets/images/v2/overlay.png') }}" alt="">
    </div>
</div>
<!-- end testimonial -->




<!-- end cta -->

@endsection