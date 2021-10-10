$(document).ready(function(){

    $.ajax({
        dataType:'json',
        url:"../../model/player_add.php?n=1",
        success:function(result){
          console.log(result);
          $('#yh').html(result.responseText);
        
        },
        error:function(result){
          console.log(result);
          $('#yh').html(result.responseText);
        }
    });


    $(".tijiao").click(function(){
        console.log($('#yh').val());
            $.post("../../model/player_add_post.php",
                    {
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