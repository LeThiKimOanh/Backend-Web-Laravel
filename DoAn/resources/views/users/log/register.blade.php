@extends('users.main')

@section('content')

<section class="innerpage-wrapper">
    <div id="registration" class="innerpage-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                
                    <div class="flex-content">
                        <div class="custom-form custom-form-fields">
                            <h3>Đăng ký</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <form method="POST" action="registration" enctype="multipart/form-data">
                                    
                                <div class="form-group">
                                     <input type="text" class="form-control" placeholder="Họ và tên" name="name"  required/>
                                     <span><i class="fa fa-user"></i></span>
                                </div>

                                <div class="form-group">
                                     <input type="email" class="form-control" placeholder="Email" name="email"  required/>
                                     <span><i class="fa fa-envelope"></i></span>
                                </div>

                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Số diện thoại" name="phone"  required/>
                                    <span><i class="fa fa-phone"></i></span>
                                </div>

                                <div class="form-group">
                                    <input type="date" class="form-control" placeholder="Ngày sinh" name="birthday" />
                                    <span><i class="fa fa-calendar"></i></span>
                                </div>

                                <div class="form-group">
                                    <input type="file" class="form-control" placeholder="Avatar" name="avatar" />
                                    <span><i class="fa fa-image"></i></span>
                                </div>
                                
                                <div class="form-group">
                                     <input type="password" class="form-control" placeholder="Mật khẩu" name="password"  required/>
                                     <span><i class="fa fa-lock"></i></span>
                                </div>

                                <div class="form-group">
                                     <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="confirmPassword"  required/>
                                     <span><i class="fa fa-lock"></i></span>
                                </div>
                                
                                <button class="btn btn-orange btn-block">Đăng ký</button>
                                @csrf
                            </form>
                            
                            <div class="other-links">
                                <p class="link-line">Bạn đã có tài khoản ? <a href="login">Đăng nhập</a></p>
                            </div><!-- end other-links -->
                        </div><!-- end custom-form -->
                        
                        <div class="flex-content-img custom-form-img">
                            <img src="/picture/image/login.jpg" class="img-responsive" alt="registration-img" />
                        </div><!-- end custom-form-img -->
                    </div><!-- end form-content -->
                    
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->         
    </div><!-- end registration -->
</section><!-- end innerpage-wrapper -->

@endsection