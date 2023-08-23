$(document).ready(function() {

  //event listener for changes in the netwrok
  window.addEventListener("offline", function(e) {
    Notiflix.Notify.Init({
        timeout: 5000,
    });
    Notiflix.Notify.Warning('Kết nối bị gián đoạn!');
  });

  window.addEventListener("online", function(e) {
    Notiflix.Notify.Init({
        timeout: 5000,
    });
    Notiflix.Notify.Success('Đã khôi phục kết nối Internet.');
  });
}); 


$(document).ready(function() {
    $(".nap-atm").hide();
    $(".nap-momo").hide();
});

jQuery(document).ready(function() {
    jQuery('.type-2').click(function(){
         jQuery('.type-2').addClass('selected');
         jQuery('.type-1').removeClass('selected');
         jQuery('.type-3').removeClass('selected');
         $(".nap-card").hide();
         $(".nap-atm").show();
         $(".nap-momo").hide();
    });
});

jQuery(document).ready(function() {
    jQuery('.type-1').click(function(){
         jQuery('.type-1').addClass('selected');
         jQuery('.type-2').removeClass('selected');
         jQuery('.type-3').removeClass('selected');
         $(".nap-card").show();
         $(".nap-atm").hide();
         $(".nap-momo").hide();
    });
});

jQuery(document).ready(function() {
    jQuery('.type-3').click(function(){
         jQuery('.type-3').addClass('selected');
         jQuery('.type-1').removeClass('selected');
         jQuery('.type-2').removeClass('selected');
         $(".nap-card").hide();
         $(".nap-atm").hide();
         $(".nap-momo").show();
    });
});

$(window).on("load",function(){
     $(".loader-wrapper").fadeOut("slow");
});

$(document).ready(function() {
    $('#buy-acc').click(function() {
        var id = $("#id-acc").val();
        var user = $("#user").val();
        if (user != "") {
            if ($.isNumeric(id) && id > 0) {
                $.ajax({
                    url  : 'ajax/buy.php',
                    data : {id: id,user: user},
                    type : 'POST' ,
                    success : function( json ) {
                        if (json == "error_id") {
                            Swal.fire({
                                icon: 'error',
                                text: json,
                            });
                        }else if (json == "error_money") {
                            Swal.fire({
                                icon: 'error',
                                text: 'Tài khoản không đủ! Vui lòng nạp thêm tiền!',
                            });
                        }else if (json == "error_acc_2") {
                            Swal.fire({
                                icon: 'error',
                                text: 'Nick đang trong giai đoạn trả góp! Không thể mua',
                            });
                        }else if (json == "error_acc_3") {
                            Swal.fire({
                                icon: 'error',
                                text: 'Nick này đã bán trước đó! Vui lòng chọn Nick khác!',
                            });
                        }
                        else if (json == "error_acc_4") {
                            Swal.fire({
                                icon: 'error',
                                text: 'Hệ thống lỗi! Vui lòng liên hệ BQT!',
                            });
                        }
                        else if (json == "success_1") {
                            Swal.fire({
                                icon: 'success',
                                text: 'Mua tài khoản thành công! Vui lòng kiểm tra email để nhận thông tin!',
                            });
                        }
                        else if (json == "success_2") {
                            Swal.fire({
                                icon: 'success',
                                text: 'Mua tài khoản thành công! Vui lòng kiểm tra lịch sử mua tài khoản để nhận thông tin!',
                            });
                        }
                        else if (json == "error_acc_5") {
                            Swal.fire({
                                icon: 'error',
                                text: 'Hệ thống account lỗi! Vui lòng liên hệ BQT!',
                            });
                        }
                    }
                });
            }
        }
        else{
            Swal.fire({
                icon: 'error',
                text: 'Vui lòng đăng nhập để sử dụng chức năng này!',
            })
        }
    });
});

function sale_timer(id) {
    $.ajax({
        url: 'ajax/update_timer_sale.php',
        type: 'POST', 
        data: {id: id},
        success : function( data ) {
        }
    }) 
}

// Start LIEN-MINH

function getresult(pathnameUrl) {
    var page = 'all-links';
    var rowcount = $("#rowcount").val();
    switch (pathnameUrl) {
        case "nick-lien-minh":
                $.ajax({
                    url: "ajax/lien-minh/getresult.php",
                    type: "GET",
                    data:  {rowcount: rowcount},
                    success: function(data){
                        $("#pagination-result").html(data);
                    },
                    error: function() 
                    {}          
               });
            break;
        case "nick-free-fire":
                $.ajax({
                    url: "ajax/free-fire/getresult.php",
                    type: "GET",
                    data:  {rowcount: rowcount},
                    success: function(data){
                        $("#pagination-result-freefire").html(data);
                    },
                    error: function() 
                    {}          
               });
            break;
        case "nick-lien-quan":
                $.ajax({
                    url: "ajax/free-fire/getresult.php",
                    type: "GET",
                    data:  {rowcount: rowcount},
                    success: function(data){
                        $("#pagination-result-lienquan").html(data);
                    },
                    error: function() 
                    {}          
               });
            break;
        case "nick-ngoc-rong":
                $.ajax({
                    url: "ajax/free-fire/getresult.php",
                    type: "GET",
                    data:  {rowcount: rowcount},
                    success: function(data){
                        $("#pagination-result-ngocrong").html(data);
                    },
                    error: function() 
                    {}          
               });
            break;
        case "nick-pubg-mobile":
                $.ajax({
                    url: "ajax/free-fire/getresult.php",
                    type: "GET",
                    data:  {rowcount: rowcount},
                    success: function(data){
                        $("#pagination-result-pubgmobile").html(data);
                    },
                    error: function() 
                    {}          
               });
            break;
        case "nick-zingspeed-mobile":
                $.ajax({
                    url: "ajax/free-fire/getresult.php",
                    type: "GET",
                    data:  {rowcount: rowcount},
                    success: function(data){
                        $("#pagination-result-zpmobile").html(data);
                    },
                    error: function() 
                    {}          
               });
            break;
        case "nick-fo4":
                $.ajax({
                    url: "ajax/free-fire/getresult.php",
                    type: "GET",
                    data:  {rowcount: rowcount},
                    success: function(data){
                        $("#pagination-result-fo4").html(data);
                    },
                    error: function() 
                    {}          
               });
            break;
        case "nick-dot-kich":
                $.ajax({
                    url: "ajax/free-fire/getresult.php",
                    type: "GET",
                    data:  {rowcount: rowcount},
                    success: function(data){
                        $("#pagination-result-cf").html(data);
                    },
                    error: function() 
                    {}          
               });
            break;
        case "nick-ninja-school":
                $.ajax({
                    url: "ajax/free-fire/getresult.php",
                    type: "GET",
                    data:  {rowcount: rowcount},
                    success: function(data){
                        $("#pagination-result-njsc").html(data);
                    },
                    error: function() 
                    {}          
               });
            break;
        case "nick-hiep-si":
                $.ajax({
                    url: "ajax/free-fire/getresult.php",
                    type: "GET",
                    data:  {rowcount: rowcount},
                    success: function(data){
                        $("#pagination-result-hs").html(data);
                    },
                    error: function() 
                    {}          
               });
            break;
        case pathnameUrl:
                $.ajax({
                    url: pathnameUrl,
                    type: "GET",
                    data:  {rowcount: rowcount},
                    success: function(data){
                        $("#pagination-result").html(data);
                    },
                    error: function() 
                    {}          
               });
            break;
    }
} 


$(document).ready(function(){
    $('#search_keyword').click(function() {
        var page = 'all-links';
        var rowcount = $("#rowcount").val();
        var price = $("#price").val();
        var status = $("#status").val();
        var rank = $("#rank").val();
        var status_2 = $("#status_2").val();
        if (price != null || rank != null || status != null || status_2 != null) {
            $.ajax({
                url: "ajax/lien-minh/getresult_search.php",
                type: "GET",
                data:  {rowcount: rowcount,price: price,status: status,rank: rank,status_2: status_2},
                success: function(data){
                    $("#pagination-result").html(data);
                },
                error: function()
                {}          
           });
        }else{
            Swal.fire({
                icon: 'error',
                text: 'Vui lòng chọn thông tin tìm kiếm!',
            });
        }
    });
});

$(document).ready(function(){
    $('#search_sort_first').click(function() {
        var page = 'all-links';
        var rowcount = $("#rowcount").val();
        $.ajax({
            url: "ajax/lien-minh/getresult_sort_first.php",
            type: "GET",
            data:  {rowcount: rowcount},
            success: function(data){
                $("#pagination-result").html(data);
            },
            error: function() 
            {}          
       });
    });
});

$(document).ready(function(){
    $('#search_sort_second').click(function() {
        var page = 'all-links';
        var rowcount = $("#rowcount").val();
        $.ajax({
            url: "ajax/lien-minh/getresult_sort_second.php",
            type: "GET",
            data:  {rowcount: rowcount},
            success: function(data){
                $("#pagination-result").html(data);
            },
            error: function() 
            {}          
       });
    });
});

$(document).ready(function(){
    $('#search_default').click(function() {
        getresult("ajax/lien-minh/getresult.php");
    });
});

// END JS LIEN-MINH


// START FREE FIRE



// END FREE FIRE

$(document).ready(function(){
    $(document).ajaxStart(function() {
        // $("#loading").show();
        Notiflix.Loading.Circle('Vui lòng chờ...');
    });
    $(document).ajaxStop(function() {
        // $("#loading").hide();
        Notiflix.Loading.Remove();
    });
});
