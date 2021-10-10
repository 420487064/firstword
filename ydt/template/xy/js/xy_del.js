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
        url:"../../model/xy_del.php?n=1&m="+GetQueryString("cno"),
        success:function(result){
          console.log(result);
          var a=result.responseText.split('@');
          $('#yh').html("院号 ："+a[0]);
          $('#xy').html("学院 ："+a[1]);
        },
        error:function(result){
          console.log(result);
          var a=result.responseText.split('@');
          $('#yh').html("院号 ："+a[0]);
          $('#xy').html("学院 ："+a[1]);
        }
    });

    $(".tijiao").click(function(){
            $.post("../../model/xy_del_post.php",
                    {
                       'cno':GetQueryString("cno"),
                    },function(res){ 
                        console.log(res);
                        if(res==1){
                           location.href='xy.html';
                        }else{
                           $('.cr').text("院号已存在");
                        }
                    },"json");
        });
})