<!--	List Product	-->
<div class="products">
    <div id="search-result">Kết quả tìm kiếm với sản phẩm: <span style="font-weight: bold;"></div>
    <div class="product-list row">
        @foreach ($products as $product)
        @php
            $price = $product->price;
            $discount_percent = $product->discount_percent;
            $price_sale = $price - (($price * $discount_percent) / 100 );
        @endphp
        <div class="col-lg-3 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <div class="product-img  position-relative overflow-hidden">
                    <a href="#"><img class="image img-fluid w-100" src="../uploads/{{ $product->image }}"></a>
                    <div class="product-action">
                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i></a>
                        <a class="btn" href=""><i class="far fa-heart"></i></a>
                        <a class="btn" href=""><i class="fa fa-sync-alt"></i></a>
                        <a class="btn" href=""><i class="fa fa-search"></i></a>
                    </div>
                </div>
                <div class="text-center py-4">
                    <h6><a class="" href="#">{{ $product->name }}</a></h6>
                    <p><small class="text-muted ml-2"> <s><span>{{ $product->price }} <u><span>đ</span></u></span></s></small> <span class="span">{{ $price_sale }} <u><span class="span">đ</span></u></span></p>
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
<!--	End List Product	-->