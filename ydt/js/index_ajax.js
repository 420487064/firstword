var listy=0;
var listnow=0;
$(document).ready(function(){
	 $.ajax({
			dataType:'json',
			url:"model/index.php",
			success:function(result){
			console.log(result);
			var a=result.split("@");
			$("#aaaa").html(a[0]);
		},
		error:function(result){
			console.log(result);
			var a=result.responseText.split("@");
			$('#aaaa').html(a[1]);
			listy=Math.ceil(a[0]/4)*240;
			$('#scrollContent').html(a[3]);
			contentMoveLength=a[2]*60-400;
			$('.midmid #ul').html(a[4]);
		//	console.log(a[4]);
		   $('#scrollConten').html(a[5]);	
		   $('.h:eq(0)').css('background','rgb(31, 118, 232)');
		   if(a[6]!="")$('.logo').html('<a id="tcdr">退出登入 </a>');
		   else $('.logo').html('<a href="template/next/dr.html">未登入</a>');
		}
		});
    

		$.ajax({
			dataType:'json',
			url:"model/gn_qx.php?n=1",
			success:function(result){
			console.log(result);
		},
		error:function(result){
			console.log(result);
			$('.menu').html(result.responseText);
		}
		});
    
		$("#header1").on("click",'#tcdr',function(){
			$.ajax({
				dataType:'json',
				url:"model/gn_qx.php?n=2",
				success:function(result){
				console.log(result);
			},
			error:function(result){
				console.log(result);
				$('.menu').html(result.responseText);
				location.replace='index.html';
			}
		});
	});
		$("#scrollVie").on("click",'.bd',function(){
			console.log($(this).attr('index-data'));
			console.log($(this).attr('itype'));
			$.ajax({
				dataType:'json',
				url:"model/index_post.php?ino="+$(this).attr('index-data')+"&itype="+$(this).attr('itype')+"&n=1",
				success:function(result){
				console.log(result);
			    
			},
			error:function(result){
				console.log(result);
                $('#hj').html(result.responseText);
			}
			});
			
		});

		$("#aaaa").on("click",'.h',function(){
			console.log($(this).attr('index-data'));
			
			$.ajax({
				dataType:'json',
				url:"model/index_post.php?day="+$(this).attr('index-data')+"&n=2",
				success:function(result){
				console.log(result);
			    
			},
			error:function(result){
				console.log(result);
				$('#scrollContent').html(result.responseText);
			}
			});
			
		});



    $("#aaaa").on("click",'.h',function(){
      $(this).css('background','rgb(31, 118, 232)');
		console.log(11);
	  $(this).siblings().css('background','rgb(255, 255, 255)');	 
  });
  
  
   $('.main_dj').on('click','.main_d_j1',function(){
         $('.main_bn').css('margin-left','0px')
		 	$('#main_sy').removeClass('main_ll_img');
			$('.main_d_j1').removeClass('main_dj1');
			$('.main_d_j2').removeClass('main_dj2');
   
   });
   
    $('.main_dj').on('click','.main_d_j2',function(){
         $('.main_bn').css('margin-left','-100%')
		 	$('.main_ll').addClass('main_ll_img');
			$('.main_d_j1').addClass('main_dj1');
			$('.main_d_j2').addClass('main_dj2');
   
   });
   
  $("#scrollConten").on("click",'.bd',function(){
	$(this).css('color','rgb(31, 118, 232)');
	  console.log(11);
	$(this).siblings().css('color','#fff');	 
});
});
