@extends('admin.main')

@section('content')
    
<form class="card-body" method="post" action="/admin/tour/add" enctype="multipart/form-data">

    <div class="form-group row">
        <div class="col-md-9">
            <label for="nameTour">Tên tour</label>
            <input type="text" id="nameTour" class="form-control" name="name" required>
        </div>

        <div class="col-md-3">
            <label for="tour_category">Chọn loại hình</label>
                <div class="form-group">
                  <select class="form-control" name="tour_category_id" id="tour_category" required>
                    @foreach ($tour_category as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            <label for="number_of_people">Số lượng</label>
            <input type="number" id="number_of_people" class="form-control" name="number_of_people" required>
        </div>
        <div class="col-md-4">
            <label for="price_child">Giá trẻ em (VND)</label>
            <input type="number" step="any" id="price_child" class="form-control" name="price_child" required>
        </div>
        <div class="col-md-4">
            <label for="price_adult">Giá người lớn (VND)</label>
            <input type="number" step="any" id="price_adult" class="form-control" name="price_adult" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="start_date">Ngày bắt đầu</label>
            <input type="date" id="start_date" class="form-control" name="start_date" required>
        </div>
        <div class="col-md-6">
            <label for="end_date">Ngày kết thúc</label>
            <input type="date" id="end_date" class="form-control" name="end_date" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="departure_address">Địa điểm đón</label>
            <input type="text" id="departure_address" class="form-control" name="departure_address" required>
        </div>
        <div class="col-md-6">
            <label for="destination_address">Địa điểm đến</label>
            <input type="text" id="destination_address" class="form-control" name="destination_address" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="hotel">Khách sạn</label>
                <div class="form-group">
                  <select class="form-control" name="hotel_id" id="hotel" required>
                    @foreach ($hotel as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="tour_guide">Hướng dẫn viên</label>
                <select id="tour_guide" class="select2" multiple="multiple" data-placeholder="Chọn hướng dẫn viên" style="width: 100%;" name="tour_guide_id[]" required>
                    @foreach ($tour_guide as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="image_url">Thêm ảnh</label>
            <input type="file" id="image_url" class="form-control" name="image[]" accept="image/*" required multiple>
        </div>
        <div class="col-md-6">
            <label for="promotion">Thêm giảm giá <sup><span style="color: red">(Nếu có)</span></sup></label>
            <div class="form-group">
                <select class="form-control" name="promotion_id" id="promotion">
                    @foreach ($promotion as $item)
                        <option value="">Chọn giảm giá</option>
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
              </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-8">
            <label for="map">Thêm đường dẫn map</label>
            <input type="text" id="map" class="form-control" name="map" required>
        </div>

        <div class="col-md-4">
            <label for="rating">Số sao</label>
            <input type="number" id="rating" class="form-control" name="rating" required>
        </div>
    </div>

    <div class="form-group">
        <label for="summernote">Lịch trình</label>
        <textarea id="summernote1" name="schedules" required></textarea>
    </div>

    <div class="form-group">
        <label for="summernote">Ghi chú</label>
        <textarea id="summernote2" name="status"></textarea>
    </div>


    <div class="row mt-4">
        <div class="col-12">
            <a href="/admin/tour" class="btn btn-secondary">Quay lại</a>
            <input type="submit" value="Tạo mới tour" class="btn btn-success float-right">
        </div>
    </div>

    @csrf

</form>

@endsection

