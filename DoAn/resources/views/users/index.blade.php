<!DOCTYPE html>
<html lang="en">
<head>
    @include('users.head')
</head>
<body id="main-homepage">
    
            @include('users.nav')
            
            <section class="flexslider-container" id="flexslider-container-1">
    
                <div class="flexslider slider" id="slider-1">
                    <ul class="slides">

                        @foreach ($slider as $item)

                            <li class="item-1" style="background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url(picture/slider/{{ $item ->image }}) 50% 0%;
                            background-size:cover;
                            height:100%;">
                           <div class=" meta">         
                                <div class="container">
                                    <h2>{{ $item ->status }}</h2>
                                    <h1>{{ $item ->name }}</h1>
                                    <a href="/tour" class="btn btn-default">Xem tất cả</a>
                                </div>  
                            </div>
                            </li>
                            
                        @endforeach

                    </ul>
                </div>
                
                <div class="search-tabs" id="search-tabs-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
            
                                <div class="tab-content">
    
                                    <div id="tours" class="tab-pane in active">

                                        <form method="GET" action="search">

                                            <div class="row">
                                            
                                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control" name="departure_address" placeholder="Điểm xuất phát" />
                                                        <i class="fa fa-map-marker"></i>
                                                    </div>
                                                </div>
    
                                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control" name="detination_address" placeholder="Điểm đến" />
                                                        <i class="fa fa-map-marker"></i>
                                                    </div>
                                                </div>
    
                                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control dpd1" name="start_date" placeholder="Bắt đầu" >
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
    
                                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control dpd1" name="end_date" placeholder="Kết thúc" >
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
    
                                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control" name="name" placeholder="Tên tours" />
                                                        <i class="fa fa-tags"></i>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                                    <button class="btn btn-orange" type="submit">Tìm kiếm</button>
                                                </div>

                                                @csrf
                                                
                                            </div>

                                        </form>

                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            
            <section id="hotel-offers" class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="page-heading">
                                <h2>Các tour mới nhất</h2>
                                <hr class="heading-line" />
                            </div>
                            
                            <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-hotel-offers">
                                
                                @foreach ($tourRecent as $tour)
                                <div class="item">
                                    <div class="main-block hotel-block">
                                        <div class="main-img">
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
                                            </div>
                                        </div>
                                        
                                        <div class="main-info hotel-info">
                                            <div class="arrow">
                                                <a href="/tour_detail/{{ $tour->id }}"><span><i class="fa fa-angle-right"></i></span></a>
                                            </div>
                                            
                                            <div class="main-title hotel-title">
                                                <a href="/tour_detail/{{ $tour->id }}">{{ $tour->name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                            
                            <div class="view-all text-center">
                                <a href="tour" class="btn btn-orange">Xem tất cả</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @include('users.banner2')      
            
            <section id="video-banner" class="banner-padding back-size"> 
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Khung Cảnh Việt Nam</h2>
                            <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper.</p>
                            <video width="100%" height="100%" autoplay muted loop>
                                <source src="users_template/images/video1.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </section>
    
            <section id="testimonials" class="section-padding back-size">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-heading white-heading">
                                <h2>Đánh giá</h2>
                                <hr class="heading-line" />
                            </div>
    
                            <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                                <div class="carousel-inner text-center">
                                
                                    <div class="item active">
                                        <blockquote>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper.</blockquote>
                                        <div class="rating">
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star lightgrey"></i></span>
                                        </div>
                                        <small>Jhon Smith</small>
                                    </div>
                                    
                                    <div class="item">
                                        <blockquote>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper.</blockquote>
                                        <div class="rating">
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star lightgrey"></i></span>
                                        </div>
                                                
                                        <small>Jhon Smith</small>
                                    </div>
                                    
                                    <div class="item">
                                        <blockquote>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper.</blockquote>
                                        <div class="rating">
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star orange"></i></span>
                                            <span><i class="fa fa-star lightgrey"></i></span>
                                        </div>
                                        
                                        <small>Jhon Smith</small>
                                    </div>
                                    
                                </div>
                                
                                <ol class="carousel-indicators">
                                    <li data-target="#quote-carousel" data-slide-to="0" class="active"><img src="users_template/images/client-1.jpg" class="img-responsive"  alt="client-img">
                                    </li>
                                    <li data-target="#quote-carousel" data-slide-to="1"><img src="users_template/images/client-2.jpg" class="img-responsive"  alt="client-img">
                                    </li>
                                    <li data-target="#quote-carousel" data-slide-to="2"><img src="users_template/images/client-3.jpg" class="img-responsive"  alt="client-img">
                                    </li>
                                </ol>
            
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
                    
            
    @include('users.foot')

</body>
</html>