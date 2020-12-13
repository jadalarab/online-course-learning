$(document).ready(function(){
		$("#send").click(function(){
			//alert($("#mail").val());
$.ajax({
    type: "GET",
    url: "sendmessage.php?message="+$("#messagetosend").val()+"&mail="+$("#mail").val();,
    success: function(response){
        //if request if made successfully then the response represent the data

        
    }
  });
		});
});

