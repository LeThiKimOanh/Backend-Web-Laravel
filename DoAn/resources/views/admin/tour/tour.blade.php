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
                <th style="width: 21%" class="text-center">
                    Tên tour
                </th>
                <th style="width: 16%" class="text-center">
                    Số lượng
                </th>
                <th style="width: 16%" class="text-center">
                    Giá
                </th>
                <th style="width: 16%" class="text-center">
                    Loại hình
                </th>
                <th style="width: 16%" class="text-center">
                    Ngày tạo
                </th>
                <th style="width: 14%">
                </th>
            </tr>
        </thead>

        <tbody>
            @php
            $stt = 0;
            @endphp
    
        @foreach ($tour as $item)
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
                    {{ $item ->number_of_people  }}
                </td>
                <td class="text-center">
                    {{ $item ->price_adult  }} VND
                </td>
                <td class="text-center">
                    {{ $item->tourCategories->name  }}
                </td>
                <td class="text-center">
                    {{ $item->created_at  }}
                </td>
                <td class="project-actions justify-content-between">
                    <a class="btn btn-info btn-sm" href="/admin/tour/update/{{ $item ->id }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Sửa
                    </a>
                    <a class="btn btn-danger btn-sm" href="" 
                        onclick="removeTour({{ $item ->id }},'/admin/tour/delete')"
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
            <a class="btn btn-primary" href="/admin/tour/add">
                <i class="fas fa-folder"></i>
                Tạo tour mới
            </a>
        </div>
    </div>

</div>

@endsection