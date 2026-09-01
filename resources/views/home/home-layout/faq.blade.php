@php
$title = App\Models\Title::find(1);
$isLoggedIn = auth()->check();
@endphp
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