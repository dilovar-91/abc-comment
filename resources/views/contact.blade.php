@extends('layouts.app')
@section('title', 'Обратная связь')
@section('content')    
        <div class="breadcrumb-area pt-10 pb-10 border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  breadcrumb content  =======-->
                    
                    <div class="breadcrumb-content">
                        <ul>
                            <li class="has-child"><a href="index.html">Главная</a></li>
                            <li>Обратная связь</li>
                        </ul>
                    </div>
                    
                    <!--=======  End of breadcrumb content  =======-->
                </div>
            </div>
        </div>
    </div>
   
    <div class="page-section mt-30">
    <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-12 mb-sm-45 order-1 order-lg-2 mb-md-45">
                    <!--=======  contact page side content  =======-->
                    
                    <div class="contact-page-side-content">                                            
                        <div class="single-contact-block">
                            <h4><i class="fa fa-envelope-o"></i> Email</h4>
                            <p>info@domain.com</p>
                        </div>
                        
                        <!--=======  End of single contact block  =======-->
                    </div>
                    
                    <!--=======  End of contact page side content  =======-->

                </div>
                <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                    <!--=======  contact form content  =======-->
                    
                    <div class="contact-form-content">
                        <h3 class="contact-page-title">Напишите нам</h3>

                        <div class="contact-form">
                            <form  id="contact-form" action="/contact" method="post">
                                <div class="form-group">
                                    <label>Ваше имя <span class="required">*</span></label>
                                    <input type="text" name="customerName" id="customername" required>
                                </div>
                                <div class="form-group">
                                    <label>Ваш Email <span class="required">*</span></label>
                                    <input type="email" name="customerEmail" id="customerEmail" required>
                                </div>
                                <div class="form-group">
                                    <label>Тема</label>
                                    <input type="text" name="contactSubject" id="contactSubject">
                                </div>
                                <div class="form-group">
                                    <label>Ваше сообщение</label>
                                    <textarea name="contactMessage" id="contactMessage" ></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" value="submit" id="submit" class="theme-button contact-button" name="submit">Отправить</button>
                                </div>
                            </form>
                        </div>
                        <p class="form-messege pt-10 pb-10 mt-10 mb-10"></p>
                    </div>
                    
                    <!--=======  End of contact form content =======-->
                </div>
            </div>
        </div>
    </div>
@endsection