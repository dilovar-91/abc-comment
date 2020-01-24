@extends('layouts.main')
@section('title', 'Контакты')
@section('content')  
              <!-- Breadcrumb Start -->
 <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="/">Главная</a></li>
                        <li class="active"><a href="/contact">Контакты</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Contact Email Area Start -->
        <div class="contact-area ptb-45">
            <div class="container">
                <h3 class="mb-20">Пишите нам</h3>
                <p class="text-capitalize mb-20">Напишите ваши пожелание мы обязательно ответим.</p>
                <form id="contact-form" class="contact-form" action="/contact" method="post">
                    <div class="address-wrapper row">
                        <div class="col-md-12">
                            <div class="address-fname">
                                <input class="form-control" type="text" name="name" placeholder="Имя">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="address-email">
                                <input class="form-control" type="email" name="email" placeholder="Email">
                            </div>
                        </div>                        
                        <div class="col-md-12">
                            <div class="address-subject">
                                <input class="form-control" type="text" name="subject" placeholder="Тема">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="address-textarea">
                                <textarea name="message" class="form-control" placeholder="Напишите ваше сообщение"></textarea>
                            </div>
                        </div>
                    </div>
                    <p class="form-message"></p>
                    <div class="footer-content mail-content clearfix">
                        <div class="send-email float-md-right">
                            <input value="Отправить" class="return-customer-btn" type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Contact Email Area End -->
@endsection