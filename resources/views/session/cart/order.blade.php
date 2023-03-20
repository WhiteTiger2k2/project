<form method="post" action="/carts">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th data-field="id" data-sortable="true">ID</th>
                  <th>Tên khách hàng</th>
                  <th>Số điện thoại</th>
                  <th>Ngày Đặt hàng</th>
                  <th>Tình trạng</th>
                  <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($orderItems as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ Auth::user()->name }}</td>
                    <td>{{ Auth::user()->phone }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                      <span class="label label-success">
                        @if($item->status == 0)
                          {{ 'đợi duyệt'}}
                        @elseif($item->status == 1)
                          {{ 'đã duyệt'}}
                        @elseif($item->status == 3)
                          {{'đã hủy'}}
                        @endif
                      </span>
                    </td>
                    <td class="form-group">
                        <a href="/detail/{{ $item->id }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                      <th data-field="id" data-sortable="true">ID</th>
                      <th>Tên khách hàng</th>
                      <th>Số điện thoại</th>
                      <th>Ngày Đặt hàng</th>
                      <th>Tình trạng</th>
                      <th>Hành động</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
</form>