@php
    $user = session()->get('user');
@endphp
@extends('users.profile.profile')

@section('content_profile')

<div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
    <h2 class="dash-content-title">My Profile</h2>
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Chi tiết thông tin</h4></div>
        @include('users.alert')
        <div class="panel-body">
            <div class="row">

                <div class="col-sm-5 col-md-4 user-img">
                    @if($user->avatar_image!==null)
                        <img src="/picture/user/{{ $user->avatar_image }}" class="img-responsive" alt="user-img" />
                    @else
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/800px-User-avatar.svg.png" class="img-responsive" alt="user-img" />
                    @endif
                </div>
                
                <div class="col-sm-7 col-md-8  user-detail">
                    <ul class="list-unstyled">
                        <li><span>Họ và tên: </span> {{ $user->name }}</li>
                        <li><span>Năm sinh: </span> {{ $user->birthday }}</li>
                        <li><span>Email: </span> {{ $user->email }}</li>
                        <li><span>Số điện thoại: </span> {{ $user->phone }}</li>
                        <li><span>Địa chỉ: </span>{{ $user->address }}</li>
                    </ul>

                    <button class="btn btn-warning" data-toggle="modal" data-target="#edit-profile">Cập nhật thông tin</button>

                </div>
                
                <div class="col-sm-12 user-desc">
                    <h4 style="color: olivedrab"><i class="fa-solid fa-palette" style="font-size: 30px"></i></h4>
                    <p style="color:#149325; font-size: 14px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Sự cố gắng không bao giờ là vô ích, nó là nền tảng cho mọi thành công."
                        Sự cố gắng là yếu tố không thể thiếu trong hành trình đạt được mục tiêu. Nó không chỉ mang lại kết quả tốt đẹp mà còn là điều kiện tiên quyết cho sự thành công. Khi chúng ta cố gắng hết mình, dù kết quả có như
                        mong đợi hay không, chính quá trình đó cũng mang lại kinh nghiệm, sự học hỏi và sức mạnh để vươn lên.</p>

                </div>
            </div>
            
        </div>
    </div>
</div>

<div id="edit-profile" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Cập nhật thông tin</h3>
            </div><!-- end modal-header -->
            
            <div class="modal-body">
                <form id="profile_form" method="GET" action="/save_profile/{{ $user->id }}">
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Họ và tên..."/>
                    </div><!-- end form-group -->
                    
                    <div class="form-group">
                        <label>Năm sinh</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->birthday }}" placeholder="Năm sinh..." />
                    </div><!-- end form-group -->
                    
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" placeholder="Số điện thoại..." />
                    </div><!-- end form-group -->
                    
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" placeholder="Địa chỉ..." />
                    </div><!-- end form-group -->

                    <div class="form-group">
                        <label>Avatar</label>
                        <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Avatar..." accept="image/*"/>
                    </div><!-- end form-group -->
                    
                    <button class="btn btn-orange" type="submit">Lưu thông tin</button>

                </form>
            </div><!-- end modal-bpdy -->
        </div><!-- end modal-content -->
    </div><!-- end modal-dialog -->
</div><!-- end edit-profile -->

@endsection