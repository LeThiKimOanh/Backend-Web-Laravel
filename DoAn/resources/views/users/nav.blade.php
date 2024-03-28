            <!--====== LOADER =====-->
            <div class="loader"></div>
    
    
            <!--======== SEARCH-OVERLAY =========-->       
            <div class="overlay">
                <a href="javascript:void(0)" id="close-button" class="closebtn">&times;</a>
                <div class="overlay-content">
                    <div class="form-center">
                        <form method="GET" action="/search_tour">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="searchTour" placeholder="Search..." required />
                                    <span class="input-group-btn"><button type="submit" class="btn"><span><i class="fa fa-search"></i></span></button></span>
                                </div><!-- end input-group -->
                            </div><!-- end form-group -->
                        </form>
                    </div><!-- end form-center -->
                </div><!-- end overlay-content -->
            </div><!-- end overlay -->
            
            
            <!--============= TOP-BAR ===========-->
            <div id="top-bar" class="tb-text-white">
                <div class="container">
                    <div class="row">          
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div id="info">
                                <ul class="list-unstyled list-inline">
                                    <li><span><i class="fa fa-map-marker"></i></span>Phường Hòa Quý - Quận Ngũ Hành Sơn - TP.Đà Nẵng</li>
                                    <li><span><i class="fa fa-phone"></i></span>+84 702 579 654</li>
                                </ul>
                            </div><!-- end info -->
                        </div><!-- end columns -->
                        
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div id="links">
                                <ul class="list-unstyled list-inline">
                                    @if (session()->get('user'))
                                    <li style="margin-right: 20px"><a href="profile"><span></i></span>--- {{ session()->get('user')->name }} --- </a></li>
                                    <li><a href="/logout"><span><i class="fa fa-solid fa-right-from-bracket"></i></span>Đăng Xuất</a></li>
                                    @else
                                    <li><a href="/login"><span><i class="fa fa-lock"></i></span>Đăng Nhập</a></li>
                                    <li><a href="/registration"><span><i class="fa fa-plus"></i></span>Đăng Ký</a></li> 
                                    @endif     
                                </ul>
                            </div><!-- end links -->
                        </div><!-- end columns -->				
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end top-bar -->
            
            <nav class="navbar navbar-default main-navbar navbar-custom navbar-white" id="mynavbar-1">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" id="menu-button">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>                        
                        </button>
                        <div class="header-search hidden-lg">
                            <a href="javascript:void(0)" class="search-button"><span><i class="fa fa-search"></i></span></a>
                        </div>
                        <a href="/" class="navbar-brand"><span><i class="fa fa-plane"></i>OTB</span>TRAVELS</a>
                    </div><!-- end navbar-header -->
                    
                    <div class="collapse navbar-collapse" id="myNavbar1">
                        <ul class="nav navbar-nav navbar-right navbar-search-link">
                            <li class="dropdown @if(isset($active)&&$active==1) active @endif"><a href="/">Trang chủ</a></li>
                        
                            <li class="dropdown @if(isset($active)&&$active==2) active @endif"><a href="/tour">Tours</a></li>
                            
                            <li class="dropdown @if(isset($active)&&$active==3) active @endif"><a href="/hotel">Khách sạn</a></li>
    
                            <li class="dropdown @if(isset($active)&&$active==5) active @endif"><a href="/about_us">Giới thiệu</a></li>
    
                            <li class="dropdown @if(isset($active)&&$active==6) active @endif"><a href="/contact_us">Liên hệ</a></li>
    
                            @if (session()->get('user'))
                            <li class="dropdown @if(isset($active)&&$active==7) active @endif">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: orange">User<span><i class="fa fa-angle-down"></i></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/user_profile">Thông tin cá nhân</a></li>
                                    <li><a href="/tour_booked">Tour đã đặt</a></li>
                                    <li><a href="/logout">Đăng xuất</a></li>
                                </ul>			
                            </li>
                            @endif
    
                            <li><a href="javascript:void(0)" class="search-button"><span><i class="fa fa-search"></i></span></a></li>
                        </ul>
                    </div><!-- end navbar collapse -->
                </div><!-- end container -->
            </nav><!-- end navbar -->        
            
            <div class="sidenav-content">
                <div id="mySidenav" class="sidenav" >
                    <h2 id="web-name"><span><i class="fa fa-plane"></i></span>OTBTRAVELS</h2>
    
                    <div id="main-menu">
                        <div class="closebtn">
                            <button class="btn btn-default" id="closebtn">&times;</button>
                        </div><!-- end close-btn -->
                    </div><!-- end main-menu -->
                </div><!-- end mySidenav -->
            </div><!-- end sidenav-content -->
