<form method="post" action="/carts">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
         <!--	Cart	-->
            @php $total = 0; @endphp
            <div id="my-cart">
                <div class="row cart-title">
                    <div class="cart-nav-item col-lg-4 col-md-4 col-sm-12">Thông tin sản phẩm</div>
                    <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Giá</div>
                    <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Số lượng</div> 
                    <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Tổng</div> 
                    <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Xóa</div>  
                </div>  
                    @if (count($cartItems) > 0)
                        @foreach($cartItems as $cart)
                            @php
                                $price = $cart->products->price;
                                $discount_percent = $cart->products->discount->discount_percent;
                                $price_sale = $price - (($price * $discount_percent) / 100 );
                                $priceEnd = $price_sale * $cart->quantity;
                                $total += $priceEnd;
                            @endphp
                            <div class="cart-item row product_data">
                                <div class="cart-thumb col-lg-4 col-md-4 col-sm-12">
                                    <img src="{{ asset('uploads/'.$cart->products->image) }}">
                                    <h4>{{ $cart->products->name }}</h4>
                                </div> 
                                <div class="cart-price col-lg-2 col-md-2 col-sm-12">
                                    {{ $price_sale }} đ
                                </div>
                                <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                                    <input type="hidden" class="product_id" value="{{ $cart->product_id }}">
                                    <input class="btn-minus is-form btn btn-danger changeQuantity" type="button" value="-">
                                    <input aria-label="quantity" type="number" id="quantity" class="form-control form-blue quantity" name="quantity" value="{{ $cart->quantity }}" min="1">
                                    <input class="btn-plus is-form btn btn-danger changeQuantity" type="button" value="+">
                                        {{-- <div class="btn-plus"></div>
                                        <button style="submit" class="btn btn-success"  formaction="/update-cart/{{ $cart->product_id }}">cập nhật</button> --}}
                                        @csrf
                                    
                                </div>
                                <div class="cart-price col-lg-2 col-md-2 col-sm-12">
                                    {{ number_format($priceEnd, 0, '', '.') }} đ
                                </div>
                                <div class="cart-remove col-lg-2 col-md-2 col-sm-12">
                                    <a href="/delete-cart-item/{{ $cart->product_id }}" class="delete-cart-item btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                    {{-- <button class="delete-cart-item btn btn-sm btn-danger"><i class="fa fa-times"></i></button> --}}
                                </div>
                                {{-- <input type="hidden" name="product_id" value="{{ $item->product_id }}" class="product_id">
                                @csrf --}}
                            </div>
                        @endforeach
                    @else
                        <div class="text-center"><h2 style="text-align: center; font-size: 24px; padding: 20px;">Giỏ hàng trống</h2></div>
                    @endif
                
                    <div class="row">
                        <div class="cart-thumb col-lg-6 col-md-6 col-sm-12">
                            <input value="Cập nhật giỏ hàng" formaction="/cart/update" id="update-cart" class="btn btn-success">
                            @csrf
                        </div> 
                        <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Tổng cộng:</b></div> 
                        <div class="cart-price col-lg-2 col-md-4 col-sm-12"><b>{{ number_format($total, 0, '', '.') }}</b></div>
                    </div>
            </div>
            <!--	End Cart	-->
            
            <!--	Customer Info	-->
            <div id="customer">
                <div class="row">
                    <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                        <label>Họ & Tên</label>
                        <input value="{{ Auth::user()->name }}" placeholder="Họ và tên (bắt buộc)" type="text" name="name" class="form-control" required>
                    </div>
                    <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                        <label>Email</label>
                        <input  value="{{ Auth::user()->email }}" placeholder="Email (bắt buộc)" type="text" name="email" class="form-control" required>
                    </div>
                    <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                        <label>Số điện thoại</label>
                        <input  value="{{ Auth::user()->phone }}" placeholder="Số điện thoại (bắt buộc)" type="text" name="phone" class="form-control" required>
                    </div>
                    <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                        <label>Địa chỉ giao hàng</label>
                        <input  value="{{ Auth::user()->address }}" placeholder="Địa chỉ" type="text" name="address" class="form-control" required>
                    </div>
                    <div id="content-add" class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 20px">
                        <label>Nội dung</label>
                        <textarea name="message" class="form-control" id="summernote"></textarea>
                    </div>
                    {{-- <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                        <h5 class="section-title position-relative mb-3"><span class="pr-3">Phương Thức Thanh Toán</span></h5>
                        <div class="bg-light">
                            <div class="form-group">
                                <select name="payment_id" class="form-control">
                                    <option value=1>Thanh toán online qua cổng OnePay bằng thẻ ATM nội địa</option>
                                    <option value=2>Thanh toán khi giao hàng (COD)</option>
                                    <option value=3>Chuyển khoản qua ngân hàng</option>
                                    <option value=4>Thanh toán online qua cổng OnePay bằng thẻ Visa/Master/JCB</option>
                                </select>
                            </div>
                            
                        </div>
                    </div> --}}
                    <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">
                        ĐẶT HÀNG
                    </button>
                </div>
            </div>
            <!--	End Customer Info	-->
        </div>
    </div>
</form>