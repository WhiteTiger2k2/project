<!-- Product -->
<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Sản Phẩm
                </button>
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 fa fa-filter"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 fa fa-close dis-none"></i>
                     Filter
                </div>

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 fa fa-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 fa fa-close dis-none"></i>
                    Search
                </div>
            </div>
            
            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="fa fa-search"></i>
                    </button>

                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                </div>	
            </div>

            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <div class="filter-col1 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Sort By
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="{{ route('home.shop') }}" class="filter-link stext-106 trans-04">
                                    Default
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{ route('sort.popularity') }}" class="filter-link stext-106 trans-04">
                                    Popularity
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{ route('home.shop') }}" class="filter-link stext-106 trans-04 filter-link-active">
                                    Newness
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{ route('price.asc') }}" class="filter-link stext-106 trans-04">
                                    Price: Low to High
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{ route('price.desc') }}" class="filter-link stext-106 trans-04">
                                    Price: High to Low
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col2 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Price
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="{{ route('home.shop') }}" class="filter-link stext-106 trans-04 filter-link-active">
                                    All
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{ route('price.first') }}" class="filter-link stext-106 trans-04">
                                    0 - 500.000 đ
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{ route('price.second') }}" class="filter-link stext-106 trans-04">
                                    500.000 - 1.000.000 đ
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{ route('price.third') }}" class="filter-link stext-106 trans-04">
                                    1.000.000 đ +
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col3 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Color
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="{{ route('color.black') }}" class="filter-link stext-106 trans-04">
                                    Black
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="{{ route('color.blue') }}" class="filter-link stext-106 trans-04 filter-link-active">
                                    Blue
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                                    <i class="zmdi zmdi-circle-o"></i>
                                </span>

                                <a href="{{ route('color.white') }}" class="filter-link stext-106 trans-04">
                                    White
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col4 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Tags
                        </div>

                        <div class="flex-w p-t-4 m-r--5">
                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Fashion
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Men
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Vest
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        <a href="{{ route('home.product', $product->id) }}"><img class="img-fluid w-100" src="../../../uploads/{{ $product->image }}" style="height: 300px"></a>
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

        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <ul class="listPage pagination">
            </ul>
        </div>
    </div>
</div>  