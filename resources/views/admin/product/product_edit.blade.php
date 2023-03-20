<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Cập nhật Sản Phẩm</title>
     <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
     <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{ asset('plugins/bs-stepper/css/bs-stepper.min.css') }}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{ asset('plugins/dropzone/min/dropzone.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- header -->
        @include('session/admin/header')
        <!-- /.header -->
      
        <!-- Vertical-menu -->
        @include('session/admin/vertical-menu')
        <!-- End Vertical-menu -->
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Thêm sản phẩm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
             </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Cập nhật sản phẩm</h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" role="form" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Tên sản phẩm</label>
                              <input name="name" class="form-control" placeholder="">
                          </div>
                                                          
                          <div class="form-group">
                              <label>Giá</label>
                              <input name="price" type="number" min="0" class="form-control">
                          </div>             
                          <div class="form-group">
                              <label>Khuyến mãi</label>
                              <select name="discount_id" class="form-control">
                                @foreach ($discounts as $discount)
                                <option value="{{ $discount->id }}">{{ $discount->name }}</option>
                                @endforeach
                              </select>
                          </div>  
                          <div class="form-group">
                              <label>Trạng thái</label>
                              <select name="status" class="form-control">
                                  <option value=1 selected>Còn hàng</option>
                                  <option value=0>Hết hàng</option>
                              </select>
                          </div>
                          <div class="form-group">
                            <label>Số lượng</label>
                            <input name="quantity" type="text" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Xuất xứ</label>
                            <input name="address" type="text" class="form-control">
                          </div>
                          <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                          <div class="form-group">
                            <label>Ảnh sản phẩm</label>
                            <input name="file_upload" class="form-control" type="file" id="upload">
                          </div> 
                          <div class="form-group">
                              <label>Danh mục</label>
                              <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Sản phẩm nổi bật</label>
                              <div class="checkbox">
                                  <label>
                                      <input name="featured" type="checkbox" value=1>Nổi bật
                                  </label>
                              </div>
                          </div>
                          <div class="form-group">
                            <label>Kích Hoạt</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                                <label for="active" class="custom-control-label">Có</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                                <label for="no_active" class="custom-control-label">Không</label>
                            </div>
                        </div>
                          <div class="form-group">
                              <label>Mô tả sản phẩm</label>
                              <textarea name="description" class="form-control" rows="3" id="summernote"></textarea>
                          </div>
                      </div>
                      <!-- /.form-group -->
                      <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                      <button type="reset" class="btn btn-default">Làm mới</button>
                  </div>
                </form>
              <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
          </div>
          <!-- /.card -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src=" {{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src=" {{ asset('/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src=" {{ asset('plugins/moment/moment.min.js') }}"></script>
<script src=" {{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- date-range-picker -->
<script src=" {{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src=" {{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<!-- dropzonejs -->
<script src="{{ asset('plugins/dropzone/min/dropzone.min.js') }}"></script>
<!-- Bootstrap App -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Bootstrap for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
</body>
</html>
