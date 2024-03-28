@extends('admin.main')

@section('content')
    
<form class="card-body" method="post" action="/admin/hotel/add" enctype="multipart/form-data">

    <div class="form-group">
        <label for="namehotel">Tên khách sạn</label>
        <input type="text" id="namehotel" class="form-control" name="name" required>
    </div>
    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <input type="text" id="address" class="form-control" name="address" required>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label for="price">Mức giá</label>
            <input type="number" id="price" class="form-control" name="price" step="any" required>
        </div>
        <div class="col-md-4">
            <label for="poster">Hình ảnh <span style="color: chartreuse">Chọn 5 ảnh</span></label>
            <input type="file" id="poster" class="form-control" name="image[]" accept="image/*" multiple required>
        </div>
        <div class="col-md-4">
            <label for="rating">Số sao</label>
            <input type="number" id="rating" class="form-control" name="rating"required>
        </div>
    </div>
    <div class="form-group">
        <label for="map">Gán map</label>
        <input type="text" id="map" class="form-control" name="map" required>
    </div>
    <div class="form-group">
        <label for="summernote1">Mô tả</label>
        <textarea id="summernote1" name="status"></textarea>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <a href="/admin/hotel" class="btn btn-secondary">Quay lại</a>
            <input type="submit" value="Thêm khách sạn" class="btn btn-success float-right">
        </div>
    </div>

    @csrf

</form>

@endsection

