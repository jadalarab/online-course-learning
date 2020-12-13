$(document).ready(function(){
	var sid= $("#student_id").val();

				$.ajax({
					type: "GET",
					url: "user_chat_room_open.php",
					data: {
						student_id: sid
					},
					success: function(){
					}
				});
		
		setInterval(function(){
				$rid = $('#room_id').val();
				if($rid != ''){
			displayMessages();

			}
		}, 500);
	
	$('#open_chat_room').on('click', function(){
				$sid = $('#student_id').val();

				$.ajax({
					type: "GET",
					url: "open_chat_room.php",
					data: {
						student_id: $sid,
					},
					success: function(){
					location.reload();
					}
				});
				
		});
	
	$('#send_message').on('click', function(){
						$sid = $('#student_id').val();

			$rid = $('#room_id').val();
			$message = $('#messageval').val();
			if($message != ''){
				$.ajax({
					type: "GET",
					url: "send_message.php",
					data: {
						student_id: $sid,
						room_id: $rid,
						message: $message

					},
					success: function(){
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
				$path=$('#path').val();
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
	 });