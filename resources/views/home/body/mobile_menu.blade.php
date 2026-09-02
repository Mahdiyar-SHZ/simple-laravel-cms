<!-- Mobile Menu -->
<div class="lonyo-menu-wrapper">
    <div class="lonyo-menu-area text-center">
        <div class="lonyo-menu-mobile-top">
            <div class="mobile-logo">
                <a href="index.html">
                    <img src="{{ asset('frontend/assets/images/logo/logo-dark.svg') }}" alt="logo">
                </a>
            </div>
            <button class="lonyo-menu-toggle mobile">
                <i class="ri-close-line"></i>
            </button>
        </div>
        <div class="lonyo-mobile-menu">
            <ul>
                <li>
                    <a href="contact-us.html">Home</a>
                </li>

                <li class="menu-item-has-children">
                    <a href="{{ route('about.us') }}">About Us</a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('our.team') }}">
                                Company Profile
                            </a>
                        </li>
                        <li>
                            <a href="index-02.html">
                                Team
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('blog.page') }}">Blog</a>
                </li>

                <li>
                    <a href="{{ route('contact.us') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End mobile menu -->