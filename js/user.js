$(document).ready(function () {
	
	var sid= $("#student_id").val();

				$.ajax({
					type: "GET",
					url: "user_page.php",
					data: {
						student_id: sid,
						functionName:"NumberOfCoursesEnrolledIn"
					},
					success: function(response){
						$("#numberOfCoursesEnrolled").html(response);
					}
				});

				$.ajax({
					type: "GET",
					url: "user_page.php",
					data: {
						student_id:sid,
						functionName:"TopSixCourses"
					},
					success: function(data){
						var obj = $.parseJSON(data);
						console.log(obj);
						var len = obj.length;
						console.log(obj);
						console.log(len);

							$.each(obj, function (i, jsondata) {
							
							var name = jsondata.name;
							var title = jsondata.title;
							var author_name = jsondata.author_name;
							var cost = jsondata.cost;
							var language = jsondata.language;
							var numberOfEnrolledStudents = jsondata.numberOfEnrolledStudents;
							var tr=$("<tr></tr>");
							var td1=$("<td></td>").attr({class:"font-weight-medium"}).text(numberOfEnrolledStudents);

							var td2=$("<td></td>").attr({class:"font-weight-medium"}).text(name);
							var td3=$("<td></td>").attr({class:"font-weight-medium"}).text(title);
							var td4=$("<td></td>").attr({class:"font-weight-medium"}).text(author_name);
							var td5=$("<td></td>").attr({class:"font-weight-medium"}).text(cost);
							var td6=$("<td></td>").attr({class:"font-weight-medium"}).text(language);
							td1.appendTo(tr);

							td2.appendTo(tr);
							td3.appendTo(tr);
							td4.appendTo(tr);
							td5.appendTo(tr);
							td6.appendTo(tr);

							tr.appendTo($("#topcoursesbody"));

				});
			}
			});
				$.ajax({
					type: "GET",
					url: "user_page.php",
					data: {
						functionName:"NumberOfCourses"
					},
					success: function(response){
						$("#numberOfCourses").html(response);
					}
				});
				var table2 = $('#dtBasicExample').DataTable();
					
				$.ajax({
					type: "GET",
					url: "user_page.php",
					data: {
						student_id:sid,
						functionName:"DisplayCourses"
					},
					success: function(data){
						var obj = $.parseJSON(data);

						var len = obj.length;
						console.log(obj);
						console.log(len);

							$.each(obj, function (i, jsondata) {
							var course_id = jsondata.course_id;
							console.log(course_id);
							var name = jsondata.name;
							var title = jsondata.title;
							var start_date = jsondata.start_date;
							var end_date = jsondata.end_date;
							var author_name = jsondata.author_name;
							var cost = jsondata.cost;
							var language = jsondata.language;
							var enroll = jsondata.enroll;
							var d = new Date();
							var month = d.getMonth()+1;
							var day = d.getDate();	
							var year = d.getFullYear();
							var output=year+"-"+month+"-"+day;
							if(enroll == '1'){
							table2.row.add([course_id,name,title,start_date,end_date,author_name,cost,language,'Yes'
							]).draw(false);
							
							}
							else if(new Date(output) > new Date (end_date)){
							table2.row.add([course_id,name,title,start_date,end_date,author_name,cost,language,'Cannot Enroll']).draw(false);

							}
							else{
							table2.row.add([course_id,name,title,start_date,end_date,author_name,cost,language,'No']).draw(false);

							}
							


						});
					}
				});
				    $('#dtBasicExample').on( 'click', 'tr', function () {
					var course_id=table2.row( this ).data().toString().split(",")[0];
					var enroll=table2.row( this ).data().toString().split(",")[8];
					console.log(enroll);
					if(enroll=='No'){
					var box= bootbox.confirm({ 
    size: "small",
    message: "Are you sure you want to enroll?",
    callback: function(result){ 
	if(result){
	$.ajax({
                        method:'GET',
					url: "user_page.php",
					data: {
						functionName:"EnrollInCourse",
						student_id: sid,
						course_id: course_id

					},
					success: function(data){
					location.reload();
						
						
					}
				});
}
else{
box.modal('hide');
}
}
});
				
				}
				else if(enroll=='Yes'){
				bootbox.alert({
    message: "You are already Enrolled",
    size: 'small'
});
				}
else{
	bootbox.alert({
    message: "This course is expired",
    size: 'small'
});
}

					});

	
$("#message2").fadeIn('slow').delay(1000).fadeOut('slow');

  
	
	var table3 = $('#dtBasicExample3').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
 $('#dtBasicExample thead tr').clone(true).appendTo( '#dtBasicExample thead' );
    $('#dtBasicExample thead tr:eq(1) th').each(function (i) {
        var title = $(this).text().replace(' ','');
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 		if(i <=7){

        $( 'input', this ).on( 'keyup change', function () {
            if ( table2.column(i).search() !== this.value ) {
                table2
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
		}
		else{
		$(this).html('');	
		}
    } );
 $('#dtBasicExample3 thead tr').clone(true).appendTo( '#dtBasicExample3 thead' );
    $('#dtBasicExample3 thead tr:eq(1) th').each(function (i) {
        var title = $(this).text().replace(' ','');
		 		if(i <=2){

        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table3.column(i).search() !== this.value ) {
                table3
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
				}
				else{
		$(this).html('');	
		}
    } );
 
    
var dtBasicExample2 = $('#dtBasicExample2').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
 $('#dtBasicExample2 thead tr').clone(true).appendTo( '#dtBasicExample2 thead' );
    $('#dtBasicExample2 thead tr:eq(1) th').each(function (i) {
        var title = $(this).text().replace(' ','');
				 		if(i <=7){

        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
						}
						else{
		$(this).html('');	
		}
						
    } );
 
		$.ajax({
					type: "GET",
					url: "user_page.php",
					data: {
						student_id:sid,
						functionName:"EnrolledCourses"
					},
					success: function(data){
						var obj = $.parseJSON(data);

						var len = obj.length;
						console.log(obj);
						console.log(len);

							$.each(obj, function (i, jsondata) {
							var course_id = jsondata.course_id;
							console.log(course_id);
							var name = jsondata.name;
							var title = jsondata.title;
							var start_date = jsondata.start_date;
							var end_date = jsondata.end_date;
							var author_name = jsondata.author_name;
							var cost = jsondata.cost;
							var language = jsondata.language;
							
							dtBasicExample2.row.add([course_id,name,title,start_date,end_date,author_name,cost,language
							]).draw(false);
							
							
							


						});
					}
				});
dtBasicExample2.on( 'click', 'tr', function () {
					var course_id=dtBasicExample2.row( this ).data().toString().split(",")[0];
				var form = $('<form action="viewsl.php" method="post">' +
'<input type="hidden" name="cid" value="'+course_id+'" />' +
'</form>');
$('body').append(form);

$(form).submit();
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