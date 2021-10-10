    var points=document.getElementsByClassName('point');
     var items=document.getElementsByClassName('item');
	
	
	 var index= 0;
     var time=0;
	 var cc=0; 
	 var clearActive = function(){
		 for(var i=0;i<items.length;i++){
			 items[i].className='item';
			 points[i].className='point';
		 }
	 }
	 
	 var goIndex=function(){
		 clearActive();
		 if(cc>index){
		  items[cc].className='item active ddz';
		  items[index].className="item active turnright";
		 }
		 else{
			 items[cc].className='item active ddy';
		  items[index].className="item active turnleft";
		 }
		 
		 points[cc].className='point end'
		 points[index].className='point active';
	 }
	 
	 var goNext=function(){
		  cc=index;
		 if(index<4){
			 index++;
		 }
		 else {
			 index=0;
		 }
		 goIndex();
		 items[index].className='item active turnleft';
		 items[cc].className='item active ddy';
	     points[cc].className='point end';
	 }
	
	 
	 for(var i=0;i<points.length;i++){
		 points[i].addEventListener('click',function(){
			 cc=index;
			 index = this.getAttribute('data-index');
			 if(cc!=index)goIndex();
			 time=0;
		 })
	 }

    var tim=setInterval(function(){
		time++;
		if(time==20){
			goNext();
			time=0;
		}
	},300)
	 
	 