     var a=document.getElementById('a')
	 var b=document.getElementById('b')
	 var header2=document.getElementById('header2')
	 var header1=document.getElementById('header1')
	 var c=b.offsetHeight+b.offsetTop+50
	 var flag=0
	 var onkey=0;
	
            var scrollFunc = function(e) {
                var ee = e || window.event;
                var t1 = document.getElementById("wheelDelta");
				var t2=document.getElementById("detail"); 
				var d=a.scrollTop
				onkey=ee.keyCode;
				console.log(e.detail);
			    var position=window.scrollY
				var now=event.target.id
				//console.log(now);
                if(((ee.wheelDelta<0||e.detail>0)&&flag==0)||(onkey==40&&flag==0)) {
				      flag=1	
		    	      a.style.top="70px";
					  header1.className="active"
					 header2.className="active"
		     		
                }
			 else if(((ee.wheelDelta>0||e.detail<0)&&flag==1&&d<3&&now=='a')||((onkey==38&&flag==1&&d<3))){
				 flag=0
				  header1.className=""
				  header2.className=""
                  a.style.top="1500px";
			  }
			}
            if(document.addEventListener) {
                document.addEventListener('DOMMouseScroll', scrollFunc, false);
            } 
            window.onmousewheel = document.onmousewheel = document.onkeydown=scrollFunc; 
	