@php
    $user = session()->get('user');
@endphp
@extends('users.profile.profile')

@section('content_profile')

<div class="col-xs-12 col-sm-12 col-md-12 dashboard-content booking-trips">
    <h2 class="dash-content-title">Tour đã đặt</h2>
    <div class="dashboard-listing booking-listing">
        <div class="dash-listing-heading">
            <div class="custom-radio">
                <input type="radio" id="radio04" name="radio" />
                <label for="radio04"><span></span>Tour</label>
            </div><!-- end custom-radio -->
            @include('users.alert')
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>

                    @foreach ($listOrder as $order)
                    <tr>
                        <td class="dash-list-icon booking-list-date"><div class="b-date"><h3>18</h3><p>October</p></div></td>
                        <td class="dash-list-text booking-list-detail">
                            <h3>{{ $order->tours->name }}</h3>
                            <ul class="list-unstyled booking-info">
                                <li style="color: black"><span style="color: red">Ngày đặt: </span>{{ $order->order_at }}</li>
                                <li style="color: black"><span style="color: red">Chi tiết:</span> Người lớn: {{ $order->number_of_adult }} - Trẻ em: {{ $order->number_of_child }}</li>
                                <li style="color: black"><span style="color: red">Khách hàng:</span>{{ $order->name_tourist }}<span class="line">|</span>{{ $order->email_tourist }}<span class="line">|</span>{{ $order->phone_tourist }}</li>
                                <li style="color: black"><span style="color: red">Thành tiền: </span>{{ $order->total }} VND</li>
                            </ul>
                        </td>
                        <td class="dash-list-icon">
                            @if ($order->type_confim_id==1 || $order->type_confim_id==2)
                            <form action="/vnpay_payment/{{ $order->id }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success" style="width: 100%;" name="redirect">Thanh toán</button>
                            </form>
                            @endif
                            @if ($order->type_confim_id==1)
                            <a class="btn btn-danger" style="width: 100%;margin-top: 10px" onclick="orderCancer('/order_cancer/{{ $order->id }}')" >Hủy đơn</a>
                            @endif
                            <span class="{{ $order->typeConfims->color }} " style="width: 100%; margin-top: 10px">{{ $order->typeConfims->name  }}</span>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div><!-- end table-responsive -->
    </div><!-- end booking-listings -->
    
</div><!-- end columns -->
@endsection