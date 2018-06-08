<?php
	
	require_once 'php/dbconfig.php';

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
		
			

			$stmt = $db_con->prepare("INSERT INTO lists(real_url,short_url,count,lastseven) VALUES(:rurl, :oururl, :count, :lstseven)");
			$stmt->bindParam(":rurl",$Realurl);
			$stmt->bindParam(":oururl",$OurUrl);
			$stmt->bindParam(":count",$count);
			$stmt->bindParam(":lstseven",$lastseven);

/*
			
				
			$stmt = $db_con->prepare("INSERT INTO tables(real_url,short_url) VALUES(:rurl, :oururl)");
			$stmt->bindParam(":rurl",$Realurl);
			$stmt->bindParam(":oururl",$OurUrl);*/
			


					
				if($stmt->execute())
				{
					

				echo	' Your Shortened URL is  <a href="'.$OurUrl3.'?id='.$OurUrl.'" class="alert-link" id="shortend-url">http://localhost/sUrl/ngr.ng/'.$rand.'</a><br/> Click copy to copy to clipoard.';
				}
				else
				{
					echo "Query could not execute !";
				}
			
			
			
				
		}
		catch(PDOException $e){
			//echo $e->getMessage();
			echo "Something went wrong try again Or Contact the System Administrative";
		}
	}

?>