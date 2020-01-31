<div class="col-lg-3 order-2 order-lg-1">                  
                    <div class="page-sidebar">                   
                    <div class="sidebar-widget-wrapper mb-30">                           
                            <div class="sidebar-widget">
                                <h3 class="sidebar-widget-title">ГОРОДА</h3>
                                <ul class="category-list">                                    
                                    @foreach(\App\Models\City::All() as $city)
                                            <li><a href="/search?city_id={{$city->id}}">{{$city->name}}</a></li>                                             
                                    @endforeach                                   
                                </ul>
                            </div>                
                        </div>
                    </div>                  
                </div>