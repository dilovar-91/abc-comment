
@extends('layouts.main')
@section('title', 'Поиск организации по продаже авто')
@section('content') 
 <!-- Product Thumbnail Start -->
<div class="main-product-thumbnail ptb-45">
            <div class="container">
                <div class="thumb-bg">
                    <div class="row">
                        <!-- Main Thumbnail Image Start -->
                        <div class="col-lg-5 mb-all-40">
                            <!-- Thumbnail Large Image start -->
                            <div class="tab-content">      
                                @for ($i=0; $i<count($company->pictures); $i++)
                                <div id="thumb{{$i+1}}" class="tab-pane fade {{$i === 0 ? 'show active' : ''}}">                               
                                <a href="/img/companies/{{$company->pictures[$i]}}">
                                    <img data-fancybox="images" src="/img/companies/{{$company->pictures[$i]}}" alt="single-product">
                                </a>
                                </div>
                                @endfor
                            </div>
                            <!-- Thumbnail Large Image End -->
                            <!-- Thumbnail Image End -->
                            <div class="product-thumbnail">
                                <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">                                  
                                @for ($i=0; $i<count($company->pictures); $i++)
                                <a class="{{$i === 0 ? 'active' : ''}}" data-toggle="tab" href="#thumb{{$i+1}}"><img src="/img/companies/{{$company->pictures[$i]}}" alt="product-thumbnail"></a>
                                @endfor
                                </div>
                            </div>
                            <!-- Thumbnail image end -->
                        </div>
                        <!-- Main Thumbnail Image End -->
                        <!-- Thumbnail Description Start -->
                        <div class="col-lg-7">
                            <div class="thubnail-desc fix">
                           
                                <h3 class="product-header">{{$company->title}}</h3>
                                <div class="rating-summary fix mtb-10">
                                    <div class="rating">
                                    <star-rating  :rating="{{$avg_rating ?? 0}}" :increment="0.01" :star-size="15" :read-only="true" border-color="orange" active-color="orange" :show-rating="false" text-class="custom-text"></star-rating>
                                    </div>                                    
                                    <div class="rating-feedback">
                                        <a href="#review">({{count($reviews)}} отзыв)</a>                                       
                                        <a href="#addreview">Написать отзывов</a>
                                    </div>
                                </div>
                                <div class="pro-price mtb-10">
                                Диапазон цен: <strike>P</strike>300 000 - <strike>P</strike>3 500 000                                    
                                </div>
                                <div class="product-policy mt-20">
                                   <p><i class="fa fa-building" aria-hidden="true"></i> {{$company->city->name ?? ''}}
                                   <p><i class="fa fa-subway" aria-hidden="true"></i> {{$company->metro->name ?? ''}}
                                   <p><i class="fa fa-map-marker green" aria-hidden="true"></i> {{$company->adress ?? ''}}
                                   <p><i class="fa fa-globe green" aria-hidden="true"></i> <a href="{{$company->website}}" target="_blank">{{$company->website}}</a>
                                </div>
                            </div>
                        </div>
                        <!-- Thumbnail Description End -->


                        
                    </div>

                    
                    <!-- Row End -->

                    <!-- Product Thumbnail Tab Content Start -->
                    <div class="tab-content thumb-content">
                            <div id="dtail" class="tab-pane fade ">
                                
                            </div>
                            <div id="review" class="tab-pane fade show active">
                                <!-- Reviews Start -->

                                <div class="review border-default universal-padding mb-2">
                                    <div class="group-title">
                                        <h2>О салоне</h2>                                        
                                    </div>
                                    <p class="text-justify">{{$company->description}}</p>
                                </div>
                                @if (count($reviews)>0)
                                <h3 class="mt-15 mb-15 ml-3 leave-reply" style="border-bottom: 2px solid #222; display: inline-block;">Мнение покупателей о {{$company->title}}</h3>
                                @foreach($reviews as $review)
                                <div class="review border-default universal-padding mb-4">
                                <div class="group-title mb-0">
                                        <h2>{{$review->author}}</h2>                                        
                                    </div>
                                    <p class="text-justify">{{$review->text}}</p>
                                    <ul class="review-list">
                                        <!-- Single Review List Start -->
                                        <li class="row">
                                            <span class="col-md-2 col-sm-6 col-xl-2">Оценка:</span>
                                            <div class="col-md-2 col-sm-6 col-xl-2">
                                            <star-rating  :rating="{{$review->rating}}" :increment="0.01" :star-size="15" :read-only="true" border-color="orange" active-color="orange" :show-rating="false" text-class="custom-text"></star-rating>
                                            </div>                                            
                                        </li>
                                        <li class="row">
                                            <span class="col-md-2 col-sm-6 col-xl-2">Дата:</span>
                                            <div class="col-md-2 col-sm-6 col-xl-2">
                                            {{$review->created_at->format('d-m-Y H:m')}}
                                            </div>                                            
                                        </li>
                                        <!-- Single Review List End -->                                        
                                    </ul>
                                </div>
                                @endforeach
                                @endif

                                <addreview :company_id="{{$company->id}}"></addreview>
                             
                            </div>
                        </div>
                        <!-- Product Thumbnail Tab Content End -->
                </div>

                
            </div>
            <!-- Container End -->
        </div>        
        @endsection