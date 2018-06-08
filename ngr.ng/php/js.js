

$(document).ready(function (e) {
$("#message").hide();
 // $('#loading').hide();
$("#gen").on('submit',(function(e) {
e.preventDefault();
//$("#message").empty();
//$('#loading').show();
$.ajax({
url: "defaultc.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
  $("#message").show();
//$('#loading').hide();
$("#message").html(data);

}
});
}));
});