$(document).ready(function(){

	function GetQueryString(name)
	{
		 var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
		 var r = window.location.search.substr(1).match(reg);
		 if(r!=null)return  unescape(r[2]); return null;
	}

	//console.log(GetQueryString("index-ino"));
	//console.log(GetQueryString("index-pno"));

	 $.ajax({
			dataType:'json',
			url:"../../model/bm_data.php?n=1&ino="+GetQueryString("index-ino")+"&pno="+GetQueryString("index-pno"),
			success:function(result){
			//console.log(result);
			var a=result.responseText.split("@");
			$("#select1").html(a[0]);
			$("#select2").html(a[1]);
			$(".xy").html(a[2]);
			$(".xh").html(a[3]);
			$(".xm").html(a[4]);
			$(".lx").html(a[5]);
			$(".mc").html(a[6]);
		},
		error:function(result){
		//	console.log(result);
			var a=result.responseText.split("@");
			$("#select1").html(a[0]);
			$("#select2").html(a[1]);
			$(".xy").html(a[2]);
			$(".xh").html(a[3]);
			$(".xm").html(a[4]);
			$(".lx").html(a[5]);
			$(".mc").html(a[6]);
		}
		});
	  $('#select1').change(function(){
				 $.ajax({
			dataType:'json',
			url:"../../model/bm_data.php?n=2&id="+$('#select1').val(),
			success:function(result){
		//	console.log(result);
			var a=result.responseText.split("@");
			$(".xy").html(a[0]);
			$(".xh").html(a[1]);
			$(".xm").html(a[2]);
		},
		error:function(result){
		//	console.log(result);
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
			url:"../../model/bm_data.php?n=3&id="+$('#select2').val(),
			success:function(result){
		//	console.log(result);
			var a=result.responseText.split("@");
			$(".lx").html(a[0]);
			$(".mc").html(a[1]);
		},
		error:function(result){
		//	console.log(result);
			var a=result.responseText.split("@");
			$(".lx").html(a[0]);
			$(".mc").html(a[1]);
		}
		});		   
		  });
     
	$(".tijiao").click(function(){
	//	console.log($("#select1").val());
	//	console.log($("#select2").val());
        $.post("../../model/bm_data_post.php",
                {
					'pno':GetQueryString("index-pno"),
			        'ino':GetQueryString("index-ino"),
                    'npno':$("#select1").val(),
			        'nino':$("#select2").val()
                },function(res){
			        console.log(res);
                    if(res==1){
                       location.href='bm.html';
                    }else{
                       $('.cr').text("运动员编号"+$('#select1').val()+"已参与这个项目");
                    }
                },"json");
    });
 
});
