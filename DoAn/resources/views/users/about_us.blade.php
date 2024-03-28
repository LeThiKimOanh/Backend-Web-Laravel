@extends('users.main')

@section('content')

<section class="innerpage-wrapper">

    <div id="about-us">

        <div id="about-content" class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="flex-content">

                            <div class="flex-content-img about-img">
                                <img src="/users_template/images/otbwebsite.png" class="img-responsive" alt="about-img" />
                            </div>

                            <div class="about-text">
                                <div class="about-detail">
                                    <h2>About Star Travels</h2>
                                    <p>OTBTRAVELS là nền tảng đặt tour và khách sạn, đồng thời cung cấp blog du lịch đầy đủ thông tin hữu ích. Chúng tôi cam kết mang đến trải nghiệm du lịch thuận tiện và thông tin chất lượng để mọi chuyến đi của bạn trở nên đáng nhớ.</p>
                                    <p>Hãy để OTBTRAVELS làm đối tác tin cậy trong mọi hành trình khám phá của bạn!</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="team" class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-heading">
                            <h2>Our Team</h2>
                            <hr class="heading-line" />
                        </div>

                        <div class="owl-carousel owl-theme" id="owl-team" style="margin-left: 270px;">

                            <div class="item">
                                <div class="member-block">
                                    <div class="member-img">
                                        <img src="/users_template/images/m6.jpg" class="img-responsive img-circle" alt="member-img" />
                                        <ul class="list-unstyled list-inline contact-links">
                                            <li><a href="https://www.facebook.com/profile.php?id=100034812583951"><span><i class="fa-brands fa-facebook"></i></span></a></li>
                                            <li><a href="#"><span><i class="fa-brands fa-twitter"></i></span></a></li>
                                            <li><a href="#"><span><i class="fa-brands fa-linkedin"></i></span></a></li>
                                        </ul>
                                    </div>

                                    <div class="member-name">
                                        <h3>Kim Oanh</h3>
                                        <p>Thành viên</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="member-block">
                                    <div class="member-img">
                                        <img src="/users_template/images/TRong.jpg" class="img-responsive img-circle" alt="member-img" />
                                        <ul class="list-unstyled list-inline contact-links">
                                            <li><a href="https://www.facebook.com/profile.php?id=100025189622600"><span><i class="fa-brands fa-facebook"></i></span></a></li>
                                            <li><a href="#"><span><i class="fa-brands fa-twitter"></i></span></a></li>
                                            <li><a href="#"><span><i class="fa-brands fa-linkedin"></i></span></a></li>
                                        </ul>
                                    </div>

                                    <div class="member-name">
                                        <h3>Duy Trọng</h3>
                                        <p>Trưởng nhóm</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection