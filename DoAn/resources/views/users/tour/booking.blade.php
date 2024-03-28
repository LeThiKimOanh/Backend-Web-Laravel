<?php
    $priceAdult = $tour->price_adult;
    $priceChild = $tour->price_child;
?>

<div class="side-bar-block booking-form-block">
    <h3 class="selected-price"> <span style="font-size: 28px; font-family:'Times New Roman', Times, serif; color:#473a15">Đặt Tour <i class="fa-solid fa-check"></i></span></h3>

    <div class="booking-form">
        <p>Tìm kiếm ước mơ trải nghiệm</p>

        <form action="/booking" method="post">

            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Họ và tên" required />
            </div>

            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required />
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" required />
            </div>

            @if ($priceChild==0)

                <div class="form-group">
                    <input type="number" class="form-control" name="number_adult" id="number_adult" placeholder="Số lượng" required />
                </div>
                <input type="number" name="number_child" id="number_child" hidden value="0" />

                <input type="text" class="form-control" id="total" name="total" placeholder="Tổng tiền" readonly />

                <input type="text" name="tour_id" hidden value="{{ $tour->id }}" />

            @else

            <div class="row">

                <div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                    <div class="form-group">
                        <input type="number" class="form-control" name="number_adult" id="number_adult" placeholder="Người lớn" required />
                    </div>
                </div>

                <div class="col-sm-6 col-md-12 col-lg-6 no-sp-l">
                    <div class="form-group">
                        <input type="number" class="form-control" name="number_child" id="number_child" placeholder="Trẻ em" required />
                    </div>
                </div>

            </div>

            <input type="text" name="tour_id" hidden value="{{ $tour->id }}" />

            <input type="text" class="form-control" id="total" name="total" placeholder="Tổng tiền" readonly />

            @endif

            <div class="checkbox custom-check">
                <input type="checkbox" id="check01" name="checkbox" />
                <label for="check01"><span><i class="fa fa-check"></i></span>Nhấp vào đây nếu bạn đồng ý <a href="#">Điều khoản và Điều kiện </a> của chúng tôi!</label>
            </div>

            <button class="btn btn-block btn-orange" type="submit">Đặt Tour </button>
            
            @csrf

        </form>
    </div>
</div><!-- end side-bar-block -->

            
<script>
    
    document.getElementById('number_adult').addEventListener('input', updateTotal);
    document.getElementById('number_child').addEventListener('input', updateTotal);

    var priceAdult = {{ $priceAdult }}; 
    var priceChild = {{ $priceChild }}; 
   
    function updateTotal() {
        var numberAdult = parseInt(document.getElementById('number_adult').value) || 0;
        var numberChild = parseInt(document.getElementById('number_child').value) || 0;

        if(numberChild===null){
            numberChild=0;
        }


        var total = (numberAdult * priceAdult) + (numberChild * priceChild); // Tính tổng tiền dựa trên giá từ cơ sở dữ liệu

        document.getElementById('total').value = total; // Hiển thị tổng tiền có định dạng tiền tệ
    }

</script>