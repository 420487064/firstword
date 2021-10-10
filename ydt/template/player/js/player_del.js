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
        url:"../../model/player_del.php?n=1&m="+GetQueryString("pno"),
        success:function(result){
          console.log(result);
          var a=result.responseText.split('@');
          $('#bh').val(a[0]);
          $('#xh').val(a[1]);
          $('#xm').val(a[2]);
          $('#xbie').val(a[3]);
          $('#xbu').val(a[4]);
          $('#mm').val(a[5]);
          $('#yh').val(a[6]);
        },
        error:function(result){
          console.log(result);
          var a=result.responseText.split('@');
          $('#bh').html("性别 ："+a[0]);
          $('#xh').html("学号 ："+a[1]);
          $('#xm').html("姓名 ："+a[2]);
          $('#xbie').html("性别 ："+a[3]);
          $('#xbu').html("系部 ："+a[4]);
          $('#mm').html("密码 ："+a[5]);
          $('#yh').html("院号 ："+a[6]);
        }
    });

    $(".tijiao").click(function(){
        $.post("../../model/player_del_post.php",
                {
                   'pno':GetQueryString("pno"),
                },function(res){ 
                    console.log(res);
                    if(res==1){
                       location.href='player.html';
                    }else{
                       $('.cr').text("编号已存在");
                    }
                },"json");
    });
})