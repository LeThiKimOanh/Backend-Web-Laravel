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
                <th style="width: 25%" class="text-center">
                    Nick comment
                </th>
                <th style="width: 35%" class="text-center">
                    Nội dung
                </th>
                <th style="width: 25%" class="text-center">
                    Thời gian
                </th>
                <th style="width: 14%">
                </th>
            </tr>
        </thead>
        <tbody>
        
            @php
                $stt = 0;
            @endphp
            @foreach ($comment as $item)
            @php
                $stt++;
            @endphp
                 <tr>
                    <td class="text-center">
                        {{ $stt  }}
                    </td>
                    <td class="text-center">
                        <a href="/admin/user/profile/{{ $item ->users->id }}">{{ $item ->users->name  }}</a>
                    </td>
                    <td class="text-center">
                        {{ $item->comment_text  }}
                    </td>
                    <td class="text-center">
                        {{ $item ->comment_at }}
                    </td>
                    <td class="project-actions justify-content-between">
                        <a class="btn btn-danger btn-sm" href="" 
                            onclick="removeComment({{ $item ->id }},'/admin/comment/delete')"
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

</div>

@endsection
