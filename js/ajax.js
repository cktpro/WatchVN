$(document).ready(function(){
	$("#tinhtp").change(function(){
		var ma_tinhtp= $("#tinhtp").val();
		$.post("ajax/quanhuyen.php", {ma_tinhtp: ma_tinhtp}, function(data){
			$("#quanhuyen").html(data);
		})
	})
});
$(document).ready(function(){
	$("#quanhuyen").change(function(){
		var ma_quanhuyen= $("#quanhuyen").val();
		$.post("ajax/xaphuong.php", {ma_quanhuyen: ma_quanhuyen}, function(data){
			$("#xaphuong").html(data);
		})
	})
});
$(document).ready(function(){
    $("#dang_nhap").click(function(){
        $("#dang-nhap-form").slideToggle("slow");
    });
});

$(document).ready(function(){
    $("#dang_ky").click(function(){
        $("body").load("?menu=dang_ky");
    });
});
$(document).ready(function(){
    $(".menu2").click(function(){
        $(".item1").slideToggle("slow");
    });
});
$(document).ready(function(){
    $(".menu2").click(function(){
        $("ul").slideToggle("slow");
    });
});

