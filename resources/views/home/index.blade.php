@extends('home.home_master')
@section('home')

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
                    <h2>Don't take our word for it, check user reviews</h2>
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
        <div class="lonyo-t-wrap wrap2 light-bg">
            <div class="lonyo-t-ratting">
                <img src="{{ asset('frontend/assets/images/shape/star.svg') }}" alt="">
            </div>
            <div class="lonyo-t-text">
                <p>"This app transformed my budgeting! It has been a clear view longer have to worry of my It has been success expenses and savings goals."</p>
            </div>
            <div class="lonyo-t-author">
                <div class="lonyo-t-author-thumb">
                    <img src="{{ asset('frontend/assets/images/v1/img7.png') }}" alt="">
                </div>
                <div class="lonyo-t-author-data">
                    <p>Liam Gallagher</p>
                    <span>Teacher of Luxe Escapes Hotels</span>
                </div>
            </div>
        </div>
        <div class="lonyo-t-wrap wrap2 light-bg">
            <div class="lonyo-t-ratting">
                <img src="{{ asset('frontend/assets/images/shape/star.svg') }}" alt="">
            </div>
            <div class="lonyo-t-text">
                <p>“The interface is intuitive, and I love how syncs with my bank accounts. I no longer have to worry about manual tracking. Highly recommend!”</p>
            </div>
            <div class="lonyo-t-author">
                <div class="lonyo-t-author-thumb">
                    <img src="{{ asset('frontend/assets/images/v1/img2.png') }}" alt="">
                </div>
                <div class="lonyo-t-author-data">
                    <p>Michael Chen</p>
                    <span>Founder of EcoChic Apparel</span>
                </div>
            </div>
        </div>
        <div class="lonyo-t-wrap wrap2 light-bg">
            <div class="lonyo-t-ratting">
                <img src="{{ asset('frontend/assets/images/shape/star.svg') }}" alt="">
            </div>
            <div class="lonyo-t-text">
                <p>“With this app, I’ve been able to stick to my budget and even save for a vacation.The budget alerts are a game changer!”</p>
            </div>
            <div class="lonyo-t-author">
                <div class="lonyo-t-author-thumb">
                    <img src="{{ asset('frontend/assets/images/v1/img3.png') }}" alt="">
                </div>
                <div class="lonyo-t-author-data">
                    <p>David Nguyen</p>
                    <span>COO of Luxe Escapes Hotels</span>
                </div>
            </div>
        </div>
        <div class="lonyo-t-wrap wrap2 light-bg">
            <div class="lonyo-t-ratting">
                <img src="{{ asset('frontend/assets/images/shape/star.svg') }}" alt="">
            </div>
            <div class="lonyo-t-text">
                <p>"Having all my accounts in one place gives me complete overspending accounts control over my money. Highly recommend!"</p>
            </div>
            <div class="lonyo-t-author">
                <div class="lonyo-t-author-thumb">
                    <img src="{{ asset('frontend/assets/images/v1/img5.png') }}" alt="">
                </div>
                <div class="lonyo-t-author-data">
                    <p>Rachel Kim</p>
                    <span>CEO of GreenLeaf Organics</span>
                </div>
            </div>
        </div>
        <div class="lonyo-t-wrap wrap2 light-bg">
            <div class="lonyo-t-ratting">
                <img src="{{ asset('frontend/assets/images/shape/star.svg') }}" alt="">
            </div>
            <div class="lonyo-t-text">
                <p>"Having all my accounts in one place gives me complete control over my money. So user-friendly and helpful! Highly recommend!"</p>
            </div>
            <div class="lonyo-t-author">
                <div class="lonyo-t-author-thumb">
                    <img src="{{ asset('frontend/assets/images/v1/img6.png') }}" alt="">
                </div>
                <div class="lonyo-t-author-data">
                    <p>Aisha Hassan</p>
                    <span>CEO of RoyexLeaf Organics</span>
                </div>
            </div>
        </div>

    </div>
    <div class="lonyo-t-overlay2">
        <img src="{{ asset('frontend/assets/images/v2/overlay.png') }}" alt="">
    </div>
</div>
<!-- end testimonial -->

<div class="lonyo-section-padding4">
    <div class="container">
        <div class="lonyo-section-title center">
            <h2>Find answers to all questions below</h2>
        </div>
        <div class="lonyo-faq-shape"></div>
        <div class="lonyo-faq-wrap1">
            <div class="lonyo-faq-item item2 open" data-aos="fade-up" data-aos-duration="500">
                <div class="lonyo-faq-header">
                    <h4>Is my financial data safe and secure?</h4>
                    <div class="lonyo-active-icon">
                        <img class="plasicon" src="{{ asset('frontend/assets/images/v1/mynus.svg') }}" alt="">
                        <img class="mynusicon" src="{{ asset('frontend/assets/images/v1/plas.svg') }}" alt="">
                    </div>
                </div>
                <div class="lonyo-faq-body body2">
                    <p>Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures to protect your sensitive information.</p>
                </div>
            </div>
            <div class="lonyo-faq-item item2" data-aos="fade-up" data-aos-duration="700">
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
            </div>
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