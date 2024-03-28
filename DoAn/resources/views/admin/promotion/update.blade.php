@extends('admin.main')
@section('content')
    
<form class="card-body" method="post" action="/admin/promotion/update/{{ $promotion->id }}" enctype="multipart/form-data">

    <div class="form-group">
        <label>ID giảm giá : {{ $promotion->id }}</label>
    </div>
    <div class="form-group row">
        <div class="col-md-9">
            <label for="namePromotion">Sự kiện</label>
            <input type="text" id="namePromotion" class="form-control" name="name" required value="{{ $promotion->name }}">
        </div>
        <div class="col-md-3">
            <label for="discountPromotion">Giảm giá(%)</label>
            <input type="number" id="discountPromotion" class="form-control" name="discount" required value="{{ $promotion->discount }}">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="startPromotion">Ngày bắt đầu</label>
            <input type="datetime-local" id="startPromotion" class="form-control" name="start_date" required value="{{ $promotion->start_date }}">
        </div>
        <div class="col-md-6">
            <label for="endPromotion">Ngày kết thúc</label>
            <input type="datetime-local" id="endPromotion" class="form-control" name="end_date" required value="{{ $promotion->end_date }}">
        </div>
    </div>

    <div class="form-group">
        <label for="fileInput_">Poster</label>
        <img class="table-avatar m-2" src="/picture/poster_promotion/{{ $promotion->poster_image }}" style="width: 65px;height: 65px;border-radius: 50%;object-fit: cover" id="selectedImage_" alt="Promotion_image">
        <input type="file" class="form-control" name="image" accept="image/*"required id="fileInput_" onchange="changeImage('')">
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <a href="/admin/promotion" class="btn btn-secondary">Quay lại</a>
            <input type="submit" value="Cập nhật giảm giá" class="btn btn-success float-right">
        </div>
    </div>

    @csrf

</form>

@endsection