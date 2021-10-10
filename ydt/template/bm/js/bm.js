$(document).ready(function(){
    $.ajax({
        dataType:'json',
        url:"../../model/bm.php?n=1",
        success:function(result){
            var a=result.responseText.split('@');
            $("#jsxx").html(a[0]);
            $('#n').html(a[1]);
            $('#m').html(a[2]);

           console.log(result);
   
    },
    error:function(result){
        console.log(result);
        var a=result.responseText.split('@');
        $("#jsxx").html(a[0]);
        $('#n').html(a[1]);
        $('#m').html(a[2]);
    }
    });



    //排行榜
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

    
    $.ajax({
        dataType:'json',
        url:"../../model/gn_fl.php?n=1",
        success:function(result){
          console.log(result);
        },
        error:function(result){
          console.log(result);
         $('.midend').html(result.responseText);
        }
    });
  
   
      $('.fanye').on('click','a div',function(){
          var a=$('#n').text();
          if($(this).attr('index-data')==1)a=1;
          else if($(this).attr('index-data')==2)(a-1)>0?a--:a=1;
          else if($(this).attr('index-data')==3)(a+1)<$('#m').text()?a++:a=$('#m').text();
          else a=$('#m').text();
          console.log(a);
        $.ajax({
            dataType:'json',
            url:"../../model/bm.php?n=2&m="+a,
            success:function(result){
                var a=result.responseText.split('@');
                $("#jsxx").html(a[0]);
                $('#n').html(a[1]);
       
        },
        error:function(result){
            console.log(result);
            var a=result.responseText.split('@');
           $("#jsxx").html(a[0]);
           $('#n').html(a[1]);
        }
        });
      });
})