<header class="site-header" id="header">
    <nav class="navbar navbar-expand-lg {{ (Request::is('/'))?'transparent-bg':'' }}  static-nav">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{ asset('images/logo-white.png') }}" alt="logo" class="{{ (Request::is('/'))?'logo-default':'logo-scrolled' }}">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="{{ (!Request::is('/'))?'logo-default':'logo-scrolled' }}">
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    @foreach ( json_decode(menu('front-end','_json')) as $menu_rw)
                        @if ($menu_rw->url=="/properties")
                        <li class="nav-item dropdown position-relative">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{$menu_rw->title}} </a>
                            <div class="dropdown-menu">
								<a class="dropdown-item" href="/properties/Investment-opportunities">Investment-Opportunities</a>
                                <a class="dropdown-item" href="/properties/available">Available</a>
                                <a class="dropdown-item" href="/properties/past">Past</a>
                              
                                                          
                                @foreach (\App\Models\PropertyClass::get() as $property_class_rw )
                                <!--<a class="dropdown-item" href="{{$menu_rw->url}}/{{ $property_class_rw->slug }}">{{ $property_class_rw->title }}</a>-->
                                @endforeach
                            </div>
                        </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{$menu_rw->url}}">{{$menu_rw->title}}</a>
                            </li>
                        @endif

                    @endforeach
                </ul>
            </div>
        </div>
        <!--side menu open button-->
        <a href="javascript:void(0)" class="d-inline-block sidemenu_btn" id="sidemenu_toggle">
            <span></span> <span></span> <span></span>
        </a>
    </nav>
    <!-- side menu -->
    <div class="side-menu opacity-0 gradient-bg">
        <div class="overlay"></div>
        <div class="inner-wrapper">
            <span class="btn-close btn-close-no-padding" id="btn_sideNavClose"><i></i><i></i></span>
            <nav class="side-nav w-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about-me">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/hotel-management">Hotel Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/projects">Projects</a>
                    </li>
                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Properties </a>
                        <div class="dropdown-menu">
							<a class="dropdown-item" href="/properties/Investment-opportunities">Investment-Opportunities</a>
                            <a class="dropdown-item" href="/properties/available">Available</a>
                            <a class="dropdown-item" href="/properties/past">Past</a>
                            
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact-us">Contact Us</a>
                    </li>
                </ul>
            </nav>
            <div class="side-footer w-100">
                <ul class="social-icons-simple white top40">
                    <!--<li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                    <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                    <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>-->
                    <li><a href="https://www.linkedin.com/in/kiranpatel-ccim/" target="_blank"><i class="fab fa-linkedin"></i> </a> </li>
                </ul>
            </div>
        </div>
    </div>
    <a id="close_side_menu" href="javascript:void(0);" title="Close!"></a>
    <!-- End side menu -->
</header>
