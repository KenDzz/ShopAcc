function getuser(url) {
    var page = 'all-links';
    var rowcount = $("#rowcount-user").val();
    $.ajax({
        url: url,
        type: "GET",
        data:  {rowcount: rowcount},
        success: function(data){
            $("#pagination-result-user").html(data);
        },
        error: function() 
        {}          
   });
}

function getresultacc(url) {
    var page = 'all-links';
    var rowcount = $("#rowcount").val();
    $.ajax({
        url: url,
        type: "GET",
        data:  {rowcount: rowcount},
        success: function(data){
            $("#pagination-result-acc").html(data);
        },
        error: function() 
        {}          
   });
}

function getresult(url) {
    var page = 'all-links';
    var rowcount = $("#rowcount").val();
    $.ajax({
        url: url,
        type: "GET",
        data:  {rowcount: rowcount},
        success: function(data){
            $("#pagination-result").html(data);
        },
        error: function() 
        {}          
   });
}

function getpayment(url) {
    var page = 'all-links';
    var rowcount = $("#rowcount").val();
    $.ajax({
        url: url,
        type: "GET",
        data:  {rowcount: rowcount},
        success: function(data){
            $("#pagination-result-payment").html(data);
        },
        error: function() 
        {}          
   });
}


$(document).ready(function($) {
    $('#button_md5').click(function(){
      $('#pass_generator').val($.MD5($('#pass_generator').val()));
    });
});

$(document).ready(function(){
    $('#button_search_acc').click(function() {
        var page = 'all-links';
        var rowcount = $("#rowcount").val();
        var id_acc = $("#id_acc").val();
        if (id_acc != null) {
            $.ajax({
                url: "ajax/getaccount_search.php",
                type: "GET",
                data:  {rowcount: rowcount,id_acc: id_acc},
                success: function(data){
                    $("#pagination-result-acc").html(data);
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
    $('#button_search_payment').click(function() {
        var page = 'all-links';
        var rowcount = $("#rowcount").val();
        var user = $("#user_payment").val();
        if (user != null) {
            $.ajax({
                url: "ajax/getpayment_search.php",
                type: "GET",
                data:  {rowcount: rowcount,user: user},
                success: function(data){
                    $("#pagination-result-payment").html(data);
                },
                error: function()
                {
                 Swal.fire({
                    icon: 'error',
                    text: 'ERROR: 12',
                });
                }          
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
    $('#button_search').click(function() {
        var page = 'all-links';
        var rowcount = $("#rowcount").val();
        var user = $("#user").val();
        if (user != null) {
            $.ajax({
                url: "ajax/getresult_search.php",
                type: "GET",
                data:  {rowcount: rowcount,user: user},
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
    $('#button_search_user').click(function() {
        var page = 'all-links';
        var rowcount = $("#rowcount").val();
        var user = $("#user").val();
        if (user != null) {
            $.ajax({
                url: "ajax/getuser_search.php",
                type: "GET",
                data:  {rowcount: rowcount,user: user},
                success: function(data){
                    $("#pagination-result-user").html(data);
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
    $(document).ajaxStart(function() {
        $("#loading").show();
    });
    $(document).ajaxStop(function() { 
        $("#loading").hide();
    });
});