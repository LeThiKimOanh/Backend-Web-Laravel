<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>

<body class="hold-transition login-page">

<div class="login-box">
      
    <div class="card card-outline card-primary">

        <div class="card-header text-center">
            <img src="/admin_template/dist/img/AdminLogo.png" alt="Admin Logo" class="brand-image img-circle" style="border-radius: 10px;">
        </div>

        <div class="card-body">

            <p class="login-box-msg">Đăng nhập để bắt đầu phiên của bạn</p>
            
            {{-- @if(session()->has('error'))
                <p style="font-size: 15px; text-align: center" class="ogin-box-msg alert alert-danger">{{ session()->get('error') }}</p>
            @endif --}}

            @include('admin.alert')

            <form action="/admin/login" method="POST">

                @error('password')
                    <p style="font-size: 15px; text-align: center" class="ogin-box-msg alert alert-danger">{{ $message }}</p>
                @enderror
                
                @error('email')
                    <p style="font-size: 15px; text-align: center" class="ogin-box-msg alert alert-danger">{{ $message }}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Tên đăng nhập" name="email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope">
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 mb-4">

                    <div class="col-7">
                    </div>
                    
                    <div class="col-5">
                        <button type="submit" class="btn btn-primary btn-block">Đăng nhập<i class="fa-solid fa-user-check" style="margin-left: 5px"></i></button>
                    </div>
                    
                </div>

                @csrf

            </form>
    
            <div class="social-auth-links text-center mb-3">
                <span>
                    -- OR --
                </span>
            </div>
    
            <p class="mb-1">
                <a href="forgot-password.html">Quên mật khẩu</a>
            </p>

        </div>
       
    </div>
      
</div>

</body>
</html>