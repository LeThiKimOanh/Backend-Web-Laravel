@extends('users.main')

@section('content')
    
    <section class="innerpage-wrapper">
        <div id="login" class="innerpage-section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    
                        <div class="flex-content">
                            <div class="custom-form custom-form-fields">
                                <h3>Đăng nhập</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                @include('users.alert')
                                <form action="login" method="POST">
                                        
                                    <div class="form-group">
                                         <input type="email" class="form-control" placeholder="Email" name="email"  required/>
                                         <span><i class="fa fa-user"></i></span>
                                    </div>
                                    
                                    <div class="form-group">
                                         <input type="password" class="form-control" placeholder="Mật khẩu" name="password"  required/>
                                         <span><i class="fa fa-lock"></i></span>
                                    </div>
                                    
                                    <div class="checkbox">
                                         <label><input type="checkbox"> Remember me</label>
                                    </div>
                                    
                                    <button class="btn btn-orange btn-block" type="submit">Đăng nhập</button>

                                    @csrf

                                </form>
                                
                                <div class="other-links">
                                    <p class="link-line">Tạo tài khoản mới ? <a href="registration">Đăng ký</a></p>
                                    <a class="simple-link" href="forgot_password">Quên mật khẩu ?</a>
                                </div><!-- end other-links -->
                            </div><!-- end custom-form -->
                            
                            <div class="flex-content-img custom-form-img">
                                <img src="picture/image/login.jpg" class="img-responsive" alt="registration-img" />
                            </div><!-- end custom-form-img -->
                        </div><!-- end form-content -->
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->         
        </div><!-- end login -->
    </section><!-- end innerpage-wrapper -->
@endsection