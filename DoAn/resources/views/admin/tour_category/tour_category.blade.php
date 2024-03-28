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
                <th style="width: 42%" class="text-center">
                    Tên danh mục
                </th>
                <th style="width: 42%" class="text-center">
                    Ngày tạo
                </th>
                <th style="width: 15%">
                </th>
            </tr>
        </thead>
        <tbody>
        
            @php
                $stt = 0;
            @endphp

            @foreach ($tourCategory as $item)

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
                    <td class="project_progress text-center">
                        {{ $item ->created_at  }}
                    </td>
                    <td class="project-actions justify-content-between">
                        <a class="btn btn-info btn-sm mr-2" href="/admin/tour_category/update/{{ $item ->id }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Sửa
                        </a>
                        <a class="btn btn-danger btn-sm" href="" 
                            onclick="removeTourCategory({{ $item ->id }},'/admin/tour_category/delete')"
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
            <a class="btn btn-primary" href="/admin/tour_category/add">
                <i class="fas fa-folder"></i>
                Thêm danh mục tour
            </a>
        </div>
    </div>

</div>

@endsection