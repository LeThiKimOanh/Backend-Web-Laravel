@extends('admin.main')
@section('content')
    
<form class="card-body" method="post" action="/admin/hotel/update/{{ $hotel->id }}" enctype="multipart/form-data">

    <div class="form-group">
        <label for="namehotel">Tên khách sạn</label>
        <input type="text" id="namehotel" class="form-control" name="name" value="{{ $hotel->name }}" required>
    </div>
    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="text" id="address" class="form-control" name="address" value="{{ $hotel->address }}" required>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="price">Mức giá</label>
            <input type="number" id="price" class="form-control" name="price" step="any" required value="{{ $hotel->price }}" required>
        </div>
        <div class="col-md-6">
            <label for="rating">Số sao</label>
            <input type="number" id="rating" class="form-control" name="rating" value="{{ $hotel->rating }}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="map">Map</label>
        <input type="text" id="map" class="form-control" name="map" value="{{ $hotel->map }}" required>
    </div>
    <div class="form-group">
        <label for="summernote1">Mô tả</label>
        <textarea id="summernote1" name="status">{{ $hotel->status }}</textarea>
    </div>

    <div class="form-group">
        @php
            $stt=0;
        @endphp
        <label for="fileInput_{{ $stt }}">Hình ảnh:</label>
        @foreach ($hotel->hotelImages as $image)
        @php
            $stt++;
        @endphp
        <img class="table-avatar m-2" src="/picture/hotel/{{ $image->image_url }}" style="width: 65px;height: 65px;border-radius: 50%;object-fit: cover" id="selectedImage_{{ $stt }}" alt="Hotel_image">
        @endforeach
        <input type="file" class="form-control" name="image[]" accept="image/*" id="fileInput_{{ $stt }}" onchange="changeImage('{{ $stt }}')" multiple>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <a href="/admin/hotel" class="btn btn-secondary">Quay lại</a>
            <input type="submit" value="Cập nhật" class="btn btn-success float-right">
        </div>
    </div>

    @csrf

</form>

@endsection

