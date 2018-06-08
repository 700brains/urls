/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/

$('document').ready(function()
{ 
     /* validation */
	 $("#gen").validate({
      rules:
	  {
			url: {
			required: true,
			},
			
	   },
       messages:
	   {
            url:{
                      required: "please enter your url"
                     },
           
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* login submit */
	   function submitForm()
	   {		
			var data = $("#gen").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'register.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#shorten").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Generating ...');
			},
			success :  function(response)
			   {						
					if(response=="generated"){
									
						$("#shorten").html('<img src="btn-ajax-loader.gif" /> &nbsp; Generated ...');
						//setTimeout(' window.location.href = "home.php"; ',4000);
						$("#message").html(response);
					}
					else{
									
						$("#message").fadeIn(1000, function(){						
				$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
											$("#shorten").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Try Again');
									});
					}
			  }
			});
				return false;
		}
	   /* login submit */
});