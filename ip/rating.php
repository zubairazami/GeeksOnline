<?php  
			require 'core.php';
			require 'connect.php';
			$Button =  $_GET['button'];
			$currentuser =  $_GET['currentuser'];
			$askedby=  $_GET['askedby'];
			$postid =  $_GET['postid'];
			$query  =  "SELECT * FROM postrating WHERE userid=".$currentuser." AND postid =".$postid.";";
			
			$matched_row = 0;
			if($query_run =mysql_query($query))
			{
				$matched_row = mysql_num_rows($query_run);
				if ($matched_row>0) //found not allowed to vote more
				{
					echo false;
				}
				else
				{
					if($Button=="up")
					{
						$postratingupdate = "UPDATE post SET rating = rating+1 WHERE postid =".$postid.";";
						$userratingupdate = "UPDATE userprofile SET rating = rating+1 WHERE userid=".$askedby;
					}
					else
					{
						$postratingupdate = "UPDATE post SET rating = rating-1 WHERE postid =".$postid.";";
						$userratingupdate = "UPDATE userprofile SET rating = rating-1 WHERE userid=".$askedby;
					}

					if($query_run1=mysql_query($postratingupdate)&&$query_run2=mysql_query($userratingupdate))
					{

						if($query_run=mysql_query("SELECT rating FROM post WHERE postid=".$postid.";"))
						{

								if($row=mysql_fetch_assoc($query_run))
								{
									$rate = $row['rating'];
									echo $rate;
								}
								else
								{
				
								}
						}
						else
						{

							
			
						}



						if(mysql_query("INSERT INTO postrating ( `userid` ,`postid` ) VALUES ( ".$currentuser.", ".$postid." );"))
						{

						}
						else
						{
							
						}

					}
					else
					{

					}

				}
			}
			else
			{
				
			}
?>