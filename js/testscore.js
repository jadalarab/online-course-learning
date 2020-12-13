$(document).ready(function(){
	var total_score=0;

 var noq=parseInt($("#noofq").val());
	for(var i = 0 ; i < noq; i++){
	var index = i+1;
		var sq=parseInt($(".sq"+index).html());
		total_score+=sq;

	}
	$("#note").html("The total score on this quiz is "+	total_score);

$("#test").click(function(){
	var score=0;
	for(var i = 0 ; i < noq; i++){
	var index = i+1;
	var sq=parseInt($(".sq"+index).html());
	var user_answers= $(".aq"+index);
	var correct_answers= $(".cq"+index).val().split(',');
var moreone=0;
var oneanswer=0;
var answered=0;
for(var j = 0 ; j < correct_answers.length;j++){
var val=correct_answers[j];

for(var k = 0 ; k < user_answers.length;k++){

if($(user_answers[k]).is(":checked") && $(user_answers[k]).val() == val){

if(correct_answers.length >= 2){
moreone++;
score +=(parseInt(sq)/correct_answers.length);
}
else{
score +=parseInt(sq);
oneanswer++;
$("#status"+index).html("Correct Answer");

}
}

}

}
for(var k = 0 ; k < user_answers.length;k++){
if($(user_answers[k]).is(":checked") == false){
answered++;
}
}

if(answered == user_answers.length){
$("#status"+index).html("Please Answer this");

}

else if(oneanswer!=0 && moreone ==0){
var uncorrect_checked=0;
for(var k = 0 ; k < user_answers.length;k++){
if($(user_answers[k]).is(":checked") && jQuery.inArray($(user_answers[k]).val(),correct_answers) < 0){

uncorrect_checked++;

}

}
if(uncorrect_checked != 0){
$("#status"+index).html("There is wrong Answer checked");
score -=sq;
}else{
$("#status"+index).html("Correct Answer");
}
}

else if(moreone !=0 && moreone != correct_answers.length && oneanswer==0){
$("#status"+index).html("Uncomplete answer");

}
else if(moreone !=0 && moreone == correct_answers.length && oneanswer==0){
var uncorrect_checked=0;
for(var k = 0 ; k < user_answers.length;k++){
if($(user_answers[k]).is(":checked") && jQuery.inArray($(user_answers[k]).val(),correct_answers) < 0){

uncorrect_checked++;

}

}
if(uncorrect_checked != 0){
$("#status"+index).html("There is wrong Answer checked");
score -=sq;
}
else{
$("#status"+index).html("Correct Answer");
}
}
else{
$("#status"+index).html("Wrong Answer");

}
}

$("#result").html("Your score on this quiz is "+score+ "/"+total_score);
});

});
