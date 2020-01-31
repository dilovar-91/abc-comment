@extends('layouts.main')
@section('title', 'Главная')
@section('content') 

<!-- Shop Page Start -->
<div class="main-shop-page ptb-45">
            <div class="container">
                <!-- Row End -->
                <div class="row">
                    @include('includes.sidebar')
                    <!-- Product Categorie List Start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <!-- Grid & List View Start -->
                        <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                            <div class="grid-list-view  mb-sm-15">
                                <ul class="nav tabs-area d-flex align-items-center">
                                    <li><a  href="/?type=grid" class="{{$type === 'grid' ? 'active' : ''}}"><i class="fa fa-th"></i></a></li>
                                    <li><a class="{{$type !== 'grid' ?  'active' : ''}}"  href="{{url('/?type=list')}}"><i class="fa fa-list-ul"></i></a></li>
                                    <li><span class="grid-item-list">Все {{ $companies->total()}} организации</span></li>
                                </ul>
                            </div>
                            <!-- Toolbar Short Area Start -->
                            
                            <div class="clearfix">
                                <div class=" d-md-flex align-items-center">
                                    <label>Сортировка </label>
                                    <div class="form-group ml-2" style="width:200px;">             
                                        <select class="form-control mt-1" id="exampleFormControlSelect1" onchange="window.location.href = this.value" >
                                        <option value="{{url()->current()}}/?sort=rating&type={{$type ?? 'list'}}" {{$sort === 'rating' ? 'selected' : ''}} >Рейтинг</option>
                                        <option value="{{url()->current()}}/?sort=name&type={{$type ?? 'list'}}" {{ $sort === 'name' ? "selected" : '' }} >Имя, А до Я</option>
                                        <option value="{{url()->current()}}/?sort=name-desc&type={{$type ?? 'list'}}" {{$sort === 'name-desc' ? 'selected' : ''}} >Имя, Я до A</option>                                        
                                        <option value="{{url()->current()}}/?sort=comments&type={{$type ?? 'list'}}" {{$sort === 'comments' ? 'selected' : ''}}>Кол-во комментарии</option> {{$sort === 'comments' ? 'selected' : ''}} 
                                        </select>
                                    </div>                                    
                                </div>
                            </div>


                            


                           


                            <!-- Toolbar Short Area End -->
                        </div>
                        <!-- Grid & List View End -->
                        <div class="main-categorie mb-all-40">
                            <!-- Grid & List Main Area End -->
                            <div class="tab-content border-default fix">
                                @if($type !== null && $type =='grid')
                                <div id="grid-view" class="tab-pane fade show active">
                                    <div class="row">
                                    <!-- Single Product Start -->
                                    @if (count($companies)>0)
                                        @foreach ($companies as $company)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6" >
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="/company/{{$company->id}}">
                                                    @for ($i=0; $i<count($company->pictures); $i++)
                                                        <img class="{{$i === 1 ? 'primary-img' : 'secondary-img'}}" src="/img/companies/{{$company->pictures[$i]}}" alt="single-product">
                                                    @endfor
                                                    </a>
                                                    @if($company->avg_rating>4.3)<span class="sticker-new">ТОП</span>@endif
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <div class="pro-info">
                                                        <h4><a href="/company/{{$company->id}}">{{$company->title}}</a></h4>
                                                        <div class="product-rating row">
                                                        <?php $rating = ($company->avg_rating !== null ? (float)$company->avg_rating : 0);?>  
                                                <div class="col-xl-4 col-lg-3 col-md-4 col-5">                                              
                                                <star-rating  :rating="{{$rating}}" :increment="0.01" :star-size="20" :read-only="true" border-color="orange" active-color="orange" :show-rating="false" text-class="custom-text"></star-rating> </div><div class="col-3 mt-1 ml-2">({{$company->review_count}})</div>                                                
                                                        </div>
                                                        @if(!empty($company->city->name))<p><span class="price">Город: {{$company->city->name}}</span></p>@endif
                                                        @if(!empty($company->metro->name))<p><span class="price">Метро: {{$company->metro->name}}</span></p>@endif
                                                    </div>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="/company/{{$company->id}}" title="" data-original-title="Все отзывы">Все отзывы</a>
                                                        </div>
                                                        <div class="actions-secondary">                                                           
                                                            <a href="/company/{{$company->id}}" title="" data-original-title="Инфо"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                        <!-- Single Product End -->
                                        
                                    </div>
                                    <!-- Row End -->
                                </div>
                                
                                <!-- #grid view End -->
                                @else
                                <div id="list-view" class="tab-pane fade show active">
                                    <!-- Single Product Start -->
                                    
                                    @if (count($companies)>0)
                                        @foreach ($companies as $company)
                                    <div class="row single-product">         
                                        <!-- Product Image Start -->
                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                                            <div class="pro-img">
                                            
                                                @for ($i=0; $i < count($company->pictures); $i++)
                                                    <img class="{{$i === 0 ? 'primary-img' : 'secondary-img'}}" style="height: 180px; width: 100%;" src="/img/companies/{{$company->pictures[$i] ?? 'noImg.jpg'}}" style="" alt="single-product">   
                                                @endfor                                                
                                                @if($company->avg_rating>4.3)<span class="sticker-new">ТОП</span>@endif                                                
                                            </div>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                                            <div class="pro-content">
                                                <h4><a href="/company/{{$company->id}}">{{$company->title}}</a></h4>
                                                <div class="product-rating row">                             
                                                <?php $rating = ($company->avg_rating !== null ? (float)$company->avg_rating : 0);?>  
                                                <div class="col-xl-3 col-lg-2 col-md-4 col-5">                                              
                                                <star-rating  :rating="{{$rating}}" :increment="0.01" :star-size="20" :read-only="true" border-color="orange" active-color="orange" :show-rating="false" text-class="custom-text"></star-rating> </div><div class="col-3 mt-1">({{$company->review_count}})</div>
                                                </div>
                                                <p><span class="price mr-2">{{$company->city->name ?? ''}}</span><span class="price">{{$company->metro->name ?? ''}}</span></p>
                                                <p>{!! str_limit($company->description , $limit = 80, $end = '...') !!}</p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="/company/{{$company->id}}" title="Читать отзывы"></a>
                                                    </div>
                                                    <div class="actions-secondary">                                                        
                                                        <a href="/company/{{$company->id}}" title="Инфо"><i class="fa fa-signal"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product Content End -->
                                    </div>
                                    @endforeach
                                    @endif
                                    <!-- Single Product End -->
                                   
                                </div>
                                @endif
                                <!-- #list view End -->
                                <!-- Product Pagination Info -->
                                
                                <div class="product-pagination mb-20 pb-15">
                                    <span class="grid-item-list">Организации {{($companies->currentpage()-1)*$companies->perpage()+1}}-{{$companies->currentpage()*$companies->perpage()}} от {{$companies->total()}}</span>
                                </div>                                                                                               
                                {{ $companies->appends(request()->input())->links() }}
                                
                            </div>
                            <!-- Grid & List Main Area End -->
                        </div>
                    </div>
                    <!-- product Categorie List End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Shop Page End -->

             @endsection