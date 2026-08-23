@extends('home.home_master')
@section('home')

@php
$title = App\Models\Title::find(1);
$isLoggedIn = auth()->check(); // بررسی اینکه آیا کاربر لاگین کرده یا نه
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



<div class="lonyo-section-padding4">
    <div class="container">
        <div class="lonyo-section-title center">
            <h2 id="answers-title" contenteditable="{{ $isLoggedIn ? 'true' : 'false' }}" data-endpoint="edit-answers" data-id="{{ $title?->id }}">{{ $title?->answers ?? 'Answers' }}</h2>
        </div>
        @php
        $faqs = App\Models\Faq::latest()->get();
        $faqs = App\Models\Faq::orderBy('id', 'desc')->get();
        @endphp
        <div class="lonyo-faq-shape"></div>
        <div class="lonyo-faq-wrap1">
            @foreach ($faqs as $faq )
            <div class="lonyo-faq-item item2 open" data-aos="fade-up" data-aos-duration="500">
                <div class="lonyo-faq-header">
                    <h4>{{ $faq->question }}</h4>
                    <div class="lonyo-active-icon">
                        <img class="plasicon" src="{{ asset('frontend/assets/images/v1/mynus.svg') }}" alt="">
                        <img class="mynusicon" src="{{ asset('frontend/assets/images/v1/plas.svg') }}" alt="">
                    </div>
                </div>
                <div class="lonyo-faq-body body2">
                    <p>{{ $faq->answer }}</p>
                </div>
            </div>
            @endforeach

            <!-- <div class="lonyo-faq-item item2" data-aos="fade-up" data-aos-duration="700">
                <div class="lonyo-faq-header">
                    <h4>Can I link multiple bank accounts and credit cards?</h4>
                    <div class="lonyo-active-icon">
                        <img class="plasicon" src="{{ asset('frontend/assets/images/v1/mynus.svg') }}" alt="">
                        <img class="mynusicon" src="{{ asset('frontend/assets/images/v1/plas.svg') }}" alt="">
                    </div>
                </div>
                <div class="lonyo-faq-body body2">
                    <p>Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures to protect your sensitive information.</p>
                </div>
            </div>
            <div class="lonyo-faq-item item2" data-aos="fade-up" data-aos-duration="900">
                <div class="lonyo-faq-header">
                    <h4>How does the app help me stick to my budget?</h4>
                    <div class="lonyo-active-icon">
                        <img class="plasicon" src="{{ asset('frontend/assets/images/v1/mynus.svg') }}" alt="">
                        <img class="mynusicon" src="{{ asset('frontend/assets/images/v1/plas.svg') }}" alt="">
                    </div>
                </div>
                <div class="lonyo-faq-body body2">
                    <p>Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures to protect your sensitive information.</p>
                </div>
            </div>
            <div class="lonyo-faq-item item2" data-aos="fade-up" data-aos-duration="1100">
                <div class="lonyo-faq-header">
                    <h4>Can I track my investments with the app?</h4>
                    <div class="lonyo-active-icon">
                        <img class="plasicon" src="{{ asset('frontend/assets/images/v1/mynus.svg') }}" alt="">
                        <img class="mynusicon" src="{{ asset('frontend/assets/images/v1/plas.svg') }}" alt="">
                    </div>
                </div>
                <div class="lonyo-faq-body body2">
                    <p>Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures to protect your sensitive information.</p>
                </div>
            </div>
            <div class="lonyo-faq-item item2" data-aos="fade-up" data-aos-duration="1300">
                <div class="lonyo-faq-header">
                    <h4>Is the app free, or are there subscription fees?</h4>
                    <div class="lonyo-active-icon">
                        <img class="plasicon" src="{{ asset('frontend/assets/images/v1/mynus.svg') }}" alt="">
                        <img class="mynusicon" src="{{ asset('frontend/assets/images/v1/plas.svg') }}" alt="">
                    </div>
                </div>
                <div class="lonyo-faq-body body2">
                    <p>Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures to protect your sensitive information.</p>
                </div>
            </div> -->
        </div>
        <div class="faq-btn" data-aos="fade-up" data-aos-duration="700">
            <a class="lonyo-default-btn faq-btn2" href="faq.html">Can't find your answer</a>
        </div>
    </div>
</div>
<div class="lonyo-content-shape3">
    <img src="{{ asset('frontend/assets/images/shape/shape2.svg') }}" alt="">
</div>
<!-- end faq -->

@include('home.home-layout.money-management')
<!-- end cta -->

@endsection