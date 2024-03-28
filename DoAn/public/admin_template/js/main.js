$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeSlider(id,url){
    if(confirm('Bạn có chắc chắn xóa!')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url : url,
            success: function(result) {
                if(result.error===false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert('Xóa lỗi , vui lòng thử lại!');
                }
            }
        })
    }
}

function removeTourCategory(id,url){
    if(confirm('Bạn có chắc chắn xóa!')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url : url,
            success: function(result) {
                if(result.error===false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert('Xóa lỗi , vui lòng thử lại!');
                }
            }
        })
    }
}

function removePromotion(id,url){
    if(confirm('Bạn có chắc chắn xóa!')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url : url,
            success: function(result) {
                if(result.error===false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert('Xóa lỗi , vui lòng thử lại!');
                }
            }
        })
    }
}

function removeHotel(id,url){
    if(confirm('Bạn có chắc chắn xóa!')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url : url,
            success: function(result) {
                if(result.error===false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert('Xóa lỗi , vui lòng thử lại!');
                }
            }
        })
    }
}


function removeTourGuide(id,url){
    if(confirm('Bạn có chắc chắn xóa!')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url : url,
            success: function(result) {
                if(result.error===false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert('Xóa lỗi , vui lòng thử lại!');
                }
            }
        })
    }
}

function removeTour(id,url){
    if(confirm('Bạn có chắc chắn xóa!')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url : url,
            success: function(result) {
                if(result.error===false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert('Xóa lỗi , vui lòng thử lại!');
                }
            }
        })
    }
}

function changeAction(id, value, url) {
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id: id,
            status: value
        },
        success: function(response) {
            location.reload();
        },
        error: function(error) {
            console.error(error);
        }
    });
}

function changeImage(stt) {
    var fileInput = document.getElementById('fileInput_' + stt);
    var selectedImage = document.getElementById('selectedImage_' + stt);
    // Kiểm tra xem người dùng đã chọn file hay chưa
    if (fileInput.files.length > 0) {
        var reader = new FileReader();
        // Đọc nội dung của file hình ảnh
        reader.onload = function(e) {
            // Gán nội dung đọc được vào thuộc tính src của thẻ <img>
            selectedImage.src = e.target.result;
        };
        // Đọc file hình ảnh
        reader.readAsDataURL(fileInput.files[0]);
    } else {
        // Ẩn hình ảnh khi không có file được chọn
        selectedImage.style.display = 'none';
    }
}


function view(id, url) {

    var checkbox = document.getElementById("view_control"+id);

    var checkboxValue = checkbox.checked;

    if(checkboxValue){
        $.ajax({
            type: "POST",
            url: url,
            data: {
                id: id,
                check: 1
            },
            success: function(response) {
                location.reload();
            },
            error: function(error) {
                console.error(error);
            }
        });
    }else{
        $.ajax({
            type: "POST",
            url: url,
            data: {
                id: id,
                check: 0
            },
            success: function(response) {
                location.reload();
            },
            error: function(error) {
                console.error(error);
            }
        });
    }
}


function viewPromotion(id, url) {

    var checkbox = document.getElementById("view_control"+id);

    var checkboxValue = checkbox.checked;

    if(checkboxValue){
        $.ajax({
            type: "POST",
            url: url,
            data: {
                id: id,
                check: 1
            },
            success: function(response) {
                location.reload();
            },
            error: function(error) {
                console.error(error);
            }
        });
    }else{
        $.ajax({
            type: "POST",
            url: url,
            data: {
                id: id,
                check: 0
            },
            success: function(response) {
                location.reload();
            },
            error: function(error) {
                console.error(error);
            }
        });
    }
}

function comment(id, value, url) {
    $.ajax({
        type: "GET",
        url: url,
        data: {
            id: id,
            text: value
        },
        success: function(response) {
            location.reload();
        },
        error: function(error) {
            console.error(error);
        }
    });
}

function orderCancer(url) {
    if(confirm('Bạn có chắn chắn hủy đơn')){
    $.ajax({
        type: "GET",
        url: url,
        data: {
        },
        success: function(response) {
            alert('Hủy thành công');
            location.reload();
        },
        error: function(error) {
            console.error(error);
        }
    });
}
}

function thongke(value, url) {
    $.ajax({
        type: "POST",
        url: url,
        data: {
            status: value
        },
        success: function(response) {
            location.reload();
        },
        error: function(error) {
            console.error(error);
        }
    });
}


function removeComment(id,url){
    if(confirm('Bạn có chắc chắn xóa!')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url : url,
            success: function(result) {
                if(result.error===false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert('Xóa lỗi , vui lòng thử lại!');
                }
            }
        })
    }
}


    
// Lấy đối tượng thông báo
var notification = document.getElementById("notification");

// Hiển thị thông báo
notification.style.display = "block";

// Ẩn thông báo sau 3 giây
setTimeout(function() {
    notification.style.display = "none";
}, 3000); // 3 giây



