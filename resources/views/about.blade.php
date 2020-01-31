@extends('layouts.app')
@section('title', 'О Сайте')
@section('content')
<div class="page-section pb-40 pt-30">
        <div class="container">        
            <div class="row row-30">                
                <!-- About Image -->
                <div class="about-image col-lg-6 mb-50 mb-sm-30 mb-md-30">
                    <img src="/assets/img/about-pic.jpg" class="img-fluid" alt="">
                </div>   

                <!-- About Content -->
                <div class="about-content col-lg-6">
                    <div class="row">
                        <div class="col-12 mb-50">
                            <h1>ДОБРО ПОЖАЛОВАТЬ В <span>ALULA.</span></h1>
                            <p>Данный портал отражает список автосалонов и контактная информация, отзывы о них.</p>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
@endsection