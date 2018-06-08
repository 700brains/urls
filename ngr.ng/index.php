
<?php
include('php/db.php');

if(isset($_GET['id'])){
  $goto = $_GET['id'];
   $r = $goto;
  $lastseven= substr($r, -7);
 
  /////////////////Count It///////////////////
   $q = mysqli_query($con, "SELECT count FROM lists WHERE lastseven='$lastseven'")or die(mysql_error());
  while ($row = mysqli_fetch_assoc($q)) {
    $Count_Clicks = $row['count'];
      $UpLastSeven = $Count_Clicks + 1;
      $Set = mysqli_query($con, "UPDATE lists SET count='$UpLastSeven' WHERE lastseven='$lastseven'")or die(mysql_error());
 }

  $q = mysqli_query($con, "SELECT real_url FROM lists WHERE short_url='$r'")or die(mysql_error());
  while ($row = mysqli_fetch_assoc($q)) {
    $roww = $row['real_url'];

    ?>
<script type="text/javascript">
  var dirurl ='<?php echo $roww;  ?>';
 setInterval(function(){window.location.replace(dirurl);}, 3000);
//alert(dirurl);
</script>
<?php   
  }
}




?>


<!doctype html>
<html lang="en">
  <head><script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- js -->
    <script src="script.js"></script>
    <script src="jquery-1.11.3-jquery.min.js"></script>
    <!-- custom css -->
     <link rel="stylesheet" href="css/style.css" >
      <link rel="stylesheet" href="css/font-awesome.min.css" >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>NGR.NG :: Home</title>

  </head>
  <body>
  
        <div class="container-fluid head">
          <div class="row ">
            <div class="head-accent col-md-4 col-sm-12 col-xs-12">
              <span>
                <ul class="tc">
                    <li class="social-item"><a href=""><span class="fa fa-twitter"></span></a></li>
                    <li class="social-item"><a href=""><span class="fa fa-facebook"></span></a></li>
                    <li class="social-item"><a href=""><span class="fa fa-linkedin"></span></a></li>
                    <li class="social-item"><a href=""><span class="fa fa-google-plus"></span></a></li>
                  </ul>
              </span>
            </div>
            <div class="head-accent  col-md-8 col-sm-12 col-xs-12">
              <marquee behavior="" direction="horizontal">Simplicity isn't simple! and less is more. So shorten that URL to make is sharable.</marquee>
            </div>
             
          </div>
        </div>

      <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top nav-bg0">
        <a class="navbar-brand" href="#">Ngr.ng</a>
        <button style ="border: none; " class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span style="color: teal; " class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
             <a class="nav-link" href="#">Shorten URL <span class="sr-only">(current)</span></a>
           </li>
            <li class="nav-item">
             <a class="nav-link" href="#">Analytics</a>
           </li>
            <li class="nav-item">
             <a class="nav-link" href="#">SEO</a>
           </li>
            <li class="nav-item">
             <a class="nav-link" href="#">Digital Marketing</a>
           </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <span class="nav-form">
              <a class="btn btn-outline-success" data-toggle="modal" data-target="#signup" href="">Signup </a>
              <a class="btn btn-outline-success" data-toggle="modal" data-target="#login" href="">Login</a>
            </span>
          </form>
        </div>
      </nav> 

      <!-- Modal  login-->
      <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Signup</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" >
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Email:</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Password:</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Comfirm password:</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-success">Signup</button>
            </div>
          </div>
        </div>
      </div>

        <!-- Modal signup -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="index.php">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Email:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Password:</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Login</button>
              </div>
            </div>
          </div>
        </div>
  
      
        <div class="jumbotron-fluid jumbo">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xm-12 text-center" style="margin-top:80px;">

                <h1 class="display-4">Make it sharable</h1>
                <h3>Shorten it</h3><br><br>
            
                <br>
                <br>
                
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="card card-area-btn">
                  <div class="card-body">
                        <form method="post" id="gen">
                          <div class="row">
                            <div class="col-md-10">
                              <div class="form-group col-md-12">
                                <input type="text" required="" id="url" class="form-control" id="recipient-name" name="url" placeholder="Enter URL to shorten">
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="form-group">
                                  <button  class=" btn btn-outline-success col-sm-12 col-xs-12 " id="shorten">Shorten URL</button>
                              </div>
                            </div>
                          </div>
                        </form>
                  </div>
                </div>
               </div>
            </div>
          </div>
        </div>

        
       <div class="container display-url-div"><!-- start of shortened url  div -->
       <div class="row">
         <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
          <div class="card shorten-area">
            <div class="card-body">
               <h5 class="card-title">Shortend URL</h5>
               <div class="row">
                 <div class="col-md-10">
                    <div class="alert alert-success" role="alert" id="message">
                       xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

                    </div>
                  </div>
                 <div class="col-md-2">
                    <button class=" btn btn-outline-success col-sm-12 col-xs-12 " onclick="copyToClipboard('#shortend-url')">Copy</button>
                  </div>
               </div>
            </div>
          </div>
         </div>
       </div>
     </div><!-- end of shortened url  div -->


    <div class="container landing-lead">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">Reach more, achieve more, get more result</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.</p>
              <p>Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur</p>
        </div>
      </div>
    </div>


    <div class="container biz-info" style="">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <span style="font-size: 5em;" class="fa fa-cog"></span>
              <h1>SEO</h1>
              <p style="text-align:left;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <br>
    <br>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12"><br>
            <h5 class="text-center"> &copy; 2018  ngr.ng All right reserved</h5><hr>
            <div class="row">
              <div class="col-md-4">
                <h6>Social</h6>
                <ul class="tc">
                  <li class="social-item"><a href=""><span class="fa fa-twitter"></span></a></li>
                  <li class="social-item"><a href=""><span class="fa fa-facebook"></span></a></li>
                  <li class="social-item"><a href=""><span class="fa fa-linkedin"></span></a></li>
                  <li class="social-item"><a href=""><span class="fa fa-google-plus"></span></a></li>
                </ul>
              </div>
              <div class="col-md-4">
                <h6>Terms of Service</h6>
              </div>
              <div class="col-md-4">
                <h6>Privacy policy</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </footer>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
      /*const span = document.querySelector("span");

span.onclick = function() {
  document.execCommand("copy");
}

span.addEventListener("copy", function(event) {
  event.preventDefault();
  if (event.clipboardData) {
    event.clipboardData.setData("text/plain", span.textContent);
    console.log(event.clipboardData.getData("text"))
  }
});*/

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}




 $(document).ready(function (e) {
  //$("#message").hide();
$("#gen").on('submit',(function(e) {
e.preventDefault();
//$("#cmessage").empty();
//$('#cloading').show();
$.ajax({
url:"gen.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
  //$("#cmessage").show();
$("#message").html(data);

}
});
}));

});


















    </script>
  </body>

</html>