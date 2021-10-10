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
        url:"../../model/player_data.php?n=1&m="+GetQueryString("pno"),
        success:function(result){
          console.log(result);
          var a=result.responseText.split('@');
          $('#bh').val(a[0]);
          $('#xh').val(a[1]);
          $('#xm').val(a[2]);
          $('#xbie').val(a[3]);
          $('#xbu').val(a[4]);
          $('#mm').val(a[5]);
          $('#yh').html(a[6]);
        },
        error:function(result){
          console.log(result);
          var a=result.responseText.split('@');
          $('#bh').val(a[0]);
          $('#xh').val(a[1]);
          $('#xm').val(a[2]);
          $('#xbie').val(a[3]);
          $('#xbu').val(a[4]);
          $('#mm').val(a[5]);
          $('#yh').html(a[6]);
        }
    });

    $(".tijiao").click(function(){
            $.post("../../model/player_data_post.php",
                    {
                       'pno':GetQueryString("pno"),
                       'bh':$('#bh').val(),
                       'xh':$('#xh').val(),
                       'xm':$('#xm').val(),
                       'xbie':$('#xbie').val(),
                       'xbu':$('#xbu').val(),
                       'mm':$('#mm').val(),
                       'yh':$('#yh').val()
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