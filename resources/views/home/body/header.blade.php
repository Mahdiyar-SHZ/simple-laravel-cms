<header class="site-header lonyo-header-section light-bg" id="sticky-menu">
    <div class="container">
        <div class="row gx-3 align-items-center justify-content-between">
            <div class="col-8 col-sm-auto ">
                <div class="header-logo1 ">
                    <a href="index.html">
                        <img src="{{ asset('frontend/assets/images/logo/logo-dark.svg
                        
                        ') }}" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="lonyo-main-menu-item">
                    <nav class="main-menu menu-style1 d-none d-lg-block menu-left">
                        <ul>
                            <li>
                                <a href="contact-us.html">Home</a>
                            </li>

                            <li class="menu-item-has-children">
                                <a href="">About Us</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="index.html">
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
                                <a href="contact-us.html">Our Servece</a>
                            </li>

                            <li>
                                <a href="contact-us.html">Portfilio</a>
                            </li>

                            <li>
                                <a href="contact-us.html">Blog</a>
                            </li>

                            <li>
                                <a href="contact-us.html">Contact</a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-auto d-flex align-items-center">
                <div class="lonyo-header-info-wraper2">
                    @auth
                    <div class="lonyo-header-info-content">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">dashboard</a></li>
                        </ul>
                    </div>

                    @else
                    <div class="lonyo-header-info-content">
                        <ul>
                            <li><a href="{{ route('login') }}">Log in</a></li>
                        </ul>
                    </div>

                    <div class="lonyo-header-info-content">
                        <ul>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </div>
                    @endauth

                </div>
                <div class="lonyo-header-menu">
                    <nav class="navbar site-navbar justify-content-between">
                        <!-- Brand Logo-->
                        <!-- mobile menu trigger -->
                        <button class="lonyo-menu-toggle d-inline-block d-lg-none">
                            <span></span>
                        </button>
                        <!--/.Mobile Menu Hamburger Ends-->
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>