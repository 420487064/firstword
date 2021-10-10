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
        url:"../../model/gn_xm.php?n=4",
        success:function(result){
           console.log(result);
    },
    error:function(result){
        console.log(result);
        $('details').html('<summary class="aaa">比赛项目排行榜</summary>'+result.responseText);
    }
    });
   
   //console.log(GetQueryString("ino"));

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
   
    $('#details').on('click','li a',function(){
       console.log($(this).attr('index-data'));
    $.ajax({
        dataType:'json',
        url:"../../model/gn_xm.php?n=5&m="+$(this).attr('index-data'),
        success:function(result){
           console.log(result);
    },
    error:function(result){
        console.log(result.responseText);
        var a=result.responseText.split('@');
       $('#jsxx').html(a[0]);
       $('#m').html(a[1]);
       $('.h span').html(a[2]);
	   $('#n').html(a[3]);
    }
    });
   
    });
   



    $.ajax({
        dataType:'json',
        url:"../../model/gn_xm.php?n=2&m="+GetQueryString("ino"),
        success:function(result){
           console.log(result);
    },
    error:function(result){
        console.log(result.responseText);
        var a=result.responseText.split('@');
       $('#jsxx').html(a[0]);
       $('#m').html(a[1]);
       $('.h span').html(a[2]);
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
          url:"../../model/gn_xm.php?n=3&m="+GetQueryString("ino")+"&y="+a,
          success:function(result){
              var a=result.responseText.split('@');
              $("#jsxx").html(a[0]);
              $('#n').html(a[1]);
              $('.h span').html(a[2]);
     
      },
      error:function(result){
          console.log(result);
         
         $("#jsxx").html(result.responseText);
         $('#n').html(a);
      }
      });
    });
   


    
});