window.onload = page ;

function page(){
var myInput = document.getElementById("psw");
var signup = document.getElementById("submitforgetpassword");



myInput.addEventListener("input", ValidatePassword);
document.getElementById("passwordforgetpassword_confirm").addEventListener("input", ValidateConfirmPassword);
document.getElementById('submitforgetpassword').addEventListener('submit', ValidateForgetPassword);
}
var passmatch ,  corrpass ,  corrmail = 0 ;
// When the user starts to type something inside the password field
function  ValidatePassword() {
	var myInput = document.getElementById("psw");
document.getElementById("passwordforgetpassword_confirm").value="";
	document.getElementById("validateconfirmpassword").innerHTML="";

var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var h3 = document.getElementById("h3");

var x , y , z , t = -1 ;
var accepted = 0 ;
  var txtok = document.createTextNode("Acceptable password");

	var parok = document.createElement("p");
	parok.id="accept";
	parok.appendChild(txtok);
   
   
	if(myInput.value.length!=0){
		document.getElementById("message").setAttribute("style","display:block");
	}
	else{
	   document.getElementById("message").setAttribute("style","display:none");
	   			document.getElementById("psw").setAttribute("style","color:black");

	   

	}

  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) { 
    letter.classList.remove("invalid");
    letter.classList.add("valid");
	x  = 0 ;
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
	x = -1 ;
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) { 
    capital.classList.remove("invalid");
    capital.classList.add("valid");
		y = 0 ;

  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
		y = -1 ;

  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) { 
    number.classList.remove("invalid");
    number.classList.add("valid");
		z = 0 ;

  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
		z = -1 ;

  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
		t = 0 ;

  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
		t = -1 ;

  }
  if(x == 0 && y == 0 && z == 0 && t == 0 && myInput.value.length!=0 ){
	  document.getElementById("ok").innerHTML="";
	    	document.getElementById("ok").appendChild(parok);

		parok.setAttribute("style","display:block");

	parok.setAttribute("style","color:green");
	h3.setAttribute("style","display:none");
	document.getElementById("message").setAttribute("style","display:none");
	corrpass=0;
			document.getElementById("psw").setAttribute("style","color:black");


}
  else
  
  {
	  corrpass = -1;
	 	if(myInput.value.length!=0){

	  document.getElementById("ok").innerHTML="";
	  	document.getElementById("message").setAttribute("style","display:block");

	h3.setAttribute("style","display:block");
  }
  }
  
   
}

function ValidateConfirmPassword() {
	var myInput = document.getElementById("psw").value;
	var confirms = document.getElementById("passwordforgetpassword_confirm").value;
	if(confirms.length == 0) {
		document.getElementById("validateconfirmpassword").innerHTML="";
			document.getElementById("passwordforgetpassword_confirm").setAttribute("style","color:black");
	}
	else {
		if(myInput==confirms){
		 var txtok = document.createTextNode("Passwords match");

	var parok = document.createElement("p");
		parok.setAttribute("style","color:green");

	parok.appendChild(txtok);
		document.getElementById("validateconfirmpassword").innerHTML="";
	document.getElementById("validateconfirmpassword").appendChild(parok);
			document.getElementById("passwordforgetpassword_confirm").setAttribute("style","color:black");

	passmatch=0;
	}
	
	else{
		passmatch = -1;
		var txtok = document.createTextNode("Passwords donot match");

	var parok = document.createElement("p");
		parok.setAttribute("style","color:red");

	parok.appendChild(txtok);
		document.getElementById("validateconfirmpassword").innerHTML="";
	document.getElementById("validateconfirmpassword").appendChild(parok);
	}
	}

}
	
function ValidateForgetPassword(){
	if(passmatch!=0){
		document.getElementById("passwordforgetpassword_confirm").setAttribute("style","color:red");
				event.preventDefault();

	}
	if(corrpass!=0){
		document.getElementById("psw").setAttribute("style","color:red");
				event.preventDefault();


	}
	
	if(passmatch!=0 || corrmail!=0){
		alert('Fill the required information correctly');
						event.preventDefault();


	}
}

