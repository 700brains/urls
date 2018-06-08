<?php
	
	require_once '../php/dbconfig.php';

	if($_POST)
	{
		$Realurl = $_POST['url'];
		
		
		try
		{	
			$seed = str_split('abcdefghjklmnpqrstuvwxyz'
                 .'ABCDEFGHJKLMNPQRSTUVWXYZ'
                 .'23456789'); // and any other characters
			shuffle($seed); // probably optional since array_is randomized; this may be redundant
			$rand = '';
			foreach (array_rand($seed, 7) as $k) $rand .= $seed[$k];

			$OurUrl = 'http://localhost/sUrl/ngr.ng/' . $rand;

			$lastseven = $rand;

			$OurUrl3 = 'http://localhost/sUrl/ngr.ng/index.php';

			$count = 0;
		
			
			
				
			$stmt = $db_con->prepare("INSERT INTO tables(real_url,short_url) VALUES(:uname, :oururl)");
			$stmt->bindParam(":rurl",$Realurl);
			$stmt->bindParam(":oururl",$OurUrl);
			


			$stmt = $db_con->prepare("INSERT INTO count(real_url,short_url,count,lastseven) VALUES(:rurl, :oururl, :count, :lstseven)");
			$stmt->bindParam(":rurl",$Realurl);
			$stmt->bindParam(":oururl",$OurUrl);
			$stmt->bindParam(":count",$count);
			$stmt->bindParam(":lstseven",$lastseven);



					
				if($stmt->execute())
				{
					echo "generated";

					$_SESSION['link']  = '<a href="'.$OurUrl3.'?id='.$OurUrl.'" class="alert-link" id="shortend-url">http://localhost/sUrl/ngr.ng/'.$rand.'</a><br/>';
				}
				else
				{
					echo "Query could not execute !";
				}
			
			
			else{
				
				echo "1"; //  not available
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>