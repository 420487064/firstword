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
          $('#bh').val(a[0]);
          $('#xm').val(a[1]);
          $('#mm').val(a[2]);
        },
        error:function(result){
          console.log(result);
          var a=result.responseText.split('@');
          $('#bh').val(a[0]);
          $('#xm').val(a[1]);
          $('#mm').val(a[2]);
        }
    });

    $(".tijiao").click(function(){
            $.post("../../model/cp_data_post.php",
                    {
                       'rno':GetQueryString("rno"),
                        'nrno':$('#bh').val(),
                        'nname':$('#xm').val(),
                        'nmima':$('#mm').val()
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