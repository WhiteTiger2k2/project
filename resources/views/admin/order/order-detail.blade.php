<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
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
            <h1 class="m-0">{{ $title }}</h1>
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
        <form action="{{ route('order.update', $order->id) }}" role="form" method="post" >
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-12">
              <div class="customer mt-3">
                @foreach ($orders as $order)
                <ul>
                  <li>Tên khách hàng: <strong>{{ $order->name }}</strong></li>
                  <li>Số điện thoại: <strong>{{ $order->phone }}</strong></li>
                  <li>Địa chỉ: <strong>{{ $order->address }}</strong></li>
                  <li>Email: <strong>{{ $order->email }}</strong></li>
                  <li>Trạng thái: 
                    <strong>
                      @if($order->status == 0)
                        {{ 'đợi duyệt'}}
                      @elseif($order->status == 1)
                        {{ 'đã duyệt'}}
                      @elseif($order->status == 3)
                        {{'đã hủy'}}
                      @endif
                    </strong>
                  </li>
              </ul>
                @endforeach
              </div>
          
              <div class="carts">
                  @php $total = 0; @endphp
                  <table class="table">
                      <tbody>
                      <tr class="table_head">
                          <th class="column-1">IMG</th>
                          <th class="column-2">Product</th>
                          <th class="column-3">Price</th>
                          <th class="column-4">Quantity</th>
                          <th class="column-5">Total</th>
                      </tr>
          
                      @foreach($carts as $cart)
                          @php
                              $price = $cart->price * $cart->quantity;
                              $total += $price;
                          @endphp
                          <tr>
                              <td class="column-1">
                                  <div class="how-itemcart1">
                                      <img src="{{ asset('uploads/'.$cart->product->image) }}" alt="IMG" style="width: 100px">
                                  </div>
                              </td>
                              <td class="column-2">{{ $cart->product->name }}</td>
                              <td class="column-3">{{ number_format($cart->price, 0, '', '.') }}</td>
                              <td class="column-4">{{ $cart->quantity }}</td>
                              <td class="column-5">{{ number_format($price, 0, '', '.') }}</td>
                          </tr>
                      @endforeach
                          <tr>
                              <td colspan="4" class="h5 text-right">Tổng Tiền:</td>
                              <td>{{ number_format($total, 0, '', '.') }}</td>
                          </tr>
                      </tbody>
                  </table>
              </div>
              <div class="checkbox">
                <label>
                    <input name="status" type="checkbox" value=1 >
                </label>
            </div>
              <button name="sbm" type="submit" class="btn btn-success">Check</button>
            </div>
          </div>
        </form>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- jQuery for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
