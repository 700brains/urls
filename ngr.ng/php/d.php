<?php
require_once("db.php");


/*if(isset($_POST['gen'])){*/
$seed = str_split('abcdefghjklmnpqrstuvwxyz'
                 .'ABCDEFGHJKLMNPQRSTUVWXYZ'
                 .'23456789'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 7) as $k) $rand .= $seed[$k];

$Fullurl =$_REQUEST['url'];
/*if(empty($Fullurl))
{
  echo 'Empty Url';
}*/

$OurUrl = 'http://localhost/sUrl/ngr.ng/' . $rand;

$lastseven = $rand;

$OurUrl3 = 'http://localhost/sUrl/ngr.ng/index.php';


$query = mysqli_query($con, "INSERT INTO tables VALUES('','$Fullurl','$OurUrl')") or die(mysql_error());
$query = mysqli_query($con, "INSERT INTO counts VALUES('','$Fullurl','$OurUrl','0','$lastseven')") or die(mysql_error());

if($query){
//$_SESSION['akc'] =  "Generated";
echo '<a href="'.$OurUrl3.'?id='.$OurUrl.'" class="alert-link" id="shortend-url">http://localhost/sUrl/ngr.ng/'.$rand.'</a><br/>';
 
//echo '<span>http://localhost/sUrl/ngr.ng/'.$rand.'</span>';
}
else{
 echo   "Error Occured";
}
/*}*/
