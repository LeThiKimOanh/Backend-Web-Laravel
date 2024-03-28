@extends('users.main')

@section('css')	
<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i%7CMerriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">	
<link rel="stylesheet" href="/users_template/css/bootstrap.min.css">
<link rel="stylesheet" href="/users_template/css/font-awesome.min.css">	
<link rel="stylesheet" href="/users_template/css/style.css">
<link rel="stylesheet" id="cpswitch" href="/users_template/css/orange.css">
<link rel="stylesheet" href="/users_template/css/responsive.css">
<link rel="stylesheet" href="/users_template/css/datepicker.css">
<link rel="stylesheet" href="/users_template/css/slick.css">
<link rel="stylesheet" href="/users_template/css/slick-theme.css">
<style>
    #newsletter-1{
	background:linear-gradient(rgba(0, 0, 0,0.6),rgba(0, 0, 0,0.6)), url('/picture/image/newsletter.jpg')50% 78%;
	background-size:140%;
	color:white;
}
</style>
@endsection

@section('content')

    <div id="tour-details" class="innerpage-section-padding">

        <div class="container">

            <div class="row"> 
                
                <div class="col-xs-12 col-sm-12 col-md-3 side-bar left-side-bar">
                    <div class="row">
                        @include('users.banner3')
                    </div>
                </div>
                  
                
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                    
                    <div class="detail-slider">

                        <div class="feature-slider">
                            @foreach ($hotel->hotelImages as $image)
                                <div><img src="/picture/hotel/{{ $image->image_url }}" class="img-responsive" alt="feature-img{{ $image->image_url }}"/></div>
                            @endforeach
                        </div><!-- end feature-slider -->
                        
                        <div class="feature-slider-nav">
                            @foreach ($hotel->hotelImages as $image)
                                <div><img src="/picture/hotel/{{ $image->image_url }}" class="img-responsive" alt="feature-thumb{{ $image->image_url }}"/></div>
                            @endforeach
                        </div>
                        
                        <ul class="list-unstyled features tour-features">
                            <li><div class="f-icon"><i class="fa fa-wheelchair"></i></div><div class="f-text"><p class="f-heading">Price</p><p class="f-data">{{ $hotel->price }}</p></div></li>
                            <li class="rating">
                                @for ($count=1;$count<=5; $count++)
                                    @php
                                        if($count <= $hotel->rating){
                                            $color = "orange";
                                        }else{
                                            $color = "lightgrey";
                                        }
                                    @endphp
                                    <span><i class="fa fa-star {{ $color }}"></i></span>
                                @endfor
                            </li>
                        </ul>
                        
                    </div> 

                    <div class="detail-tabs">

                        <ul class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#hotel-information" data-toggle="tab">Thông tin khách sạn</a></li>
                            <li><a href="#map-overview" data-toggle="tab">Xem Map</a></li>
                        </ul>
                        
                        <div class="tab-content">

                            <div id="hotel-information" class="tab-pane in active">
                                <div class="row">
                                    <h2 class="text-center" style="color:brown;">Thông tin khách sạn <i class="fa-solid fa-pen-clip"></i></h2>

                                    <div class="col-md-12">

                                        <div class="col-md-12">
                                            <h3 style="color: blue">{{ $hotel->name }}</h3>
                                        </div>

                                        <div class="col-md-12">
                                            <h4>Hotel <div class="rating">
                                                @for ($count=1;$count<=5; $count++)
                                                    @php
                                                        if($count <= $hotel->rating){
                                                            $color = "orange";
                                                        }else{
                                                            $color = "lightgrey";
                                                        }
                                                    @endphp
                                                    <span><i class="fa fa-star {{ $color }}"></i></span>
                                                @endfor
                                            </li></h4>
                                            <h4>Price : <h5>{{ $hotel->price }} VND/Người</h5></h4>
                                            <h4>Địa chỉ : <h5>{{ $hotel->address }} Người</h5></h4>
                                        </div>

                                        <div class="col-md-12">
                                            <h3 style="color: blue">Chi tiết : </h3>
                                            @php
                                                echo $hotel->status
                                            @endphp
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                            <div id="map-overview" class="tab-pane">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4 tab-img">
                                        <div class="map">
                                            @php
                                                echo $hotel->map
                                            @endphp
                                        </div><!-- end map -->
                                    </div><!-- end columns -->
                                    
                                    <div class="col-sm-8 col-md-8 tab-text">
                                        <h3>{{ $hotel->name }}</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    </div><!-- end columns -->
                                </div><!-- end row -->
                            </div><!-- end pick-up -->
                            
                        </div><!-- end tab-content -->
                    </div><!-- end detail-tabs -->
                    
                    <div class="available-blocks" id="available-tours">
                        
                        
                        
                    </div><!-- end available-tours -->
                                               
    
                </div><!-- end columns -->

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end tour-detail -->

@endsection

@section('js')
<script src="/users_template/js/jquery.min.js"></script>
<script src="/users_template/js/bootstrap.min.js"></script>
<script src="/users_template/js/bootstrap-datepicker.js"></script>
<script src="/users_template/js/slick.min.js"></script>
<script src="/users_template/js/custom-navigation.js"></script>
<script src="/users_template/js/custom-date-picker.js"></script>
<script src="/users_template/js/custom-slick.js"></script>
@endsection