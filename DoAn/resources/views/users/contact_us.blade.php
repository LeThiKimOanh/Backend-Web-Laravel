@extends('users.main')

@section('content')
<section class="innerpage-wrapper">
    <div id="contact-us" class="innerpage-section-padding">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 col-md-5 no-pd-r">
                    <div class="custom-form contact-form" style="background-color: #f0f9c7;">
                        <h3 style="color:#d36d21">Liên hệ </h3>
                        <p>Trang Liên Hệ của chúng tôi là cầu nối để bạn có thể dễ dàng kết nối và gửi thông điệp đến chúng tôi. Chúng tôi luôn sẵn lòng lắng nghe và hỗ trợ bạn trong mọi thắc mắc, ý kiến hoặc yêu cầu của bạn.</p>
                        <form>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name" required />
                                <span><i class="fa fa-user"></i></span>
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" required />
                                <span><i class="fa fa-envelope"></i></span>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject" required />
                                <span><i class="fa fa-info-circle"></i></span>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" rows="4" placeholder="Your Message"></textarea>
                                <span><i class="fa fa-pencil"></i></span>
                            </div>

                            <button class="btn btn-orange btn-block">Send</button>
                        </form>
                    </div><!-- end contact-form -->
                </div><!-- end columns -->

                <div class="col-sm-12 col-md-7 no-pd-l">
                    <div class="map">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.7332975516197!2d108.24978007489275!3d15.975298241946092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2sus!4v1700667822486!5m2!1svi!2sus" allowfullscreen></iframe>

                    </div><!-- end map -->
                </div><!-- end columns -->

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end contact-us -->
</section><!-- end innerpage-wrapper -->

@endsection