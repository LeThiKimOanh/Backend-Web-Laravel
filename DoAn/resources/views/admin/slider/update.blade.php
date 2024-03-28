@extends('admin.main')

@section('content')
    
<form class="card-body" method="post" action="/admin/slider/update/{{ $slider->id }}" enctype="multipart/form-data">

    <div class="form-group">
        <label>ID Slide : {{ $slider->id }}</label>
    </div>

    <div class="form-group">
        <label for="nameSlider">Tên Slide</label>
        <input type="text" id="nameSlider" class="form-control" name="name" value="{{ $slider->name }}" required>
    </div>

    <div class="form-group">
        <label for="statusSlider">Chủ đề</label>
        <input type="text" id="statusSlider" class="form-control" name="status" value="{{ $slider->status }}">
    </div>

    <div class="form-group">
        <label for="fileInput_">Cập nhật ảnh: </label>
        <img class="table-avatar m-2" src="/picture/slider/{{ $slider->image }}" style="width: 65px;height: 65px;border-radius: 50%;object-fit: cover" id="selectedImage_" alt="Slider">
        <input type="file" class="form-control" name="image" accept="image/*"required id="fileInput_" onchange="changeImage('')">
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <a href="/admin/slider" class="btn btn-secondary">Quay lại</a>
            <input type="submit" value="Cập nhật" class="btn btn-success float-right">
        </div>
    </div>

    @csrf

</form>

@endsection