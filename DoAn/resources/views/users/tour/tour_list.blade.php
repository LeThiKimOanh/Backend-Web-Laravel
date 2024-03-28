@extends('users.main')

@section('content')

<div id="tour-grid" class="innerpage-section-padding">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-3 side-bar left-side-bar">

                <div class="side-bar-block filter-block" style="background-color: #ffe493">
                    <h3>Tìm kiếm </h3>
                    <p>Khám phá và Trải nghiệm</p>

                    <form action="/search_tour" action="get">
                        <div class="panel panel-default">
                            <div class="form-group left-icon">
                                <input type="text" class="form-control" id="searchTour" name="searchTour" placeholder="Tên tour - Địa điểm - Giá cả"/>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-orange btn-lg" value="Tìm kiếm"/>
                        @csrf
                    </form>

                </div>

                @include('users.banner3')
            </div>


            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side" >

                @foreach ($tourList as $tour)
                <div class="list-block main-block t-list-block">
                    <div class="list-content">
                        <div class="main-img list-img t-list-img">
                            <a href="/tour_detail/{{ $tour->id }}">
                                <img src="/picture/tour/{{ $tour->tourImages->first()->image_url }}" class="img-responsive" alt="tour-img" />
                            </a>
                            <div class="main-mask">
                                <ul class="list-unstyled list-inline offer-price-1">
                                    <li class="price">{{ $tour->price_adult }}<span class="divider">|</span><span class="pkg"><i class="fa-solid fa-clock"></i> 
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
                            <h6 class="block-title"><a href="/tour_detail/{{ $tour->id }}" style="color:#331e0c; font-weight:600">{{ $tour->name }}</a></h6>
                            <br>
                            <p class="block-minor" style="color:#a77b2b"><i class="fa-solid fa-calendar-days"></i> Click để xem chi tiết</p>
                            <p class="block-minor" style="color:orange"><i class="fa-solid fa-location-dot"></i> {{ $tour->rating }} sao</p>
                            <p class="block-minor" style="color:#649156"><i class="fa-solid fa-person-walking-luggage"></i> {{ $tour->number_of_people }} Người</p>

                            <p style="color:#918d7b">
                               
                            </p>
                            <a href="/tour_detail/{{ $tour->id }}" class="btn btn-orange btn-lg">Chi tiết</a>
                        </div><!-- end t-list-info -->
                    </div><!-- end list-content -->
                </div><!-- end t-list-block -->
                @endforeach
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end tour-grid -->

@endsection