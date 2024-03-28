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
                <th style="width: 12%" class="text-center">
                    Tên 
                </th>
                <th style="width: 12%" class="text-center">
                    Email
                </th>
                <th style="width: 11%" class="text-center">
                    Điện thoại
                </th>
                <th style="width: 11%" class="text-center">
                    Ngày sinh
                </th>
                <th style="width: 15%" class="text-center">
                    Địa chỉ
                </th>
                <th style="width: 12%" class="text-center">
                    Language job
                </th>
                <th style="width: 10%" class="text-center">
                    Avatar
                </th>
                <th style="width: 16%">
                </th>
            </tr>
        </thead>
        <tbody>

            @php
                $stt = 0;
            @endphp
        
            @foreach ($tourGuide as $item)
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
                        {{ $item ->email  }}
                    </td>
                    <td class="text-center">
                        {{ $item ->phone  }}
                    </td>
                    <td class="text-center">
                        {{ $item->birthday  }}
                    </td>
                    <td class="text-center">
                        {{ $item->address  }}
                    </td>
                    <td class="text-center">
                        {{ $item->language_job  }}
                    </td>
                    <td class="text-center">
                        <img alt="Avatar" class="table-avatar" src="/picture/tour_guide/{{ $item ->avatar_image  }}" style="width: 60px;height: 60px;border-radius: 50%;object-fit: cover">
                    </td>
                    <td class="project-actions justify-content-between">
                        <a class="btn btn-info btn-sm mr-2" href="/admin/tour_guide/update/{{ $item ->id }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Sửa
                        </a>
                        <a class="btn btn-danger btn-sm" href="" 
                            onclick="removeTourGuide({{ $item ->id }},'/admin/tour_guide/delete')"
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
            <a class="btn btn-primary" href="/admin/tour_guide/add">
                <i class="fas fa-folder"></i>
                Thêm hướng dẫn viên
            </a>
        </div>
    </div>

</div>

@endsection

{{-- /admin/slider/delete/{{ $item ->id }} --}}