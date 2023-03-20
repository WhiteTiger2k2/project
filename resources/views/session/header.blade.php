<div id="header">
    <div id="logo" class="col-lg-3 col-md-3 col-sm-12">
        <h1 class="name-web">Luxury Shop</h1>
    </div>   

    <div id="search" class="col-lg-5 col-md-6 col-sm-12">
        <form class="form-inline" action="{{ route('home.search') }}">
            <input class="form-control mt-6" type="search" name="search" value="{{ request('search') }}" type="text" placeholder="Tìm kiếm" aria-label="Search">
            <button class="btn btn-danger mt-6" type="submit"><span class="icon-search fa fa-search"></span></button>
        </form>
    </div>
    <div id="cart">
        <a href="{{ route('home.cart') }}" class="mt-4 mr-2"><i class="icon-cart fa fa-shopping-cart" aria-hidden="true" ></i></a>
        <span class="mt-3">
            {{ !is_null($cartItems) ? count($cartItems) : 0 }}
        </span>
    </div>
</div>