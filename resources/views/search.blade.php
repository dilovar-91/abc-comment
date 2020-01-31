@extends('layouts.app')
@section('title', 'Поиск организации по продаже авто')
@section('content') 
<div class="breadcrumb-area pt-10 pb-10 border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  breadcrumb content  =======-->                    
                    <div class="breadcrumb-content">
                        <ul>
                            <li class="has-child"><a href="/">Главная</a></li>
                            <li>Поиск по запросу <span class="text-danger">"{{$search ?? ''}}"</span></li>
                        </ul>
                    </div>                    
                    <!--=======  End of breadcrumb content  =======-->
                </div>
            </div>
        </div>
    </div>
<div class="main-shop-page ptb-45 mt-20">
            <div class="container">
                <!-- Row End -->
                <div class="row">
                    @include('includes.sidebar')
                    <div class="col-lg-9 order-1 order-lg-2">
                                       
                    <div class="shop-header mb-30">
                        <div class="shop-header__left">
                            <div class="grid-icons mr-20">
                                <button data-target="grid three-column" data-tippy="3" data-tippy-inertia="true" data-tippy-animation="fade" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" class="three-column"></button>                                
                                <button data-target="list" data-tippy="List" data-tippy-inertia="true" data-tippy-animation="fade" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder"  class="active list-view"></button>
                            </div>
                            <div class="shop-header__left__message">                                
                                Показано {{($companies->currentpage()-1)*$companies->perpage()+1}}-{{ $companies->currentpage()*$companies->perpage()>$companies->total() ? $companies->total() : $companies->currentpage()*$companies->perpage()}} из {{$companies->total()}}
                            </div>
                        </div>                        
                    </div>
                    <div class="row shop-product-wrap list mb-10">
                    @if (count($companies)>0)
                    @foreach ($companies as $company)                   
                    <div class="col-12 col-lg-4 col-md-6 col-sm-6 mb-20">                    
                    <div class="single-slider-product grid-view-product">
                                <div class="single-slider-product__image">
                                    <a href="/company/{{$company->id}}">
                                        <img style="height: 160px; width: 100%;" src="/img/companies/{{$company->pictures[0] ?? 'noImg.jpg'}}" class="img-fluid" alt="">
                                    </a>

                                    @if($company->avg_rating>4.3)<span class="discount-label discount-label--green">Best</span>@endif                                   
                                </div>
                                <div class="single-slider-product__content">
                                    <p class="product-title"><a href="/company/{{$company->id}}">{{$company->title}}</a></p>
                                    <div class="rating">
                                    <?php $rating = ($company->avg_rating !== null ? (float)$company->avg_rating : 0);?>
                                    <star-rating  :rating="{{$rating}}" :increment="0.01" :star-size="20" :read-only="true" border-color="orange" active-color="orange" :show-rating="false" text-class="custom-text"></star-rating>                                                
                                    </div>
                                    <p class="product-price"><span class="discounted-price">Город: {{$company->city->name ?? ''}}</span></p>
                                    <p class="product-price"><span class="discounted-price">Метро: {{$company->metro->name ?? ''}}</span></p>
                                    <span class="cart-icon"><a href="javascript:void(0)"><i class="icon-shopping-cart"></i></a></span>
                                </div>
                            </div>
                            <div class="single-slider-product single-slider-product--list-view list-view-product">
                                <div class="single-slider-product__image single-slider-product--list-view__image">
                                    <a href="/company/{{$company->id}}">
                                        <img style="height:160px;" src="/img/companies/{{$company->pictures[0] ?? 'noImg.jpg'}}" class="img-fluid" alt="">
                                    </a>   
                                    @if($company->avg_rating>4.3)<span class="discount-label discount-label--green">Best</span>@endif
                                </div>
                                <div class="single-slider-product__content  single-slider-product--list-view__content">
                                    <div class="single-slider-product--list-view__content__details">
                                        <p class="product-title"><a href="/company/{{$company->id}}">{{$company->title}}</a></p>
                                        <div class="rating">
                                        <div class="col-xl-3 col-lg-2 col-md-4 col-5">
                                        <?php $rating = ($company->avg_rating !== null ? (float)$company->avg_rating : 0);?>
                                        <star-rating  :rating="{{$rating}}" :increment="0.01" :star-size="20" :read-only="true" border-color="orange" active-color="orange" :show-rating="false" text-class="custom-text"></star-rating> </div><div class="col-3 mt-1">({{$company->review_count}})</div>
                                        </div>                                        
                                        <p class="short-desc">{!! str_limit($company->description , $limit = 80, $end = '...') !!}</p>
                                    </div>
                                    <div class="single-slider-product--list-view__content__actions">
                                        <div class="availability mb-10">
                                            <span class="availability-value">Город: {{$company->city->name ?? ''}}</span>                                     
                                            <span class="availability-value">Метро:{{$company->metro->name ?? ''}}</span>                                           
                                            <span class="availability-value">Адрес:{{$company->adress ?? ''}}</span>                                           
                                        </div>
                                        <a href="/company/{{$company->id}}" class="theme-button list-cart-button mb-10">К отзывам</a>
                                        </div>
                                </div>
                            </div>
                          </div>
                        @endforeach
                        @endif                        
                    </div>
                    <div class="pagination-section mb-md-30 mb-sm-30">
                    {{ $companies->appends(request()->input())->links() }}
                        <div class="pagination-text">
                        Показано {{($companies->currentpage()-1)*$companies->perpage()+1}}-{{$companies->currentpage()*$companies->perpage()}} из {{$companies->total()}}
                        </div>
                    </div>
                </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Shop Page End -->
 @endsection