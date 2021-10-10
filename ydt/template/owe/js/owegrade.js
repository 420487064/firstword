$(document).ready(function(){
    $.ajax({
        dataType:'json',
        url:"../../model/owegrade.php?n=1",
        success:function(result){
          console.log(result);
          var a=result.responseText.split('@');
          $('#jsxx').html(a[0]);
          $('#n').html(a[1]);
          $('$m').html(a[2]);
        },
        error:function(result){
          console.log(result);
          var a=result.responseText.split('@');
          $('#jsxx').html(a[0]);
          $('#n').html(a[1]);
          $('#m').html(a[2]);
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