@extends('layouts.main')
@section('title', 'Главная')
@section('content')  
 <!-- Breadcrumb Start -->
 <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="/">Главная</a></li>
                        <li class="active"><a href="/about">О сайте</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- About Us Start Here -->
         <div class="about-us pt-45">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sidebar-img sidebar-banner mb-all-30">
                            <img src="img/blog/10.jpg" alt="single-blog-img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-desc">
                            <h3 class="mb-20 about-title">О сайте</h3>
                            <p class="mb-20">Сайт содержит список организации по продаже авто и контактная информация, отзывы о них.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container End -->
         </div>
        <!-- About Us End Here -->
@endsection