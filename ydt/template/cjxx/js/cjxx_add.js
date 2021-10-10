$(document).ready(function(){
    $.ajax({
        dataType:'json',
        url:"../../model/cjxx_add.php?n=1",
        success:function(result){
            console.log(result);
             $('#select1').html(result.responseText);
        },
        error:function(result){
         console.log(result);
         var a=result.responseText.split('@');
         $('#select1').html(a[0]);
         $('#lx').html(a[1]);
         $('#mc').html(a[2]);
        }
     });
    
     $('#select1').change(function(){
          console.log($('#select1').val());
        $.ajax({
            dataType:'json',
            url:"../../model/cjxx_add.php?n=2&m="+$('#select1').val(),
            success:function(result){
                console.log(result);
               
            },
            error:function(result){
             console.log(result);
             var a=result.responseText.split('@');
             $('#lx').html(a[0]);
             $('#mc').html(a[1]);
             $('#select2').html(a[2]);
             $('#xy').html("学院 :");
             $('#xh').html("学号 :");
             $('#xm').html("姓名 :");
            }
         });

     });

     $('#select2').change(function(){
        console.log($('#select2').val());
      $.ajax({
          dataType:'json',
          url:"../../model/cjxx_add.php?n=3&m="+$('#select2').val(),
          success:function(result){
              console.log(result);
             
          },
          error:function(result){
           console.log(result);
           var a=result.responseText.split('@');
           $('#xy').html(a[0]);
           $('#xh').html(a[1]);
           $('#xm').html(a[2]);
          }
       });

   });
   
   $(".tijiao").click(function(){
	//	console.log($("#select1").val());
	//	console.log($("#select2").val());
    //  console.log($("#select3").val());
        $.post("../../model/cjxx_add_post.php",
                {
                    'ino':$("#select1").val(),
			        'pno':$("#select2").val(),
                    'cj':$('#cj').val()
                },function(res){
			        console.log(res);
                    if(res==1){
                       location.href='cjxx.html';
                    }else{
                       $('.cr').text("运动员编号"+$('#select2').val()+"已录入");
                    }
                });
    });


})