
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="side-bar-block main-block ad-block" style="width: 100%;height: 400px;">
            <div class="main-img ad-img" style="width: 100%;height: 100%;">
                <a href="#" style="width: 100%;height: 100%;">
                    <img src="/picture/poster_promotion/{{ $promotion->first()->poster_image }}" class="img-responsive" alt="car-ad" style="width: 100%;height: 100%;object-fit: cover"/>
                    <div class="ad-mask">
                        <div class="ad-text">
                            <span>Ưu đãi tới</span><br>
                            <span>{{ $promotion->first()->name }}</span><br>
                            <span>{{ $promotion->first()->discount }} %</span>
                        </div><!-- end ad-text -->
                    </div><!-- end columns -->
                </a>
            </div><!-- end ad-img -->
        </div><!-- end side-bar-block -->
    </div><!-- end columns -->


    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="side-bar-block support-block">
            <h3>Cần trợ giúp</h3>
            <p>Liên hệ nhanh với chúng tôi nếu bạn gặp bất kì khó khăn gì nhé! Đội ngũ chúng tôi sẽ hỗ trợ hết mình</p>
            <div class="support-contact">
                <span><i class="fa-solid fa-phone fa-bounce"></i></span>
                <p>+84702 579 654</p>
            </div><!-- end support-contact -->
        </div><!-- end side-bar-block -->
    </div><!-- end columns -->
