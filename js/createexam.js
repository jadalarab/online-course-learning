var noofquestions=0;

$(document).ready(function(){
  $("#addq").click(function(){
noofquestions++;
var answers=0;
$("#numberofquestions").val(noofquestions);
	var q=noofquestions;

		var divq = $('<div/>').appendTo('#questions');
		$('<br/>').appendTo(divq);
		var qdesc = $('<input/>').attr({ type: 'text', name: 'q'+q,class:'q'+q, placeholder:'Question'}).appendTo(divq);
qdesc.prop('required',true);
		var score=$('<input/>').attr({ type: 'number', name: 'sq'+q, placeholder:'Score'}).appendTo(divq);
score.prop('required',true);

		var deleteq = $('<input/>').attr({ type: 'button', name: 'dq[]'+q,value:'Delete Question'}).appendTo(divq);
	deleteq.addClass('btn btn-fail btn-fw');

		deleteq.click(function(){
noofquestions--;

$("#numberofquestions").val(noofquestions);

	divq.remove();

	});
		$('<br/>').appendTo(divq);

	var addanswer=$('<input/>').attr({ type: 'button', name: 'addforq'+q+'[]',value:'Add Answer'}).appendTo(divq);
addanswer.addClass('btn btn-success btn-fw');


		$('<br/>').appendTo(divq);
	
	addanswer.click(function(){
answers++;
	var qa = $('<input/>').attr({ type: 'text',value:'',id:answers+"q"+q, name: 'q'+q+'a[]', class:'q'+q+'a',placeholder:'Answer'}).appendTo(divq);
	$(qa).change(function(){
		$(this).val(this.value);
		//alert(qa.val());
	});
qa.prop('required',true);
	var cqa = $('<input/>').attr({value:'', type: 'checkbox',class:'cq'+q+'a', name: 'cq'+q+'a[]'}).appendTo(divq);
	qa.change(function(){
	cqa.val(qa.val());
	});
	var deletea = $('<input/>').attr({ type: 'button',value:'Delete Answer'}).appendTo(divq);
	deletea.addClass('btn btn-fail btn-fw');
	deletea.click(function(){
	qa.remove();
	cqa.remove();

deletea.remove();
	});

	});
	});
$("#exam").submit(function(e){
	if(noofquestions == 0){
		alert("At least there should be one question");
e.preventDefault();
	}
for (var i = 0 ; i < noofquestions+1;i++){
var index=i+1;
$('.q'+index+'a').each(function (index) {
var a = $(this).val();
$('.q'+index+'a').each(function (index2) {
if(a == $(this).val() && index!=index2){
	alert('A question has two same answers');
	e.preventDefault();

}
});
});


if($('.q'+index).length!=0 && $('.cq'+index+'a').length == 0){
alert("A question has no Answers. Try Again");
e.preventDefault();
} 

else if($('.cq'+index+'a').length != 0){
if($('.cq'+index+'a').length == 1){
alert("A question has one Answer. Try Again");
e.preventDefault();
}
else{
$ct = 0 ;
$('.cq'+index+'a').each(function () {
if($(this).is(":checked")){
$ct++;
}
});

if($ct==0){
alert("A question has no Answers. Try Again");
e.preventDefault();
}
}
}
}
});
});
