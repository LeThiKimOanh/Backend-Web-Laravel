@extends('admin.main')
@section('content')
    
<div class="row">

    <div class="col-md-1">
        
    </div>  

    <div class="col-md-4">
        
        <div class="card-body box-profile">

            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="/picture/user/{{ $user->avatar_image }}"
                   alt="User profile picture">
            </div>
    
            <h3 class="profile-username text-center">{{ $user->name }}</h3>
    
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Birthday</b> <a class="float-right">{{ $user->birthday }}</a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="float-right">{{ $user->email }}</a>
              </li>
              <li class="list-group-item">
                <b>Điện thoại</b> <a class="float-right">{{ $user->phone }}</a>
              </li>
              <li class="list-group-item">
                <b>Địa chỉ</b> <a class="float-right">{{ $user->address }}</a>
              </li>
              <li class="list-group-item">
                <b>Tham gia </b> <a class="float-right">{{ $user->created_at }}</a>
              </li>
            </ul>
    
        </div>

    </div>

    <div class="col-md-2">
        
    </div>

    <div class="col-md-4">
        
        <div class="card-body box-profile">

            <div class="text-center">
                <h3>Các tour gần đây</h3>
                <ul class="list-group list-group-unbordered mb-3">
                  @foreach ($order as $item)
                  <li class="list-group-item">
                    <p>{{ $item->tours->name }}</p>
                  </li>
                  @endforeach
                </ul>
            </div>
    
        </div>

    </div>

    <div class="col-md-1">
        
    </div>
    
</div>

@endsection



