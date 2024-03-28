@extends('admin.main')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Thống kê danh thu</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <td class="text-center">
              <select class="form-control btn btn-success" style="font-size: smaller" name="status" id="status" required onchange="thongke(this.value,'/admin/statistics')"> 
                  <option value="" disabled selected style="background-color: white">Thống kê</option>
                  <option value="1" style="background-color: white; color: black">Theo tuần</option>
                  <option value="2" style="background-color: white; color: black">Theo tháng</option>
                  <option value="3" style="background-color: white; color: black">Theo năm</option>
              </select>
            </td>
          </div>
        </div>
        <h5 class="text-center">
          Tổng doanh thu : 
        @php
            $tong = 0;
            foreach ($list_booked as $item) {
              $tong += $item->total;
            }
            echo $tong;
        @endphp
         .VND
        </h5>
      </div>
      
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Người đặt</th>
              <th>Ngày</th>
              <th>Số lượng</th>
              <th>Thành tiền</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list_booked as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->name_tourist }}</td>
              <td>{{ $item->date }}</td>
              <td>{{ $item->number_of_child + $item->number_of_adult }}</td>
              <td>{{ $item->total }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection
