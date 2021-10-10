$(document).ready(function(){
	 $.ajax({
			dataType:'json',
			url:"../../model/bm_add.php?n=1",
			success:function(result){
			//console.log(result);
			var a=result.responseText.split("@");
			$("#select1").html(a[0]);
			$("#select2").html(a[1]);
		},
		error:function(result){
			//console.log(result);
			var a=result.responseText.split("@");
			$("#select1").html(a[0]);
			$("#select2").html(a[1]);
		}
		});
	
	  $('#select1').change(function(){
				 $.ajax({
			dataType:'json',
			url:"../../model/bm_add.php?n=2&id="+$('#select1').val(),
			success:function(result){
			console.log(result);
			var a=result.responseText.split("@");
			$(".xy").html(a[0]);
			$(".xh").html(a[1]);
			$(".xm").html(a[2]);
		},
		error:function(result){
			console.log(result);
			var a=result.responseText.split("@");
			$(".xy").text(a[0]);
			$(".xh").text(a[1]);
			$(".xm").text(a[2]);
		}
		});		   
		  });
	
	
	$('#select2').change(function(){
				 $.ajax({
			dataType:'json',
			url:"../../model/bm_add.php?n=3&id="+$('#select2').val(),
			success:function(result){
			console.log(result);
			var a=result.responseText.split("@");
			$(".lx").html(a[0]);
			$(".mc").html(a[1]);
		},
		error:function(result){
			console.log(result);
			var a=result.responseText.split("@");
			$(".lx").html(a[0]);
			$(".mc").html(a[1]);
		}
		});		   
		  });
     
	
		function GetQueryString(name){
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]);
	  return null;
     }
	
	$(".tijiao").click(function(){
        $.post("../../model/bm_add_post.php",
                {
                    pno:$("#select1").val(),
			        ino:$("#select2").val()
                },function(res){
			        console.log(res);
                    if(res==1){
                       $('.cr').text("已把"+$('#select1').val()+"成功插入"+$('#select2').val());
					//	console.log(1);
                    }else{
                       $('.cr').text("插入值已存在");
					//	console.log(2);
                    }
                },"json");
    });
 
});
