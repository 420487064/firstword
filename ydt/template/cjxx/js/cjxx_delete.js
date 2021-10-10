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
        url:"../../model/cjxx_delete.php?ino="+GetQueryString("index-ino")+"&pno="+GetQueryString("index-pno"),
        success:function(result){
            console.log(result);
           
        },
        error:function(result){
         console.log(result);
         var a=result.responseText.split('@');
         $('#select1').html(a[0])
         $('#lx').html(a[1]);
         $('#mc').html(a[2]);
         $('#select2').html(a[3]);
         $('#xy').html(a[4]);
         $('#xh').html(a[5]);
         $('#xm').html(a[6]);
         $('#cj').html(a[7]);
        }
     });
   
     $(".tijiao").click(function(){
        //	console.log($("#select1").val());
        //	console.log($("#select2").val());
        //  console.log($("#select3").val());
            $.post("../../model/cjxx_delete_post.php",
                    {
                        'ino':GetQueryString("index-ino"),
                        'pno':GetQueryString("index-pno"),
                    },function(res){
                        console.log(res);
                        if(res==1){
                           location.href='cjxx.html';
                        }else{
                           $('.cr').text("运动员编号"+$('#select2').val()+"修改失败");
                        }
                    });
        });
    
})