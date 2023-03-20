<div class="row mb-30">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <nav>
            <div id="menu">
                <ul>
                    <li class="menu-item btn-cat">
                        <a class="col-lg-4 w-100" data-toggle="collapse" href="#navbar-vertical" style="padding: 0 30px;"><i class="fa fa-bars mr-2"></i>
                            Danh Mục Sản Phẩm 
                            <i class="fa fa-angle-down text-dark icon-down"></i>
                            <i class="fa fa-angle-up text-dark icon-up d-none"></i>
                        </a>
                    </li>
                    <nav  class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0" id="navbar-vertical">
                        <div class="navbar-nav w-100">
                            @foreach ($categories as $category)
                            <ul>
                                <li>
                                    <a href="{{ route('home.category', $category->id) }}" class="nav-item">{{ $category->name }}</a>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </nav>
                    <li class="menu-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="menu-item"><a href="{{ route('home.introduce') }}">Giới Thiệu</a></li>
                    <li class="menu-item"><a href="{{ route('home.shop') }}">Shop</a></li>
                    <li class="menu-item"><a href="{{ route('home.contact') }}">Liên Hệ</a></li>
                    <li class="menu-item"><a href="{{ route('home.history') }}">Lịch sử</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>