$(document).ready(function(){
    $("#but_submit").click(function(){
        var username = $("#email").val().trim();
        var password = $("#password").val().trim();

        if( username != "" && password != "" ){
            $.ajax({
                url:'inc/check_login.php',
                method:'POST',
                data:{username:username,password:password},
                success:function(response){
                    if(response == 1){
                        Swal.fire({
                            icon: 'success',
                            title: 'Đăng Nhập Thành Công!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(function() {
                            window.location = "quanly/";
                        }, 1800);
                    }else if(response == 0){
                        Swal.fire({
                            icon: 'error',
                            title: 'Tài Khoản Không Hợp Lệ',
                            text: 'Vui lòng kiểm tra lại!',
                        })
                    }
                }
            });
        }
    });
});