<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Kiếm</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/search.css')}}" rel="stylesheet">
</head>
<body>
    <div id="swapper">
        
        <!-- top -->
        @include('session/top')
        <!-- /.top -->
        
        <!-- header -->
        @include('session/header')
        <!-- /.header -->
    
        <!-- Body-->
        <div id="body">
            <div class="container col-lg-12 col-md-12 col-sm-12">
                
                <!-- menu -->
                @include('session/menu')
                <!-- /.menu -->

                <div class="row">
                    <div id="main" class="col-lg-12 col-md-12 col-sm-12">
                        <!--	cart	-->
                        @include('session/search/search')
                        <!--	End cart	-->
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
<script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <!-- Template Javascript -->
<script src="{{asset('js/main.js')}}"></script>
</html>