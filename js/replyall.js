window.onload=page;

function page(){
	document.getElementById("selectall").onchange = function(){
	if(document.getElementById("selectall").checked){
		var x = document.getElementsByClassName("check");
		for(var i = 0 ; i < x.length ; i++){
			 document.getElementsByClassName("check")[i].checked = true;
		}
		document.getElementById("replyall").style.display="inline";
	}
	else{
	var x = document.getElementsByClassName("check");
		for(var i = 0 ; i < x.length ; i++){
			 document.getElementsByClassName("check")[i].checked = false;
		}
		document.getElementById("replyall").style.display="none";
		
	}
	}
		var x = document.getElementsByClassName("check");
		//alert(x.length);
		for(var i = 0 ; i < x.length ; i++){
			var cb = x[i];
			cb.onchange = function(){
						var v = false ;

			for(var j = 0 ; j < x.length ; j++){

			if(x[j].checked == true){
				v = true;
			}
		}
		if(v==true){
					document.getElementById("replysome").style.display="inline";

		}
		else{
					document.getElementById("replysome").style.display="none";

		}
			}
		

}
}