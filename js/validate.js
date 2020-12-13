window.onload = page ;

function page(){
if(typeof(document.getElementById('messageResult')) !== 'undefined' && document.getElementById('messageResult') != null ){
var op=1;
var x = window.setInterval(function(){
            document.getElementById('messageResult').style.opacity = op;
            op = op - 0.01;
			
        },10);
}
var myInput = document.getElementById("psw");
var signup = document.getElementById("submitsignup");

var mail = document.getElementById("emailsignup");
mail.addEventListener("input", ValidateMail);

myInput.addEventListener("input", ValidatePassword);
document.getElementById("passwordsignup_confirm").addEventListener("input", ValidateConfirmPassword);
document.getElementById('submitsignup').addEventListener('submit', ValidateSignUp);
}
var passmatch ,  corrpass ,  corrmail = 0 ;
// When the user starts to type something inside the password field
function  ValidatePassword() {
	var myInput = document.getElementById("psw");
document.getElementById("passwordsignup_confirm").value="";
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
	var confirms = document.getElementById("passwordsignup_confirm").value;
	if(confirms.length == 0) {
		document.getElementById("validateconfirmpassword").innerHTML="";
			document.getElementById("passwordsignup_confirm").setAttribute("style","color:black");
	}
	else {
		if(myInput==confirms){
		 var txtok = document.createTextNode("Passwords match");

	var parok = document.createElement("p");
		parok.setAttribute("style","color:green");

	parok.appendChild(txtok);
		document.getElementById("validateconfirmpassword").innerHTML="";
	document.getElementById("validateconfirmpassword").appendChild(parok);
			document.getElementById("passwordsignup_confirm").setAttribute("style","color:black");

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
function ValidateMail(){
	if(document.getElementById("emailsignup").value.length==0){
			document.getElementById("confirmmail").innerHTML="";
				document.getElementById("emailsignup").setAttribute("style","color:black");

	}
	else{
var pattern = new RegExp ("[a-z]{3}[0-9]{1,3}@mail.aub.edu");
	if(!pattern.test(document.getElementById("emailsignup").value)){
		var txtok = document.createTextNode("Mail doesnot match the form");

	var mailok = document.createElement("p");
		mailok.setAttribute("style","color:red");

	mailok.appendChild(txtok);
		document.getElementById("confirmmail").innerHTML="";
	document.getElementById("confirmmail").appendChild(mailok);
	corrmail = -1;
	}
	else{
	var txtok = document.createTextNode("Mail matches the form");

	var mailok = document.createElement("p");
		mailok.setAttribute("style","color:green");	

	mailok.appendChild(txtok);
	document.getElementById("confirmmail").innerHTML="";
	document.getElementById("confirmmail").appendChild(mailok);	
				document.getElementById("emailsignup").setAttribute("style","color:black");

	corrmail=0;
	}
}
}	
function ValidateSignUp(){
	if(passmatch!=0){
		document.getElementById("passwordsignup_confirm").setAttribute("style","color:red");
				event.preventDefault();

	}
	if(corrpass!=0){
		document.getElementById("psw").setAttribute("style","color:red");
				event.preventDefault();


	}
	if(corrmail!=0){
		document.getElementById("emailsignup").setAttribute("style","color:red");
				event.preventDefault();


	}
	if(passmatch!=0 || corrpass!=0 || corrmail!=0){
		alert('Fill the required information correctly');
						event.preventDefault();


	}
}

