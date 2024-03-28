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
                <th style="width: 20%" class="text-left">
                    Tour 
                </th>
                <th style="width: 20%" class="text-left">
                    Thông tin liên hệ
                </th>
                <th style="width: 20%" class="text-left">
                    Thông tin chi tiết
                </th>
                <th style="width: 15%" class="text-left">
                    Ghi chú
                </th>
                <th style="width: 12%" class="text-center">
                    Trạng thái
                </th>
                <th style="width: 17%" class="text-center">
                    Hành động
                </th>
            </tr>
        </thead>
        <tbody>

            @php
                $stt = 0;
            @endphp
        
            @foreach ($order as $item)
            @php
                $stt++;
            @endphp
                 <tr>
                    <td class="text-center">
                        {{ $stt  }}
                    </td>
                    <td class="text-left">
                        {{ $item ->tours->name  }}
                    </td>
                    <td class="text-left">
                        Tài khoản: <a href="/admin/user/profile/{{ $item ->users->id  }}">{{ $item ->users->name  }}</a><br>
                        Tên: {{ $item ->name_tourist  }}<br>
                        Số điện thoại: {{ $item ->phone_tourist  }}<br>
                        Email: {{ $item ->email_tourist  }}
                    </td>
                    <td class="text-left">
                        Trẻ em: {{ $item ->number_of_child  }}<br>
                        Người lớn: {{ $item ->number_of_adult  }}<br>
                        Tổng tiền: {{ $item ->total  }} VND
                    </td>
                    <td class="text-left">
                        {{ $item->note  }}
                    </td>
                    <td class="text-center" id="status">
                        <span class="{{ $item->typeConfims->color }}" style="font-size:smaller">{{ $item->typeConfims->name  }}</span>
                    </td>
                    <td class="text-center">
                            <select class="form-control btn btn-success" style="font-size: smaller" name="status" id="status" required onchange="changeAction({{ $item ->id }},this.value,'/admin/order/changeAction')"> 
                                <option value="" disabled selected style="background-color: white">Action</option>
                                <option value="1" style="background-color: white; color: black">Chưa xác nhận</option>
                                <option value="2" style="background-color: white; color: black">Đã xác nhận</option>
                                <option value="3" style="background-color: white; color: black">Đã thanh toán</option>
                                <option value="4" style="background-color: white; color: black">Đã hủy</option>
                            </select>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

</div>

@endsection

{{-- /admin/slider/delete/{{ $item ->id }} --}}