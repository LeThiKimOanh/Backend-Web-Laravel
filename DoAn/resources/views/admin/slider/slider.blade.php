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
                    Tên slider
                </th>
                <th style="width: 15%" class="text-center">
                    Chủ đề
                </th>
                <th style="width: 10%" class="text-center">
                    Hình ảnh
                </th>
                <th style="width: 12%" class="text-center">
                    Ngày tạo
                </th>
                <th style="width: 12%" class="text-center">
                    Đăng bởi
                </th>
                <th style="width: 10%" class="text-center">
                    Hiển thị
                </th>
                <th style="width: 15%">
                </th>
            </tr>
        </thead>
        <tbody>

            @php
                $stt = 0;
            @endphp
        
            @foreach ($slider as $item)
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
                        {{ $item ->status  }}
                    </td>
                    <td class="text-center">
                        <img alt="Avatar" class="table-avatar" src="/picture/slider/{{ $item ->image  }}" style="width: 60px;height: 60px;border-radius: 50%;object-fit: cover">
                    </td>
                    <td class="project_progress text-center">
                        {{ $item ->created_at  }}
                    </td>
                    <td class="project-state text-center">
                        <span class="badge badge-success p-1">{{ $item->user->name  }}</span>
                    </td>
                    <td class="text-center">
                        <input type="checkbox" name="view_control" id="view_control{{ $item ->id }}" onchange="view({{ $item ->id }},'/admin/slider/view')" {{ $item->view_control == 1 ? "checked" : ""}}>
                    </td>
                    <td class="project-actions justify-content-between">
                        <a class="btn btn-info btn-sm mr-2" href="/admin/slider/update/{{ $item ->id }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Sửa
                        </a>
                        <a class="btn btn-danger btn-sm" href="" 
                            onclick="removeSlider({{ $item ->id }},'/admin/slider/delete')"
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
            <a class="btn btn-primary" href="/admin/slider/add">
                <i class="fas fa-folder"></i>
                New slider
            </a>
        </div>
    </div>

</div>

@endsection

{{-- /admin/slider/delete/{{ $item ->id }} --}}