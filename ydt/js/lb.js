   var z=document.getElementById('z');
   var y=document.getElementById('y');
   var aaaa=document.getElementById('aaaa');  
  z.onclick=function(){
	   var g=parseInt(aaaa.style.marginLeft);
	   if(g<0){
	  var k=g+240;
	  var timer = setInterval(function(){
          g+=10;
        aaaa.style.marginLeft=g+'px';
        if (g>=k||g==0) {
           clearInterval(timer)
    }
      }, 10)
	 }
  }
  y.onclick=function(){
	 
     var g=parseInt(aaaa.style.marginLeft);
	  var k=g-240;
	  if(k>-listy){
	  var timer = setInterval(function(){
          g-= 10;
        aaaa.style.marginLeft=g+'px';
        if (g<=k||g==0) {
           clearInterval(timer)
    }
    }, 10)
	  }
  }
  
  
  
