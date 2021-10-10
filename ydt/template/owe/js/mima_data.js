$(document).ready(function(){
   
    $(".tijiao").click(function(){
        console.log($('#old').val());
        if($('#nnew').val()!=$('#new').val())$('.cr').text("密码前后不一致");
        else{
            $.post("../../model/mima.php",
                    {
                        'old':$('#old').val(),
                        'new':$('#new').val()
                    },function(res){
                        console.log(res);
                        if(res==1){
                           history.back();
                        }else{
                           $('.cr').text("旧密码不对");
                        }
                    });
                }
        });

        $('.fanhui').click(function(){
           history.back();
         //  console.log(1);
        });

        $.ajax({
            dataType:'json',
            url:"../../model/gn_xm.php?n=1",
            success:function(result){
               console.log(result);
        },
        error:function(result){
            console.log(result);
            $('details').html('<summary class="aaa">比赛项目排行榜</summary>'+result.responseText);
        }
        });
})