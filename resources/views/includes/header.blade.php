<div class="header-area header-sticky">
         <div class="navigation-top">
            <div class="container">                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="navigation-top-search-area pt-25 pb-25">
                            <div class="row align-items-center">
                                <div class="col-6 col-xl-2 col-lg-3 order-1 col-md-6 col-sm-5">                               
                                    <div class="logo">
                                        <a href="{{URL::route('home')}}">
                                            <img src="/assets/img/logo.png" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xl-5 offset-xl-1 col-lg-4 order-4 order-lg-2 mt-md-25 mt-sm-25">                                  
                                    <div class="search-bar">
                                        <form  action="/search" method="get">
                                            <input type="search" name="search" placeholder="Введите текст поиска ...">
                                            <button type="submit"> <i class="icon-search"></i></button>
                                        </form>
                                    </div>
                                    
                                    <!--=======  End of search bar  =======-->
                                </div>

                                <div class="col-xl-3 col-lg-3 order-3 order-sm-2 order-lg-3 order-xs-3 col-md-4 col-sm-5 text-center text-sm-left mt-xs-25">
                                    <!--=======  customer support text  =======-->
                                    
                                    <div class="customer-support-text">
                                        <div class="icon">
                                            <img src="/assets/img/icons/icon-header-phone.png" class="img-fluid" alt="">
                                        </div>

                                        <div class="text">
                                            <span>Служба поддержки</span>
                                            <p>(08) 789 12 345</p>
                                        </div>
                                    </div>
                                    
                                    <!--=======  End of customer support text  =======-->
                                </div>

                              
                            </div>
                        </div>

                        <!--====================  End of navigation top search  ====================-->
                    </div>
                </div>
            </div>
        </div>
        <div class="navigation-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- navigation section -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Главная</a></li>                                    
                                    <li class="{{ Request::segment(1) === 'privacy' ? 'active' : null }}"><a href="/privacy">Политика конфиденциальности</a></li>                                    
                                    <li class="{{ Request::segment(1) === 'about' ? 'active' : null }}"><a href="/about">О Сайте</a></li>
                                    <li class="{{ Request::segment(1) === 'contact' ? 'active' : null }}"><a href="/contact">Обратная связь</a></li>
                                </ul>
                            </nav>                        
                        </div>
                        <div class="mobile-menu-wrapper d-block d-lg-none pt-15">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====================  End of navigation menu  ====================-->
    </div> 