<header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-1 col-lg-1">
                                <div class="logo">
                                    <a href="{{ route('home') }}">
                                        <img width="70px" src="{{ url('theme/img/logo.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="{{ route('home') }}">home</a></li>
                                            <li><a href="#">Trending</a></li>
                                            <li><a href="#">Contact</a></li>
                                            
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            
                            <div class="seach_icon">
                                <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    