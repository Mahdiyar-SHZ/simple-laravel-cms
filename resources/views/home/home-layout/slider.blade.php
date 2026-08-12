@php
$slider = App\Models\Slider::findOrFail(1);
$isLoggedIn = auth()->check(); // بررسی اینکه آیا کاربر لاگین کرده یا نه
@endphp

<div class="lonyo-hero-section light-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 d-flex align-items-center">
                <div class="lonyo-hero-content" data-aos="fade-up" data-aos-duration="700">

                    <!-- ۱. عنوان اصلی (H1) -->
                    <h1 contenteditable="{{ $isLoggedIn ? 'true' : 'false' }}"
                        class="editable-field"
                        id="title"
                        data-id="{{ $slider->id }}"
                        data-column="title">
                        {{ $slider->title }}
                    </h1>

                    <!-- ۲. توضیحات (Paragraph) -->
                    <p contenteditable="{{ $isLoggedIn ? 'true' : 'false' }}"
                        class="text editable-field"
                        id="description"
                        data-id="{{ $slider->id }}"
                        data-column="description">
                        {{ $slider->description }}
                    </p>

                    <div class="mt-50" data-aos="fade-up" data-aos-duration="900">
                        <!-- ۳. متن دکمه (Button Text) -->
                        <a href="{{ route('register') }}"
                            contenteditable="{{ $isLoggedIn ? 'true' : 'false' }}"
                            id="btn"
                            class="lonyo-default-btn hero-btn editable-field"
                            data-id="{{ $slider->id }}"
                            data-column="btn_text">
                            {{ $slider->btn_text ?? 'Contact With Us' }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="lonyo-hero-thumb" data-aos="fade-left" data-aos-duration="700">
                    <!-- ۴. تصویر (Image) -->
                    <img src="{{ asset($slider->image) }}"
                        id="image"
                        alt=""
                        @if($isLoggedIn) id="editable-image" data-id="{{ $slider->id }}" style="cursor: pointer;" title="برای تغییر عکس کلیک کنید" @endif>

                    <div class="lonyo-hero-shape">
                        <img src="{{ asset('frontend/assets/images/shape/hero-shape1.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const titleElement = document.getElementById('title')
        const descriptionElement = document.getElementById('description')

        function SaveChanges(element) {
            let sliderId = element.dataset.id;
            let field = element.id === "title" ? "title" : "description";
            let newValue = element.innerText.trim()

            fetch(`/edit-slider/${sliderId}`, {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute("content"),
                        'Content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        [field]: newValue
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        console.log("Update successfully");
                    } else {
                        console.log("Error");
                    }
                })
                .catch(error => console.error("ERROR:" + error))
        }

        document.addEventListener('keydown' , function(e){
            if(e.key === 'Enter'){
                e.preventDefault()
                SaveChanges(e.target)
            }
        })

        titleElement.addEventListener("blur", function(e){
            SaveChanges(titleElement)
        })

        descriptionElement.addEventListener("blur" , function(e){
            SaveChanges(descriptionElement)
        })
    })
</script>