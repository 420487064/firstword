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
        url:"../../model/xm_del.php?n=1&m="+GetQueryString("ino"),
        success:function(result){
        //  console.log(result);
          var a=result.responseText.split('@');
          $('#bh').html("编号 :"+a[0]);
          $('#lx').html("类型 ："+a[1]);
          $('#mc').html("名称 ："+a[2]);
          $('#sj').html("时间 ："+a[3]);
          $('#dd').html("地点 ："+a[4]);
          $('#jl').html("记录 ："+a[5]);
          $('#cp').html("裁判 ："+a[6]);
        },
        error:function(result){
      //    console.log(result);
          var a=result.responseText.split('@');
          $('#bh').html("编号 :"+a[0]);
          $('#lx').html("类型 ："+a[1]);
          $('#mc').html("名称 ："+a[2]);
          $('#sj').html("时间 ："+a[3]);
          $('#dd').html("地点 ："+a[4]);
          $('#jl').html("记录 ："+a[5]);
          $('#cp').html("裁判 ："+a[6]);
          $('#tc').html("天次 ："+a[7]);
        }
    });

    $(".tijiao").click(function(){
            $.post("../../model/xm_del_post.php",
                    {
                       'ino':GetQueryString("ino")
                    },function(res){ 
                    //    console.log(res);
                        if(res==1){
                           location.href='xm.html';
                        }else{
                           $('.cr').text("编号已存在");
                        }
                    },"json");
        });
})