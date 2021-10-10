$(document).ready(function(){
   
		$(".tijiao").click(function(){
				$.post("../../model/cp_add_post.php",
						{
							'rno':$('#bh').val(),
							'name':$('#xm').val(),
                            'mima':$('#mm').val()
						},function(res){
							console.log(res);
							if(res==1){
							   location.href='cp.html';
							}else{
							   $('.cr').text("录入失败");
							}
						},"json");
			});
})