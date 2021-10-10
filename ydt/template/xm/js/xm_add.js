$(document).ready(function(){

    $.ajax({
        dataType:'json',
        url:"../../model/xm_add.php?n=1",
        success:function(result){
          console.log(result);
          $('#cp').html(result.responseText);
        
        },
        error:function(result){
          console.log(result);
          var a=result.responseText.split('@');
           $('#cp').html(a[0]);
           $('#tc').html(a[1]);
        }
    });


    $(".tijiao").click(function(){
        console.log($('#bh').val());
            $.post("../../model/xm_add_post.php",
                    {
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
                    },'json');
        });
})