@php
$title = App\Models\Title::find(1);
$feature = App\Models\Feature::all();
$isLoggedIn = auth()->check(); 
@endphp

<div class="lonyo-section-padding2 position-relative">
    <div class="container">
        <div class="lonyo-section-title center">
            <h2 id="feature-title" contenteditable="{{ $isLoggedIn ? 'true' : 'false' }}" data-id="{{ $title?->id }}">{{ $title?->features }}</h2>
        </div>
        <div class="row">


            @foreach ($feature as $item)
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="lonyo-service-wrap light-bg" data-aos="fade-up" data-aos-duration="500">
                    <div class="lonyo-service-title">
                        <h4>{{ $item->title }}</h4>
                        <img src="{{ asset('frontend/assets/images/v1/'.$item->icon.'.svg') }}" alt="">
                    </div>
                    <div class="lonyo-service-data">
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
    <div class="lonyo-feature-shape"></div>
</div>




<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const featureElement = document.getElementById('feature-title');

        function SaveChanges(element) {
            let featureId = element.dataset.id;
            let field = "features"; // نام ستون در دیتابیس و کنترلر
            let newValue = element.innerText.trim();

            fetch(`/edit-feature/${featureId}`, {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute("content"),
                        'Content-Type': 'application/json'
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
                .catch(error => console.error("ERROR:" + error));
        }

        // بررسی اینکه اینتر فقط روی عنصر مدنظر فشرده شود
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && e.target.id === 'feature-title') {
                e.preventDefault();
                e.target.blur(); // فوکوس را برمی‌دارد تا رویداد blur هم تکرار نکند
                SaveChanges(e.target);
            }
        });

        if (featureElement) {
            featureElement.addEventListener("blur", function(e) {
                SaveChanges(featureElement);
            });
        }
    });
</script>