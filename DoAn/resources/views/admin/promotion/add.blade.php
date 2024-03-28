@extends('admin.main')
@section('content')
    
<form class="card-body" method="post" action="/admin/promotion/add" enctype="multipart/form-data">

    <div class="form-group row">
        <div class="col-md-9">
            <label for="namePromotion">Sự kiện</label>
            <input type="text" id="namePromotion" class="form-control" name="name" required>
        </div>
        <div class="col-md-3">
            <label for="discountPromotion">Giảm giá(%)</label>
            <input type="number" id="discountPromotion" class="form-control" name="discount" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="startPromotion">Ngày bắt đầu</label>
            <input type="datetime-local" id="startPromotion" class="form-control" name="start_date" required>
        </div>
        <div class="col-md-6">
            <label for="endPromotion">Ngày kết thúc</label>
            <input type="datetime-local" id="endPromotion" class="form-control" name="end_date" required>
        </div>
    </div>
    
    <div class="form-group">
        <label for="poster">Poster</label>
        <input type="file" id="poster" class="form-control" name="image" accept="image/*" required>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <a href="/admin/promotion" class="btn btn-secondary">Quay lại</a>
            <input type="submit" value="Tạo giảm giá" class="btn btn-success float-right">
        </div>
    </div>

    @csrf

</form>

@endsection