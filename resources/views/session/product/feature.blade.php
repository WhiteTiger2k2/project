<div class="products">
    <h3>Sản phẩm hot nhất</h3>
    <div class="product-list row">
        @foreach ($featureProducts as $product)
        @php
            $price = $product->price;
            $discount_percent = $product->discount_percent;
            $price_sale = $price - (($price * $discount_percent) / 100 );
        @endphp
        <div class="col-lg-3 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <div class="sale">
                    <span>{{ $product->discount }}</span>
                </div>
                <div class="product-img  position-relative overflow-hidden">
                    <a href="{{ route('home.product', $product->id) }}"><img class="img-fluid w-100" src="uploads/{{ $product->image }}"></a>
                    <div class="product-action">
                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i></a>
                        <a class="btn" href=""><i class="far fa-heart"></i></a>
                        <a class="btn" href="{{ route('home.product', $product->id) }}"><i class="fa fa-search"></i></a>
                    </div>
                </div>
                <div class="text-center py-4">
                    <h6><a class="text-decoration-none " href="{{ route('home.product', $product->id) }}">{{ $product->name }}</a></h6>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>{{ $price_sale }}đ</h5><h6 class="text-muted ml-2"><del>{{ $product->price }}đ</del></h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-1">
                        <small class="fa fa-star text-star mr-1"></small>
                        <small class="fa fa-star text-star mr-1"></small>
                        <small class="fa fa-star text-star mr-1"></small>
                        <small class="fa fa-star text-star mr-1"></small>
                        <small class="far fa-star text-star mr-1"></small>
                        <small>(99)</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>