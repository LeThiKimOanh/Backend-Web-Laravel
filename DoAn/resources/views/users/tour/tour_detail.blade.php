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
<meta name="csrf-token" content="{{ csrf_token() }}">
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

                    @include('users.tour.booking')
                    
                    <div class="row">
                        @include('users.banner3')
                    </div><!-- end row -->
                </div><!-- end columns -->
                  
                
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                    
                    <div class="detail-slider">

                        <div class="feature-slider">
                            @foreach ($tour->tourImages as $image)
                                <div><img src="/picture/tour/{{ $image->image_url }}" class="img-responsive" alt="feature-img{{ $image->image_url }}"/></div>
                            @endforeach
                        </div><!-- end feature-slider -->
                        
                        <div class="feature-slider-nav">
                            @foreach ($tour->tourImages as $image)
                                <div><img src="/picture/tour/{{ $image->image_url }}" class="img-responsive" alt="feature-thumb{{ $image->image_url }}"/></div>
                            @endforeach
                        </div><!-- end feature-slider-nav -->
                        
                        <ul class="list-unstyled features tour-features">
                            <li><div class="f-icon"><i class="fa fa-wheelchair"></i></div><div class="f-text"><p class="f-heading">Số lượng</p><p class="f-data">{{ $tour->number_of_people }}</p></div></li>
                            <li><div class="f-icon"><i class="fa fa-calendar"></i></div><div class="f-text"><p class="f-heading">Thời gian</p><p class="f-data">
                                @php
                                $startDate = \Carbon\Carbon::parse($tour->start_date);
                                $endDate = \Carbon\Carbon::parse($tour->end_date);
                                $numberOfDays = $startDate->diffInDays($endDate);
                                @endphp
                                {{ $numberOfDays }} Ngày</p></div>
                            </li>
                            {{-- <li><div class="f-icon"><i class="fa fa-clock-o"></i></div><div class="f-text"><p class="f-heading">Discount</p><p class="f-data">10% OFF</p></div></li> --}}
                        </ul>
                        
                    </div><!-- end detail-slider -->  

                    <div class="detail-tabs">

                        <ul class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#tour-information" data-toggle="tab">Thông tin tour</a></li>
                            <li><a href="#comment" data-toggle="tab">Comment</a></li>
                            <li><a href="#map-overview" data-toggle="tab">Xem Map</a></li>
                        </ul>
                        
                        <div class="tab-content">

                            <div id="tour-information" class="tab-pane in active">
                                <div class="row">
                                    <h2 class="text-center" style="color:brown;">Thông tin Tour <i class="fa-solid fa-pen-clip"></i></h2>

                                    <div class="col-md-12">

                                        <div class="col-md-12">
                                            <h3 style="color: blue">{{ $tour->name }}</h3>
                                        </div>

                                        <div class="col-md-6">
                                            <h4>Tour 
                                                <span>
                                                    <div class="rating">
                                                        @for ($count=1;$count<=5; $count++)
                                                            @php
                                                                if($count <= $tour->rating){
                                                                    $color = "orange";
                                                                }else{
                                                                    $color = "lightgrey";
                                                                }
                                                            @endphp
                                                            <span><i class="fa fa-star {{ $color }}"></i></span>
                                                        @endfor
                                                        </div>
                                                </span>
                                            </h4><hr>
                                            <h4>Loại hình : <h5>{{ $tour->tourCategories->name }}</h5></h4><hr>
                                            <h4>Người lớn : <h5>{{ $tour->price_adult }} VND/Người</h5></h4><hr>
                                            <h4>Trẻ em : <h5>{{ $tour->price_child }} VND/Người</h5></h4><hr>
                                            <h4>Số lượng : <h5>{{ $tour->number_of_people }} Người</h5></h4><hr>
                                            <h4>Khách sạn : <h5>Bấm vào đây để xem trước: <a href="/hotel_detail/{{ $tour->hotel_id }}">{{ $tour->hotels->name }}</a></h5></h4><hr>
                                        </div><hr>

                                        <div class="col-md-6">
                                            <h4>Ngày bắt đầu : <h5>{{ $tour->start_date }}</h5></h4><hr>
                                            <h4>Ngày kết thúc : <h5>{{ $tour->end_date }}</h5></h4><hr>
                                            <h4>Địa điểm bắt đầu : <h5>{{ $tour->departure_address }}</h5></h4><hr>
                                            <h4>Địa điểm kết thúc : <h5>{{ $tour->destination_address }}</h5></h4><hr>
                                            <h4>Hướng dẫn viên :
                                                @foreach ($tour->tourGuideAssignment as $item)
                                                    <h5>{{ $item->tourGuide->name }}</h5>
                                                @endforeach
                                            </h4><hr>
                                        </div><hr>

                                        <div class="col-md-12">
                                            <h3 style="color: blue">Lịch trình : </h3>
                                            @php
                                                echo $tour->schedules
                                            @endphp
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div id="comment" class="tab-pane">

                                
                                @if (session()->get('user')==null)
                                    
                                @else
                                <div class="row" style="margin-bottom: 50px">
                                    <label for="comment">Thêm nhận xét tại đây:</label>
                                    <textarea name="comment" id="comment" class="col-sm-12 col-md-12" style="height: 150px;padding: 15px" placeholder="Viết nhận xét của bạn..." onchange="comment({{ $tour->id }},this.value,'/comment')"></textarea>
                                </div>
                                @endif
                                
                                @foreach ($comment as $item)
                                <div class="row" style="margin-bottom: 10px;">
                                    <div class="col-sm-2 col-md-2 tab-img">
                                        <div class="comment" style="width: 60px;height: 60px;">
                                            @if ($item->users->avatar_image==null)
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/800px-User-avatar.svg.png" class="img-responsive" alt="user-img" />
                                            @else
                                            <img src="/picture/user/{{ $item->users->avatar_image }}" alt="avatar" style="width: 100%;height: 100%;object-fit: cover" class="img-responsive">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-md-10 ">
                                        <div class="col-sm-6 col-md-6 ">
                                            <h5 style="color: blue">{{ $item->users->name }}</h5>
                                            <p>{{ $item->comment_text }}</p>
                                        </div>
                                        <div class="col-sm-4 col-md-4 ">
                                            <span style="font-size: smaller; margin-left: 50px" >{{ $item->comment_at }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <div id="map-overview" class="tab-pane">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4 tab-img">
                                        <div class="map">
                                            @php
                                                echo $tour->map
                                            @endphp
                                        </div><!-- end map -->
                                    </div><!-- end columns -->
                                    
                                    <div class="col-sm-8 col-md-8 tab-text">
                                        <h3>{{ $tour->destination_address }}</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    </div><!-- end columns -->
                                </div><!-- end row -->
                            </div><!-- end pick-up -->
                            
                        </div><!-- end tab-content -->
                    </div><!-- end detail-tabs -->
                    
                    <div class="available-blocks" id="available-tours">
                        
                        @foreach ($tours as $tour)
                        <div class="list-block main-block t-list-block">
                            <div class="list-content">
                                <div class="main-img list-img t-list-img">
                                    <a href="/tour_detail/{{ $tour->id }}">
                                        <img src="/picture/tour/{{ $tour->tourImages->first()->image_url }}" class="img-responsive" alt="tour-img" />
                                    </a>
                                    <div class="main-mask">
                                        <ul class="list-unstyled list-inline offer-price-1">
                                            <li class="price">{{ $tour->price_adult }} .VND<span class="divider">|</span><span class="pkg">
                                                @php
                                                    $startDate = \Carbon\Carbon::parse($tour->start_date);
                                                    $endDate = \Carbon\Carbon::parse($tour->end_date);
                                                    $numberOfDays = $startDate->diffInDays($endDate);
                                                @endphp
                                                {{ $numberOfDays }} Ngày
                                            </span></li>
                                            <li class="rating">
                                                @for ($count=1;$count<=5; $count++)
                                                    @php
                                                        if($count <= $tour->rating){
                                                            $color = "orange";
                                                        }else{
                                                            $color = "lightgrey";
                                                        }
                                                    @endphp
                                                    <span><i class="fa fa-star {{ $color }}"></i></span>
                                                @endfor
                                            </li>
                                        </ul>
                                    </div><!-- end main-mask -->
                                </div><!-- end t-list-img -->
                                
                                <div class="list-info t-list-info">
                                    <h3 class="block-title"><a href="/tour_detail/{{ $tour->id }}">{{ $tour->name }}</a></h3><br>
                                    <p class="block-minor" style="color: blue">Từ: {{ $tour->departure_address }} --- Đến:  {{ $tour->destination_address }}</p>
                                    <a href="/tour_detail/{{ $tour->id }}" class="btn btn-orange btn-lg">View More</a>
                                 </div><!-- end t-list-info -->
                            </div><!-- end list-content -->
                        </div><!-- end t-list-block -->
                        @endforeach
                        
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