@extends('users.main')

@section('content')

<section class="innerpage-wrapper">

    <div id="hotel-listing" class="innerpage-section-padding">

        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">

                        @foreach ($hotelList as $hotel)
                            <div class="list-block main-block h-list-block">
                                <div class="list-content">
                                    <div class="main-img list-img h-list-img">
                                        <a href="/hotel_detail/{{ $hotel->id }}">
                                            <img src="/picture/hotel/{{ $hotel->hotelImages->first()->image_url }}" class="img-responsive" alt="hotel-img" />
                                        </a>
                                        <div class="main-mask">
                                            <ul class="list-unstyled list-inline offer-price-1">
                                                <li class="price"><i class="fa-solid fa-wifi"></i> Free<span class="divider">|</span><span class="pkg"> Ngày/Đêm</span></li>
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
                                    </div>

                                    <div class="list-info h-list-info">
                                        <h3 class="block-title"><a href="hotel-detail-right-sidebar.html" style="color: #936e4f">{{ $hotel->name }}</a></h3>
                                        <p class="block-minor" style="color: #bb0b0b;"><i class="fa-solid fa-money-bill"></i> {{ $hotel->price }} .VND</p>
                                        <p style=" color:#0b2245;"><i class="fa-solid fa-location-dot"></i> {{ $hotel->address }}</p>
                                        <a href="/hotel_detail/{{ $hotel->id }}" class="btn btn-orange btn-lg">Chi tiết </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar">

                    <div class="side-bar-block filter-block" style="background-color: #ffe493">
                        <h3>Tìm kiếm </h3>
                        <p>Tìm kiếm khách sạn phù hợp mà bạn muốn</p>
    
                        
                        <form action="/search_hotel" method="GET">
                            <div class="panel panel-default">
                                <div class="form-group left-icon">
                                    <input type="text" class="form-control" id="searchHotel" name="searchHotel" placeholder="Tên khách sạn - Địa điểm"/>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-orange btn-lg" value="Tìm kiếm"/>
                            @csrf
                        </form>
    
                    </div>

                    @include('users.banner3')
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection