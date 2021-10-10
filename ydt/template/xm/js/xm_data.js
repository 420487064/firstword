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
        url:"../../model/xm_data.php?n=1&m="+GetQueryString("ino"),
        success:function(result){
          console.log(result);
          var a=result.responseText.split('@');
          $('#bh').val(a[0]);
          $('#lx').val(a[1]);
          $('#mc').val(a[2]);
          var b=a[3].split(' ');
          $('#sj').val(b[0]+'T'+b[1]);
          $('#dd').val(a[4]);
          $('#jl').val(a[5]);
          $('#cp').html(a[6]);
        },
        error:function(result){
          console.log(result);
          var a=result.responseText.split('@');
          $('#bh').val(a[0]);
          $('#lx').val(a[1]);
          $('#mc').val(a[2]);
          var b=a[3].split(' ');
          $('#sj').val(b[0]+'T'+b[1]);
          $('#dd').val(a[4]);
          $('#jl').val(a[5]);
          $('#cp').html(a[7]);
        //  console.log(a[6]);
          $('#tc').html(a[6]);
        }
    });

    $(".tijiao").click(function(){
            $.post("../../model/xm_data_post.php",
                    {
                       'ino':GetQueryString("ino"),
                       'bh':$('#bh').val(),
                       'lx':$('#lx').val(),
                       'mc':$('#mc').val(),
                       'sj':$('#sj').val(),
                       'dd':$('#dd').val(),
                       'jl':$('#jl').val(),
                       'cp':$('#cp').val(),
                       'tc':$('#tc').val()
                    },function(res){ 
                        console.log(res);
                        if(res==1){
                           location.href='xm.html';
                        }else{
                           $('.cr').text("编号已存在");
                        }
                    },"json");
        });
})