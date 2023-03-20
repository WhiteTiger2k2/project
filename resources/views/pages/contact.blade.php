<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/contact.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <div id="swapper">
        
        <!-- top -->
        @include('session/top')
        <!-- /.top -->
        
        <!-- header -->
        @include('session/header')
        <!-- /.header -->

        <!-- menu -->
        @include('session/menu')
        <!-- /.menu -->
    
        <!-- Body-->
        <div id="body">
            <div class="container col-lg-12 col-md-12 col-sm-12">

                <div class="row">
                    <div id="main" class="col-lg-12 col-md-12 col-sm-12 bg-white">
                        <div class="row">
                            <div class="home col-lg-12 col-md-12 col-sm-12">
                                <a href="index.html"><i class="icon-home fa fa-home"> Trang chủ</i></a>
                                <i class="fa fa-chevron-right" style="font-size:12px"></i>
                                <span>Liên Hệ</span>
                            </div>
                            <div id="text" class="col-lg-12 col-md-12 col-sm-12">
                                <hr>
                                <p>
                                    Xin chân thành cảm ơn bạn đã quan tâm đến dịch vụ của Luxury Shop, bạn có thể gửi thư liên hệ với chúng tôi từ website này bằng cách điền thông tin vào biểu mẫu bên dưới hoặc liên hệ trực tiếp với chúng tôi tại (012 345 6789), chúng tôi sẽ nhanh chóng liên hệ với bạn trong thời gian sớm nhất. Cảm ơn bạn.
                                </p>
                            </div>
                            <!--	form	-->
                            <div id="form" class="col-lg-5 col-md-12 col-sm-12">
                                <div class="register-form">
                                    <form role="form" method="post" action="{{ route('admin.store') }}">
                                        @csrf
                                        <h1>Đơn Liên Hệ</h1>
                                        <div class="input-box">
                                            <label>Tên đầy đủ(*):</label>
                                            <input name="name" class="form-control" type="text" placeholder="Tên đầy đủ" required>
                                        </div>
                                        <div class="input-box">
                                            <label>Email(*):</label>
                                            <input name="email" class="form-control" type="email" placeholder="email">
                                        </div>
                                        <div class="input-box">
                                            <label>Số điện thoại(*):</label>
                                            <input name="phone" class="form-control" type="text" placeholder="Số điện thoại">
                                        </div>
                                        <div class="input-box">
                                            <label>Địa chỉ(*):</label>
                                            <input name="address" class="form-control" type="text" placeholder="Địa chỉ">
                                        </div>
                                        <div class="input-box">
                                            <label for="gioithieu">Tin nhắn:</label>
                                            <br>
                                            <textarea id="gioithieu"  name="content" class="form-control"></textarea>
                                        </div>
                                        
                                        <div class="btn-box">
                                            <button type="submit">
                                                Gửi
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="contact" class="col-lg-7 col-md-12 col-sm-12">
                                <p></p>
                                <h3>Thông Tin Liên Hệ</h3>
                                <ul class="info">
                                    <li class="item-contact">
                                        <i class="fas fa-map-marker"></i> <span class="span_1">Địa chỉ:</span> Ninh Sở, Thường Tín, Hà nội
                                    </li>
                                    <br>
                                    <li class="item-contact">
                                        <i class="fas fa-envelope"></i> <span class="span_1">Email :</span> Admin@gmail.com
                                </li>
                                <br>
                                <li class="item-contact">
                                        <i class="fas fa-phone"></i> <span class="span_1">Hotline:</span> 012 345 6789
                                    </li>
                                </ul>
                                <div id="map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7454.799115636908!2d105.88669480000001!3d20.89623860000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e0!4m0!4m0!5e0!3m2!1svi!2s!4v1670915546219!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <!--	End form	-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End body-->

        <!-- Footer-->
        @include('session/footer')
        <!-- End Footer-->
    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-danger back-to-top"><i class="fa fa-angle-double-up"></i></a>
</body>
<script src="{{asset('js/jquery-3.3.1.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('lib/easing/easing.min.js')}}"></script>
 <!-- Template Javascript -->
 <script src="{{asset('js/main.js')}}"></script>
</html>