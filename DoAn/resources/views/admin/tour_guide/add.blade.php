@extends('admin.main')
@section('content')
    
<form class="card-body" method="post" action="/admin/tour_guide/add" enctype="multipart/form-data">

    <div class="form-group">
        <label for="name">Họ và tên</label>
        <input type="text" id="name" class="form-control" name="name" required>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" name="email" required>
        </div>
        <div class="col-md-6">
            <label for="phone">Số điện thoại</label>
            <input type="tel" id="phone" class="form-control" name="phone" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="birthday">Năm sinh</label>
            <input type="date" id="birthday" class="form-control" name="birthday" required>
        </div>
        <div class="col-md-6">
            <label for="address">Địa chỉ</label>
            <input type="text" id="address" class="form-control" name="address" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="language_job">Ngôn ngữ làm việc</label>
        <input type="text" id="language_job" class="form-control" name="language_job" required>
        </div>
        <div class="col-md-6">
            <label for="avatar">Avatar</label>
        <input type="file" id="avatar" class="form-control" name="image" accept="image/*" required>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <a href="/admin/tour_guide" class="btn btn-secondary">Quay lại</a>
            <input type="submit" value="Tạo mới" class="btn btn-success float-right">
        </div>
    </div>

    @csrf

</form>

@endsection