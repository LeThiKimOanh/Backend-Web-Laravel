<div class="col-xs-12 col-sm-2 col-md-2 dashboard-nav">
    <ul class="nav nav-tabs nav-stacked text-center">
        <li class="@if(isset($active_profile)&&$active_profile==1) active @endif"><a href="/user_profile"><span><i class="fa fa-user"></i></span>Thông tin cá nhân</a></li>
        <li class="@if(isset($active_profile)&&$active_profile==2) active @endif"><a href="/tour_booked"><span><i class="fa fa-briefcase"></i></span>Tour đã đặt</a></li>        
    </ul>
</div><!-- end columns -->