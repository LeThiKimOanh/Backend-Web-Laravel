@extends('admin.main')
@section('content')
    
<form class="card-body" method="post" action="/admin/slider/add" enctype="multipart/form-data">

    <div class="form-group">
        <label for="nameSlider">Tên Slide</label>
        <input type="text" id="nameSlider" class="form-control" name="name" required>
    </div>

    <div class="form-group">
        <label for="statusSlider">Chủ đề</label>
        <input type="text" id="statusSlider" class="form-control" name="status" >
    </div>

    <div class="form-group">
        <label for="fileInput_">Thêm ảnh</label>
        <input type="file" class="form-control" name="image" accept="image/*" required id="fileInput_">
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <a href="/admin/slider" class="btn btn-secondary">Quay lại</a>
            <input type="submit" value="Tạo mới" class="btn btn-success float-right">
        </div>
    </div>

    @csrf

</form>

@endsection