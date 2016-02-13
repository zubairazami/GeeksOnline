 <?php  
      
      require 'connect.php';
      $postid = 5;
      echo "Hello";
                  $query="SELECT login.userid, login.username, commentid, commenttext, rating, time FROM login JOIN comment ON login.userid = comment.userid WHERE postid =  ".$postid." ORDER BY rating DESC ";
                  
                  if($query_run=mysql_query($query))
                  {
                    $commentuserid = array();
                    $commentusername = array();
                    $commentid = array();
                    $commenttext = array();
                    $commentrating = array();
                    $commenttime= array();

                    while($query_rows = mysql_fetch_assoc($query_run))
                    {
                      
                      echo $commentuserid[] =$query_rows['login.userid']."<br>";
                      echo $commentusername[] =$query_rows['login.username']."<br>";
                      echo $commentid[] =$query_rows['commentid']."<br>";
                      echo $commenttext[] =$query_rows['commenttext']."<br>";
                      echo $commentrating[] =$query_rows['rating']."<br>";
                      echo $commenttime[]= $query_rows['time']."<br>";
                    } 


                  }
                  else
                  {
                    $errorno = mysql_errno();
                    $errormessage = mysql_error();
                    echo '<script type="text/javascript"> alert("Error ('.$errorno.') : '.$errormessage.'"); </script>';
                    die($errorno . " : ". $errormessage);
                  }

                  echo $TotalComment = count($commentid);



                ?>