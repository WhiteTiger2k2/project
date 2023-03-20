<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Trang Đăng ký</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('css/login.css')}}" rel="stylesheet">
</head>

<body>
	<div class="container">
        <div class="header">
            <h1>Register</h1>
        </div>
        <div class="panel-body">
            <form role="form" method="post" action="{{ route('register.store') }}">
                @csrf
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="Tên người dùng" name="name" type="text">
                        <i class="fa fa-user"></i>
                        <span>
                            @if($errors->any('name'))
                              {{ $errors->first('name') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Email" name="email" type="email">
                        <i class="fa fa-envelope"></i>
                        <span>
                            @if($errors->any('email'))
                              {{ $errors->first('email') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Địa chỉ" name="address" type="text">
                        <i class="fa fa-map-marker"></i>
                        <span>
                            @if($errors->any('address'))
                              {{ $errors->first('address') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="số điện thoại" name="phone" type="text">
                        <i class="fa fa-phone"></i>
                        <span>
                            @if($errors->any('phone'))
                              {{ $errors->first('phone') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
                        <i class="fa fa-lock"></i>
                        <span>
                            @if($errors->any('password'))
                              {{ $errors->first('password') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Nhập lại mật khẩu" name="password" type="password" value="">
                        <i class="fa fa-lock"></i>
                        <span>
                            @if($errors->any('password'))
                              {{ $errors->first('password') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="submit">Đăng Ký</button>
                    </div>
                    <div class="two-col">
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="on"> Nhớ tài khoản
                            </label>
                        </div>
                        <div class="forgot">
                            <label>
                                <a href="/home/login">Đăng Nhập</a>
                            </label>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>	
</body>

</html>
