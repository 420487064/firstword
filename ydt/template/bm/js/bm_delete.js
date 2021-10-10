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
			url:"../../model/bm_delete.php?ino="+GetQueryString("index-ino")+"&pno="+GetQueryString("index-pno"),
			success:function(result){
			console.log(result);
			$(".rightmid").html(result.responseText);
			
		},
		error:function(result){
			console.log(result);
            $(".rightmid").html(result.responseText);
		}
		});


		$(".tijiao").click(function(){
				$.post("../../model/bm_delete_post.php",
						{
							'pno':GetQueryString("index-pno"),
							'ino':GetQueryString("index-ino")
						},function(res){
							console.log(res);
							if(res==1){
							   location.href='bm.html';
							}else{
							   $('.cr').text("删除失败");
							}
						},"json");
			});

	
})