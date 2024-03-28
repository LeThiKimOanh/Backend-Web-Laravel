@extends('admin.main')

@section('content')
    
{{-- <form action="">
    <div class="form-group m-4">
        <div class="input-group input-group-lg">
            <input type="search" class="form-control form-control-sm" placeholder="Tìm kiếm khách sạn">
            <div class="input-group-append">
                <button type="submit" class="btn btn-lg btn-default">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</form> --}}

<div class="card-body p-0">

    @include('admin.alert')

    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 1%" class="text-center">
                    STT
                </th>
                <th style="width: 15%" class="text-center">
                    Tên khách sạn
                </th>
                <th style="width: 10%" class="text-center">
                    Giá
                </th>
                <th style="width: 15%" class="text-center">
                    Địa chỉ
                </th>
                <th style="width: 35%" class="text-center">
                    Mô tả
                </th>
                <th style="width: 10%" class="text-center">
                    Hình ảnh
                </th>
                <th style="width: 14%">
                </th>
            </tr>
        </thead>
        <tbody>
        
            @php
                $stt = 0;
            @endphp
            @foreach ($hotel as $item)
            @php
                $stt++;
            @endphp
                 <tr>
                    <td class="text-center">
                        {{ $stt  }}
                    </td>
                    <td class="text-center">
                        {{ $item ->name  }}
                    </td>
                    <td class="text-center">
                        {{ $item->price  }} VND
                    </td>
                    <td class="text-center">
                        {{ $item ->address }}
                    </td>
                    <td class="text-center text-truncate" style="max-height: 100px;max-width: 100px; overflow: hidden;">
                        {{ $item ->status  }}
                    </td>
                    <td class="text-center">
                        <img alt="Avatar" class="table-avatar" src="/picture/hotel/{{ $item ->hotelImages->first()->image_url }}" style="width: 65px;height: 65px;border-radius: 50%;object-fit: cover">
                    </td>
                    <td class="project-actions justify-content-between">
                        <a class="btn btn-info btn-sm mr-2" href="/admin/hotel/update/{{ $item ->id }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Sửa
                        </a>
                        <a class="btn btn-danger btn-sm" href="" 
                            onclick="removeHotel({{ $item ->id }},'/admin/hotel/delete')"
                        >
                            <i class="fas fa-trash">
                            </i>
                            Xóa
                        </a>
                    </td>
                </tr>
                 
            @endforeach

        </tbody>
    </table>

    <div class="row">
        <div class="col-12 p-4">
            <a class="btn btn-primary" href="/admin/hotel/add">
                <i class="fas fa-folder"></i>
                Thêm khách sạn
            </a>
        </div>
    </div>

</div>

@endsection
