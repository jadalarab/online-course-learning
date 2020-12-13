$(document).ready(function () {

	var course_id= $("#course_id").val();

				
				
				var table = $('#dtBasicExample').DataTable();
					
				$.ajax({
					type: "GET",
					url: "user_page.php",
					data: {
						course_id:course_id,
						functionName:"CourseLectures"
					},
					success: function(data){
						var obj = $.parseJSON(data);

						var len = obj.length;
						console.log(obj);
						console.log(len);

							$.each(obj, function (i, jsondata) {
							var lecture_id = jsondata.lecture_id;

							var lecture_title = jsondata.lecture_title;
							var lecture_path = jsondata.lecture_file;
							var lecture_exam = jsondata.lecture_exam;
							
							if(lecture_exam != '0'){
							table.row.add([lecture_id,lecture_title,lecture_path,"Yes"
							]).draw(false);
							
							}
							else{
table.row.add([lecture_id,lecture_title,lecture_path,"No Exam Found"
							]).draw(false);
								}
							


						});
					}
				});
				    $('#dtBasicExample').on( 'click', 'tr', function () {
					var lecture_id=table.row( this ).data().toString().split(",")[0];
					var lecture_path=table.row( this ).data().toString().split(",")[2];
					var lecture_exam=table.row( this ).data().toString().split(",")[3];	
					if(lecture_exam=='Yes'){
var form="<div style='display:inline;'><a style='float:left;' href='"+lecture_path+"' download><button class='btn btn-success btn-fw'>Download Lecture</button></a><form style='float:left;margin-left:10px;' method='post' action='solveexam.php'><input type='hidden' name='lecture_id' value='"+lecture_id+"'/><input class='btn btn-success btn-fw' type='submit' value='Solve Exam'/></form></div>";
bootbox.dialog({

 message: form,
callback: function (result) {
        console.log(result);
    }
});
			}
else{
var form="<a href='"+lecture_path+"' download><button value='Download'>Download</button></a>"
bootbox.dialog({

 message: form,
callback: function (result) {
        console.log(result);
    }
});

}	
	
});
				
				

	

  
	
	
    

 
		
		var sid= $("#student_id").val();

				$.ajax({
					type: "GET",
					url: "user_chat_room_close.php",
					data: {
						student_id: sid,
					},
					success: function(){
					}
				});
		setInterval(function(){ 
				$.ajax({
					type: "GET",
					url: "get_user_messages_notifications.php",
					data: {
						student_id: sid,
					},
					success: function(data){
					if(data != 0){
					$("#notification_counter").html(data);
					
				}
}
				});
},500);
});