@extends('admin.main')

@section('content')
    
<div class="card-body p-0">

    @include('admin.alert')
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 1%" class="text-center">
                    STT
                </th>
                <th style="width: 15%" class="text-center">
                    Sự kiện
                </th>
                <th style="width: 15%" class="text-center">
                    Giảm giá
                </th>
                <th style="width: 15%" class="text-center">
                    Bắt đầu
                </th>
                <th style="width: 15%" class="text-center">
                    Kết thúc
                </th>
                <th style="width: 15%" class="text-center">
                    Poster
                </th>
                <th style="width: 10%" class="text-center">
                    Hiển thị
                </th>
                <th style="width: 14%">
                </th>
            </tr>
        </thead>
        <tbody>
        
            @php
                $stt = 0;
            @endphp
            @foreach ($promotion as $item)
            
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
                    <td class="project-state text-center">
                        <span class="badge badge-success">{{ $item->discount  }}%</span>
                    </td>
                    <td class="text-center">
                        {{ $item ->start_date  }}
                    </td>
                    <td class="text-center">
                        {{ $item ->end_date  }}
                    </td>
                    <td class="text-center">
                        <img alt="Avatar" class="table-avatar" src="/picture/poster_promotion/{{ $item ->poster_image  }}" style="width: 50px;height: 75px;border-radius: 5%;object-fit: cover">
                    </td>
                    <td class="text-center">
                        <input type="checkbox" name="view_control" id="view_control{{ $item ->id }}" onchange="viewPromotion({{ $item ->id }},'/admin/promotion/view')" {{ $item->view_control == 1 ? "checked" : ""}} >
                    </td>
                    <td class="project-actions justify-content-between">
                        <a class="btn btn-info btn-sm mr-2" href="/admin/promotion/update/{{ $item ->id }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Sửa
                        </a>
                        <a class="btn btn-danger btn-sm" href="" 
                            onclick="removePromotion({{ $item ->id }},'/admin/promotion/delete')"
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
            <a class="btn btn-primary" href="/admin/promotion/add">
                <i class="fas fa-folder"></i>
                Thêm giảm giá
            </a>
        </div>
    </div>

</div>

@endsection