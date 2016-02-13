<?php  
			require 'core.php';
			require 'connect.php';
			
			$Button =  $_GET['button'];
			$currentuser =  $_GET['currentuser'];
			$askedby=  $_GET['askedby'];
			$commentid =  $_GET['commentid'];
			$query  =  "SELECT * FROM commentrating WHERE userid=".$currentuser." AND commentid =".$commentid.";";
			
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
						$postratingupdate = "UPDATE comment SET rating = rating+1 WHERE commentid =".$commentid.";";
						$userratingupdate = "UPDATE userprofile SET rating = rating+1 WHERE userid=".$askedby;
					}
					else
					{
						$postratingupdate = "UPDATE comment SET rating = rating-1 WHERE commentid =".$commentid.";";
						$userratingupdate = "UPDATE userprofile SET rating = rating-1 WHERE userid=".$askedby;
					}

					if($query_run1=mysql_query($postratingupdate)&&$query_run2=mysql_query($userratingupdate))
					{

						if($query_run=mysql_query("SELECT rating FROM comment WHERE commentid=".$commentid.";"))
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

						if(mysql_query("INSERT INTO commentrating ( `userid` ,`commentid` ) VALUES ( ".$currentuser.", ".$commentid." );"))
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