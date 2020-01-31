
@extends('layouts.app')
@section('title', $company->title)
@section('content')   
<div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">                                  
                    <div class="breadcrumb-content">
                        <ul>
                            <li class="has-child"><a href="/">Главная</a></li>
                            <li class="has-child"><a href="/">Все салоны</a></li>
                            <li class="active">{{$company->title}}</li>
                        </ul>
                    </div>       
                </div>
            </div>
        </div>
    </div>
    <div class="product-details-area mb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-md-30 mb-sm-25">
                <div class="big-image-slider-single-item">
                                <img src="/img/companies/{{$company->pictures[0]}}" style="height: 290px; width:100%;" class="img-fluid" alt="">
                            </div>    
                </div>
                <div class="col-lg-6">                   
                    <div class="product-detail-content">
                        <h3 class="product-details-title mb-15">{{$company->title}}</h3>
                        <div class="rating d-inline-block mr-15">
                        <star-rating  :rating="{{$avg_rating ?? 0}}" :increment="0.01" :star-size="15" :read-only="true" border-color="orange" active-color="orange" :show-rating="false" text-class="custom-text"></star-rating>
                        </div>
                        <div class="review-links d-inline-block mb-20">
                            <a href="#review" >({{count($reviews) ?? 0}} отзывов)</a> <span class="separator">|</span> <a href="#">Написать отзыв</a>
                        </div>
                        <div class="product-info-block mb-30">
                            <div class="single-info">
                                <span class="title">Город: </span>
                                <span class="value font-weight-bold">{{$company->city->name ?? ''}}</span>
                            </div>
                            <div class="single-info">
                                <span class="title">Адрес: </span>
                                <span class="value font-weight-bold">{{'Метро ', $company->metro->name  ?? ''}} {{$company->adress . ',' ?? ''}}</span>
                            </div>
                            <div class="single-info">
                                <span class="title">Сайт:</span>
                                <span class="value"><a href="{{$company->website}}">{{$company->website}}</a></span>
                            </div>
                            <div class="single-info">
                                <span class="title">Телефон:</span>
                                <span class="value"><a href="tel:{{$company->tell}}">{{$company->tell}}</a></span>
                            </div>
                            <div class="single-info">
                                <span class="title">Часы работы:</span>
                                <span class="value">{{$company->job_schedule}}</span>
                            </div>                            
                        </div>
                        <div class="quantity mb-30">
                            <a href="#addReview" class="theme-button product-cart-button">+ Написать отзыв</a>
                        </div>
                        <div class="social-share-buttons mt-20">
                            <h3>Поделитесь этим</h3>
                            <ul>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>           
                </div>
            </div>
        </div>
    </div>
    <div class="product-description-review-area mb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-slider-wrapper product-description-review-container">
                        <nav>
                            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="description-tab" data-toggle="tab" href="#product-description" role="tab"
                                    aria-selected="true">Описание</a>                               
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-description" role="tabpanel" aria-labelledby="description-tab">
                                <div class="text-justify product-description mb-4">
                                    <p>{!! $company->description !!}</p>
                                </div>
                                <div id="review">
                                <h4>Отзывы</h4>
                                @if (count($reviews)>0)
                                <div class="product-ratting-wrap mt-10">
                                    <div class="pro-avg-ratting">
                                        <h4>{{ number_format($avg_rating, 1) }} <span>(Общая оценка)</span></h4>
                                        <span>Основано на {{count($reviews) ?? 0}} комментариях</span>                                        
                                    </div>                                    
                                    <div class="rattings-wrapper">
                                        @foreach($reviews as $review)
                                        <div class="sin-rattings">
                                            <div class="ratting-author">
                                                <h3>{{$review->author}}</h3>
                                                <div class="ratting-star">
                                                <star-rating  :rating="{{$review->rating}}" :increment="0.01" :star-size="15" :read-only="true" border-color="orange" active-color="orange" :show-rating="false" text-class="custom-text"></star-rating>
                                                </div>
                                            </div>
                                            <p>Дата: {{$review->created_at->format('d-m-Y H:m')}}</p>
                                            <p>{{$review->text}}</p>
                                        </div>                                        
                                        @endforeach
                                    </div>                                   
                                </div>
                                <addreview :company_id="{{$company->id}}"></addreview>
                                </div>
                                @endif   
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    