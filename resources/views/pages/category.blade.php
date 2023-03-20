<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
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
                    <div class="col-12">
                        <nav class="breadcrumb bg-light mb-30">
                            <a class="breadcrumb-item text-dark" href="{{ route('home') }}">Trang chủ</a>
                            <span class="breadcrumb-item">Danh mục</span>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div id="main" class="col-lg-12 col-md-12 col-sm-12">
                        <!--  -->
                        @include('session/category/category')
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
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<!-- jquery App -->
<script src="../../js/jquery.js"></script>
<script src="{{asset('js/pages.js')}}"></script>
<script src="{{asset('lib/easing/easing.min.js')}}"></script>
 <!-- Template Javascript -->
 <script src="{{asset('js/main.js')}}"></script>

</html>