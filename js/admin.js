$(document).ready(function () {
			$("#message").fadeIn('slow').delay(1000).fadeOut('slow');
			$("#message2").fadeIn('slow').delay(1000).fadeOut('slow');

var table = $('#dtBasicExample').DataTable( {

        orderCellsTop: true,
        fixedHeader: true
    } );
	  var table5 = $('#dtBasicExample5').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
	 var table4 = $('#dtBasicExample4').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
 $('#dtBasicExample thead tr').clone(true).appendTo( '#dtBasicExample thead' );
    $('#dtBasicExample thead tr:eq(1) th').each(function (i) {
        var title = $(this).text().replace(' ','');
		console.log(title);	
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
		
		
    } );
 
   
	$('#dtBasicExample4 thead tr').clone(true).appendTo( '#dtBasicExample4 thead' );
    $('#dtBasicExample4 thead tr:eq(1) th').each(function (i) {
        var title = $(this).text().replace(' ','');
		console.log(title);	
		if(i <=3){
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table4.column(i).search() !== this.value ) {
                table4
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
 
  
    $('#dtBasicExample5 thead tr').clone(true).appendTo( '#dtBasicExample5 thead' );
    $('#dtBasicExample5 thead tr:eq(1) th').each(function (i) {
        var title = $(this).text().replace(' ','');
		if(i <=2){
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table5.column(i).search() !== this.value ) {
                table5
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
 
 
	$notifcation_counter=0;
		$.ajax({
					type: "GET",
					url: "admin_chat_room_close.php",
					data: {
						student_id: '0',
					},
					success: function(){
					}
				});
		setInterval(function(){ 
				$.ajax({
					type: "GET",
					url: "get_admin_messages_notifications.php",
					success: function(data){
					if(data != 0){
					$notifcation_counter=data;
					$("#noti_Counter").html(data);
					$("#notification_counter").html(data);
					$("#notifications").empty();
					var div=$("<div>").html(data + " new messages are available");
						div.appendTo($("#notifications"));
}
}
				});
},500);
        // ANIMATEDLY DISPLAY THE NOTIFICATION COUNTER.
        $('#noti_Counter')
            .css({ opacity: 0 })
            .css({ top: '-10px' })
            .animate({ top: '-2px', opacity: 1 }, 500);
$('#noti_Button').click(function () {

            // TOGGLE (SHOW OR HIDE) NOTIFICATION WINDOW.
            $('#notifications').fadeToggle('fast', 'linear', function () {
                if ($('#notifications').is(':hidden')) {
                    $('#noti_Button').css('background-color', '#2E467C');
                }
                // CHANGE BACKGROUND COLOR OF THE BUTTON.
                else $('#noti_Button').css('background-color', '#FFF');
            });

            $('#noti_Counter').fadeOut('slow');     // HIDE THE COUNTER.

            return false;
        });

        // HIDE NOTIFICATIONS WHEN CLICKED ANYWHERE ON THE PAGE.
        $(document).click(function () {
            $('#notifications').hide();

            // CHECK IF NOTIFICATION COUNTER IS HIDDEN.
            if ($('.noti_Counter').is(':hidden')) {
                // CHANGE BACKGROUND COLOR OF THE BUTTON.
                $('#noti_Button').css('background-color', '#2E467C');
            }
        });

	$("#submitlecture").submit(function(e){
		
	 var file =$('#lecturefile')[0].files[0];
    if(file && file.size < 10485760) { // 10 MB (this size is in bytes)
        //Submit form        
    } else {
        //Prevent default and display error
			alert('File is too large');

        e.preventDefault();
    }
	});
});