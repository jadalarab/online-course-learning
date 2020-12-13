$(document).ready(function(){
			

		
		setInterval(function(){
				
			displayMessagesContacts();

			
		}, 2000);
		setInterval(function(){
				$rid = $('#room_id').val();
				if($rid != ''){
			displayMessages();

			}
		}, 500);
	

	
	$('#send_message').on('click', function(){
			
			$rid = $('#room_id').val();
			$message = $('#messageval').val();
			if($message != ''){
				$.ajax({
					type: "GET",
					url: "send_message.php",
					data: {
						student_id: 0,
						room_id: $rid,
						message: $message,
						student_id_sent:$("#student_sent_id").val()

					},
					success: function(response){
				$('#messageval').val('');
				$("#chat_messages").animate({ scrollTop: $("#chat_messages")[0].scrollHeight}, 1000);
					}
				});
}
				
		});
		function displayMessages(){
			var chat_messages_div = $('#chat_messages');
			$("#message_portal").css("display","block");
			$rid = $('#room_id').val();
			$path=$('#path').val();
			$user=$('#username').val();
				$.ajax({
					type: "GET",
					url: "display_messages.php",
					dataType:"JSON",
					data: {
						room_id: $rid,
					},
					success: function(response){
					chat_messages_div.empty();

					 var len = response.length;
					for(var i=0; i<len; i++){
					$id = response[i].id;
					$message = response[i].message;
					$date=response[i].date_time;
				
				if($id != '0'){	
				$div=$("<div>").attr({class:"container2 darker"});
				$img=$("<img>").attr({src:"uploads/images/"+$path,class:"right"});
				$p=$("<p>").text($message);
				$span=$("<span>").attr({class:"time-left"});
				$span.text($date);
				$img.appendTo($div);
				$p.appendTo($div);
				$span.appendTo($div);
				$div.appendTo(chat_messages_div);
				
				}
				else{
				$div=$("<div>").attr({class:"container2"});
				$img=$("<img>").attr({src:"uploads/images/no-image.jpg"});
				$p=$("<p>").text($message);
				$span=$("<span>").attr({class:"time-right"});
				$span.text($date);
				$img.appendTo($div);
				$p.appendTo($div);
				$span.appendTo($div);
				$div.appendTo(chat_messages_div);


				}
				$('<br/>').appendTo(chat_messages_div);
				$('<br/>').appendTo(chat_messages_div);

				}
					}
				});
		}
	function displayMessagesContacts(){
			var head = $('#head');

		$.ajax({
					type: "GET",
					url: "get_all_messages_contacts.php",
					dataType:"JSON",
					
					success: function(response){
					head.empty();

					 var len = response.length;
					for(var i=0; i<len; i++){
				var th = $("<th>").attr({scope:"col"});
                $crid = response[i].crid;
                $found_unread = response[i].found_unread;
                $username = response[i].username;
				 $sid = response[i].sid;
				$path=response[i].path;
				var btn= $("<input>").attr({type:'button',id:$crid+","+$sid+","+$path+","+$username ,value:$username,class:"btn btn-success btn-fw"});
				btn.addClass("send");
				btn.on('click',function(){
				 $("#room_id").val($(this).attr("id").split(",")[0]);
				 				 $("#student_sent_id").val($(this).attr("id").split(",")[1]);
				 				 $("#path").val($(this).attr("id").split(",")[2]);
				 				 $("#username").val($(this).attr("id").split(",")[3]);

				$.ajax({
					type: "GET",
					url: "admin_chat_room_open.php",
					data: {
						room_id: $("#room_id").val(),
					},
					success: function(){
					}
				});
			});
			console.log($found_unread);
				if($found_unread != "-1"){
				
				var noti_Counter=$("<div>").html($found_unread);
				noti_Counter.appendTo(th);
				}
				btn.appendTo(th);
				th.appendTo(head);


		}
		} }); } });