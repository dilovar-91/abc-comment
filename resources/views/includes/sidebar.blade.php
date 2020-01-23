<!-- Sidebar Shopping Option Start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <div class="sidebar">
                            <!-- Sidebar Electronics Categorie Start -->
                            <div class="electronics mb-30">
                                <h3 class="sidebar-title e-title">Категории</h3>
                                <div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">
                                    <ul>
                                        <li class="has-sub"><a href="#">Города</a>
                                            <ul class="category-sub">
                                            @foreach(\App\Models\City::All() as $city)
                                            <li><a href="/search?city_id={{$city->id}}">{{$city->name}}</a></li>                                             
                                            @endforeach
                                            </ul>
                                            <!-- category submenu end-->
                                        </li>
                                        <li class="has-sub"><a href="#">Метро</a>
                                            <ul class="category-sub">
                                            @foreach(\App\Models\Metro::orderBy('name')->get() as $metro)
                                            <li><a href="/search?metro_id={{$metro->id}}">{{$metro->name}}</a></li>                                             
                                            @endforeach                                               
                                            </ul>
                                            <!-- category submenu end-->
                                        </li>                                        
                                    </ul>
                                </div>
                                <!-- category-menu-end -->
                            </div>
                            
                        </div>
                    </div>
                    <!-- Sidebar Shopping Option End -->