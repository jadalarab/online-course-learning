window.onload=function(){
	document.getElementById("more").addEventListener("change",function(){
		if(this.checked) {
			$('#response1').show();
		} else {
			$('#response1').hide();
      
    }
	});
	
};