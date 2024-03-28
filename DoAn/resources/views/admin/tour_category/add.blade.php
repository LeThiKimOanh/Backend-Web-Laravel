@extends('admin.main')
@section('content')
    
<form class="card-body" method="post" action="/admin/tour_category/add" enctype="multipart/form-data">

    <div class="form-group">
        <label for="nameTourCategory">Tên danh mục</label>
        <input type="text" id="nameTourCategory" class="form-control" name="name" required>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <a href="/admin/tour_category" class="btn btn-secondary">Quay lại</a>
            <input type="submit" value="Tạo danh mục" class="btn btn-success float-right">
        </div>
    </div>

    @csrf

</form>

@endsection