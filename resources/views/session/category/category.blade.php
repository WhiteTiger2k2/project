<div class="row">

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar col-lg-3 col-md-4 col-sm-12 col-xs-12">
        <div class="sidebar-contain">
            <div class="widget item-filter">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <h5><i class="fa fa-bars"></i> Danh Mục Sản Phẩm</h5>
                        @foreach ($categories as $category)
                        <ul>
                            <li class="nav-item">
                                <a href="/{{ $category->name }}" class="nav-item"><i class="far fa-circle nav-icon" style="font-size: 12px"></i> {{ $category->name }}</a>
                            </li>
                        </ul>
                        @endforeach
                    </li>
                </ul>
                <br><br>
            </div>

            <div class="widget item-filter">
                <h4 class="wgt-title">Sản phẩm gần đây:</h4>
                <div class="wgt-content">
                    <ul class="products">
                        @foreach ($hotproducts as $product)
                        @php
                            $price = $product->price;
                            $discount_percent = $product->discount_percent;
                            $price_sale = $price - (($price * $discount_percent) / 100 );
                        @endphp
                        <div class="product-item card text-center">
                            <div class="product-img  position-relative overflow-hidden">
                                <a href="{{ route('home.product', $product->id) }}"><img class="img-fluid w-100" src="../../uploads/{{ $product->image }}"></a>
                                <div class="product-action">
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn" href="{{ route('home.product', $product->id) }}"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <h6><a class="" href="{{ route('home.product', $product->id) }}">{{ $product->name }}</a></h6>
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
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="tag">
                <h4 class="wgt-title">Tags: </h4>
                <div class="wgt-content">
                    <ul class="tag-cloud">
                        <li class="tag-item"><a href="#" class="tag-link">Áo</a></li>
                        <li class="tag-item"><a href="#" class="tag-link">Quần</a></li>
                        <li class="tag-item"><a href="#" class="tag-link">Hot</a></li>
                        <li class="tag-item"><a href="#" class="tag-link">Thời trang Nam</a></li>
                        <li class="tag-item"><a href="#" class="tag-link">Thời trang Nữ</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </aside>
    <!-- end Sidebar -->

    <!-- Main content -->
    <div id="main-content" class="main-content col-lg-9 col-md-8 col-sm-12 col-xs-12">


        <div class="product-category grid-style">
            
            <div id="top-functions-area" class="top-functions-area" >
                <div class="flt-item to-left group-on-mobile">
                    <span class="flt-title">Filter: </span>
                    <div class="wrap-selectors">
                        <form action="#" name="frm-refine" method="get">
                            <div data-title="Price:" class="selector-item">
                                <select name="price" class="selector">
                                    <option value="all">Price</option>
                                    <option value="class-1st">Less than 5$</option>
                                    <option value="class-2nd">$5-10$</option>
                                    <option value="class-3rd">$10-20$</option>
                                    <option value="class-4th">$20-45$</option>
                                    <option value="class-5th">$45-100$</option>
                                    <option value="class-6th">$100-150$</option>
                                    <option value="class-7th">More than 150$</option>
                                </select>
                            </div>
                            <div data-title="Brand:" class="selector-item">
                                <select name="brad" class="selector">
                                    <option value="all">Top brands</option>
                                    <option value="br2">Brand first</option>
                                    <option value="br3">Brand second</option>
                                    <option value="br4">Brand third</option>
                                    <option value="br5">Brand fourth</option>
                                    <option value="br6">Brand fiveth</option>
                                </select>
                            </div>
                            <div data-title="Avalability:" class="selector-item">
                                <select name="ability" class="selector">
                                    <option value="all">Màu sắc</option>
                                    <option value="vl2"><i class="fa fa-circle" style="color: #222;"></i> Đen</option>
                                    <option value="vl3">Availability 2</option>
                                    <option value="vl4">Availability 3</option>
                                    <option value="vl5">Availability 4</option>
                                    <option value="vl6">Availability 5</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="flt-item to-right">
                    <span class="flt-title">Sort: </span>
                    <div class="wrap-selectors">
                        <div class="selector-item orderby-selector">
                            <select name="orderby" class="orderby" aria-label="Shop order">
                                <option value="menu_order" selected="selected">Mặc định</option>
                                <option value="popularity">Phổ biến</option>
                                <option value="rating">Cũ nhất</option>
                                <option value="date">Mới nhất</option>
                                <option value="price">Giá: thấp đến cao</option>
                                <option value="price-desc">Giá: Cao đến thấp</option>
                            </select>
                        </div>
                        <div class="selector-item viewmode-selector">
                            <a href="category-grid-left-sidebar.html" class="viewmode grid-mode"><i class="fa fa-th-list"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-list row">
                @foreach ($products as $product)
                {{-- @php
                    $price = $product->price;
                    $discount_percent = $product->discount_percent;
                    $price_sale = $price - (($price * $discount_percent) / 100 );
                @endphp --}}
                <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                    <div class="product-item card text-center">
                        <div class="product-img  position-relative overflow-hidden">
                            <a href="{{ route('home.product', $product->id) }}"><img class="img-fluid w-100" src="../../uploads/{{ $product->image }}" style="height: 300px"></a>
                            <div class="product-action">
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn" href=""><i class="far fa-heart"></i></a>
                                <a class="btn" href="{{ route('home.product', $product->id) }}"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h6><a class="" href="{{ route('home.product', $product->id) }}">{{ $product->name }}</a></h6>
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
            
            <div id="pagination">
                <ul class="listPage pagination">
                </ul>
            </div>
    </div>
</div>