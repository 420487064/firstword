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
        url:"../../model/cp_data.php?n=1&m="+GetQueryString("rno"),
        success:function(result){
          console.log(result);
          var a=result.responseText.split('@');
          $('#bh').html(a[0]);
          $('#xm').html(a[1]);
          $('#mm').html(a[2]);
        },
        error:function(result){
          console.log(result);
          var a=result.responseText.split('@');
          $('#bh').html("编号 ： "+a[0]);
          $('#xm').html("姓名 ： "+a[1]);
          $('#mm').html("密码 ： "+a[2]);
        }
    });

    $(".tijiao").click(function(){
            $.post("../../model/cp_delete_post.php",
                    {
                       'rno':GetQueryString("rno"),
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