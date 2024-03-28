@extends('users.main')

@section('content')

<section class="innerpage-wrapper">

    <div id="dashboard" class="innerpage-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <div class="dashboard-heading">
                        <h2>Travel <span>Profile</span></h2>
                        <p style="color:#2a82a5;"> Chào {{ session()->get('user')->name }} ! Chúc bạn có những trải nghiệm tuyệt vời khi sử dụng website của chúng tôi</p>;
                    </div>

                    <div class="dashboard-wrapper">
                        <div class="row">

                            @include('users.profile.sidebar')

                            <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">

                                @yield('content_profile')

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection