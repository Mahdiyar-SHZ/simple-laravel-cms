@php
$apps = App\Models\App::findOrFail(1);
$isLoggedIn = auth()->check();
@endphp
<section class="lonyo-cta-section bg-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="lonyo-cta-thumb" data-aos="fade-up" data-aos-duration="500">

                    <!-- 306*481 -->
                    <img src="{{ asset($apps->image) }}" id="appImage" alt="">
                    @if ($isLoggedIn)
                        <!-- <input type="file" id="uploadImage" > -->
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="lonyo-default-content lonyo-cta-wrap" data-aos="fade-up" data-aos-duration="700">
                    <h2 contenteditable="{{ $isLoggedIn ? 'true' : 'false' }}"
                        class="editable-field"
                        id="title"
                        data-id="{{ $apps->id }}"
                        data-column="title">
                        {{ $apps->title }}
                    </h2>
                    <p contenteditable="{{ $isLoggedIn ? 'true' : 'false' }}"
                        class="text editable-field"
                        id="description"
                        data-id="{{ $apps->id }}"
                        data-column="description">{{ $apps->description }}</p>
                    <div class="lonyo-cta-info mt-50" data-aos="fade-up" data-aos-duration="900">
                        <ul>
                            <li>
                                <a href="https://www.apple.com/app-store/"><img src="{{ asset('frontend/assets/images/v1/app-store.svg') }}" alt=""></a>
                            </li>
                            <li>
                                <a href="https://playstore.com/"><img src="{{ asset('frontend/assets/images/v1/play-store.svg') }}" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editableFields = document.querySelectorAll('.editable-field');

        function SaveChanges(element) {
            let appId = element.dataset.id;
            let field = element.id; 
            let newValue = element.innerText.trim();

            let csrfToken = document.querySelector("meta[name='csrf-token']");
            if (!csrfToken) {
                console.error("CSRF token not found!");
                return;
            }

            fetch(`/edit-app/${appId}`, {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': csrfToken.getAttribute("content"),
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
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
                    console.log("Error:", data.message || "Unknown error");
                }
            })
            .catch(error => console.error("ERROR:", error));
        }

        editableFields.forEach(element => {
            element.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    element.blur(); 
                }
            });

            element.addEventListener('blur', function(e) {
                SaveChanges(element);
            });
        });


        let imageElement = document.querySelector('#appImage');
        let uploadInput = document.querySelector('#uploadImage');

        if (imageElement && uploadInput) {
            imageElement.addEventListener("click", () => {
                @if ($isLoggedIn)
                    uploadInput.click();
                @endif
            });

            uploadInput.addEventListener("change", function(e) {
                let file = e.target.files[0]; 
                if (!file) return;

                let formData = new FormData();
                formData.append("image", file);
                formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute("content"));

                fetch('/update-app-image/1', {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        imageElement.src = data.image_url;
                        console.log("Image updated successfully");
                    } else {
                        console.log("Error:", data.message || "Unknown error");
                    }
                })
                .catch(error => console.error("ERROR:", error));
            });
        }
    });
</script>