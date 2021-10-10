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
        url:"../../model/xy_data.php?n=1&m="+GetQueryString("cno"),
        success:function(result){
          console.log(result);
          var a=result.responseText.split('@');
          $('#yh').val(a[0]);
          $('#xy').val(a[1]);
        },
        error:function(result){
          console.log(result);
          var a=result.responseText.split('@');
          $('#yh').val(a[0]);
          $('#xy').val(a[1]);
        }
    });

    $(".tijiao").click(function(){
            $.post("../../model/xy_data_post.php",
                    {
                       'cno':GetQueryString("cno"),
                       'yh':$('#yh').val(),
                       'xy':$('#xy').val(),
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