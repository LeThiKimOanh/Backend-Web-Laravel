@extends('admin.main')
@section('content')
    
<form class="card-body" method="post" action="/admin/tour_guide/update/{{ $tourGuide->id }}" enctype="multipart/form-data">

    <div class="form-group">
        <label for="id_tour_guide">ID Hướng dẫn viên: {{ $tourGuide->id }}</label>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="name">Họ và tên</label>
            <input type="text" id="name" class="form-control" name="name" required value="{{ $tourGuide->name }}">
        </div>
        <div class="col-md-6">
            <label for="birthday">Năm sinh</label>
            <input type="date" id="birthday" class="form-control" name="birthday" required value="{{ $tourGuide->birthday }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" name="email" required value="{{ $tourGuide->email }}">
        </div>
        <div class="col-md-6">
            <label for="phone">Số điện thoại</label>
            <input type="tel" id="phone" class="form-control" name="phone" required value="{{ $tourGuide->phone }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="address">Địa chỉ</label>
            <input type="text" id="address" class="form-control" name="address" required value="{{ $tourGuide->address }}">
        </div>
        <div class="col-md-6">
            <label for="language_job">Ngôn ngữ làm việc</label>
        <input type="text" id="language_job" class="form-control" name="language_job" required value="{{ $tourGuide->language_job }}">
        </div>
    </div>
    <div class="form-group">
        <label for="fileInput_">Avatar</label>
        <img class="table-avatar m-2" src="/picture/tour_guide/{{ $tourGuide->avatar_image }}" style="width: 65px;height: 65px;border-radius: 50%;object-fit: cover" id="selectedImage_" alt="Tour Guide Image">
        <input type="file" class="form-control" name="image" accept="image/*"required id="fileInput_" onchange="changeImage('')">
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <a href="/admin/tour_guide" class="btn btn-secondary">Quay lại</a>
            <input type="submit" value="Cập nhật" class="btn btn-success float-right">
        </div>
    </div>

    @csrf

</form>

@endsection