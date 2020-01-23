<header>           
            <!-- Header Middle Start Here -->
            <div class="header-middle light-blue-bg ptb-35">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-12">
                            <div class="logo mb-all-30">
                                <a href="{{URL::route('home')}}"><img src="/img/logo/logo.png" alt="logo-image"></a>
                            </div>
                        </div>
                        <!-- Categorie Search Box Start Here -->
                        <div class="col-lg-6 col-md-12">
                            <div class="categorie-search-box">
                                <form action="/search" method="get">
                                    <div class="form-group">
                                        <select class="bootstrap-select" name="city_id">
                                            <option value="0">Город</option>
                                            @foreach(\App\Models\City::All() as $city)
                                             <option value="{{$city->id}}">
                                            {{$city->name}}
                                            </option>
                                            @endforeach                                            
                                        </select>
                                    </div>
                                    <input type="text" name="search" placeholder="Введите ключевое слово">
                                    <button><i class="ion-ios-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Categorie Search Box End Here -->
                        
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Middle End Here -->
            <!-- Header Bottom Start Here -->
            <div class="header-bottom dark-blue-bg header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-9 col-lg-9 col-md-12 ">
                            <nav class="d-none d-lg-block">
                                <ul class="header-bottom-list d-flex">
                                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{URL::route('home')}}">Главная</a></li>
                                    <li class="{{ Request::segment(1) === 'rules' ? 'active' : null }}"><a href="{{URL::to('/rules')}}">Политика сайта</a></li>
                                    <li class="{{ Request::segment(1) === 'about' ? 'active' : null }}"><a href="{{URL::to('/about')}}">О сайте</a></li>
                                    <li class="{{ Request::segment(1) === 'contact' ? 'active' : null }}"><a href="{{URL::to('/contact')}}">Контакты</a></li>
                                </ul>
                            </nav>
                            <div class="mobile-menu d-block d-lg-none">
                                <nav>
                                    <ul>
                                        <li class="{{ Request::segment(1) === 'home' ? 'active' : null }}"><a href="{{URL::to('/')}}">Главная</a></li>
                                        <li class="{{ Request::segment(1) === 'rules' ? 'active' : null }}"><a href="{{URL::to('/rules')}}">Политика сайта</a></li>
                                        <li class="{{ Request::segment(1) === 'about' ? 'active' : null }}"><a href="{{URL::to('/about')}}">О сайте</a></li>
                                    <li class="{{ Request::segment(1) === 'contact' ? 'active' : null }}"><a href="{{URL::to('/contact')}}">Контакты</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 text-right">
                            <span class="header-right"><i class="ion-ios-telephone"></i>Тел: <span class="header-helpline">+798 12 345 678</span></span>
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Bottom End Here -->
            <!-- Mobile Vertical Menu Start Here -->
            <div class="container d-block d-lg-none">
                <div class="vertical-menu mt-30">
                    <span class="categorie-title mobile-categorei-menu">Меню <i class="fa fa-angle-down"></i></span>
                    <nav>  
                        <div id="cate-mobile-toggle" class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
                            <ul>
                                <li class="has-sub"><a href="#">Electronics</a>
                                    <ul class="category-sub">
                                        <li><a href="/shop.html">Cords and Cables</a></li>
                                        <li><a href="/shop.html">gps accessories</a></li>
                                        <li><a href="/shop.html">Microphones</a></li>
                                        <li><a href="/shop.html">Wireless Transmitters</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li class="has-sub"><a href="#">Fashion</a>
                                    <ul class="category-sub">
                                        <li><a href="/shop.html">Fashion one</a></li>
                                        <li><a href="/shop.html">Fashion two</a></li>
                                        <li><a href="/shop.html">Fashion three</a></li>
                                        <li><a href="/shop.html">Fashion Four</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li class="has-sub"><a href="#">Home & Kitchen</a>
                                    <ul class="category-sub">
                                        <li><a href="/shop.html">kithen one</a></li>
                                        <li><a href="/shop.html">kithen two</a></li>
                                        <li><a href="/shop.html">kithen three</a></li>
                                        <li><a href="/shop.html">kithen four</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li class="has-sub"><a href="#">Phones & Tablets</a>
                                    <ul class="category-sub">
                                        <li><a href="/shop.html">phone one</a></li>
                                        <li><a href="/shop.html">Tablet two</a></li>
                                        <li><a href="/shop.html">Tablet three</a></li>
                                        <li><a href="/shop.html">phone four</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li class="has-sub"><a href="#">TV & Video</a>
                                    <ul class="category-sub">
                                        <li><a href="/shop.html">smart tv</a></li>
                                        <li><a href="/shop.html">real video</a></li>
                                        <li><a href="/shop.html">Microphones</a></li>
                                        <li><a href="/shop.html">Wireless Transmitters</a></li>
                                    </ul>
                                    <!-- category submenu end-->
                                </li>
                                <li><a href="#">Beauty</a> </li>
                                <li><a href="#">Sport & tourisim</a></li>
                                <li><a href="#">Meat & Seafood</a></li>
                            </ul>
                        </div>
                        <!-- category-menu-end -->
                    </nav>
                </div>
            </div>
            <!-- Mobile Vertical Menu Start End -->
        </header>