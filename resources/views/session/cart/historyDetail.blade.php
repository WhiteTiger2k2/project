<section class="content">
    <div class="container-fluid">
      <form action="{{ route('history.update', $order->id) }}" role="form" method="post" >
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-12">
            <div class="customer mt-3">
              <ul>
                <li>Tên khách hàng: <strong>{{ Auth::user()->name }}</strong></li>
                <li>Số điện thoại: <strong>{{ Auth::user()->phone }}</strong></li>
                <li>Địa chỉ: <strong>{{ Auth::user()->address }}</strong></li>
                <li>Email: <strong>{{ Auth::user()->email }}</strong></li>
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
                  <input name="status" type="checkbox" value=3 > Hủy
              </label>
          </div>
            <button name="sbm" type="submit" class="btn btn-danger">OK</button>
          </div>
        </div>
      </form>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>