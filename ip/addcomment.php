<?php 
  
  require 'core.php';
  require 'connect.php';
    
    $postid = $_GET['id'];
    $comment = $_GET['text'];
    $currentuser = $_SESSION['userid'];

    $flag = true;

    $query = "INSERT INTO comment ( postid, userid, commenttext, rating, time) VALUES ( '".$postid."', '".$currentuser."', '".$comment."', '0', CURRENT_TIMESTAMP);";
    if($query_run = mysql_query($query))
    {

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
                      
              $commentuserid[] =$query_rows['userid'];
              $commentusername[] =$query_rows['username'];
              $commentid[] =$query_rows['commentid'];
              $commenttext[] =$query_rows['commenttext'];
              $commentrating[] =$query_rows['rating'];
              $commenttime[]= $query_rows['time'];
            }
        }
        else
        {
                 echo false;
                 $flag = false;
        }
        $TotalComment = count($commentid);
    }
    else
    {
      echo false;
      $flag = false;
    }
 
 ?>
   <link href="/ip/css/grids-min.css" rel="stylesheet" type="text/css" />
   <link href="/ip/css/styledynamic.css" rel="stylesheet" type="text/css" />

  
                       <?php 
                        if (flag) 
                        {
                          for($i=0; $i < $TotalComment; $i++)
                          { 
                            echo 
                            "<div id='commentdiv'>
                            
                               <table id ='commenttable' cellspacing='3px'>
                                  <tr>
                                    <td colspan='5' id = 'commentdetailstd' >
                                      <p>".$commenttext[$i]."</p> 
                                    </td>
                                  </tr>
                                  <tr>
                                    <td id='commentfootertd'><form method = 'POST' action ='/ip/profile.php'><input type='submit' id='smallbutton' name='username' value=".$commentusername[$i]." ></form></td>
                                    <td id='commentfootertd'>".$commenttime[$i]."</td>
                                    <td id='commentfootertd'>".$commentrating[$i]."</td>
                                    <td id='commentfootertd'><form method = 'POST' action ='/ip/ratecomment.php'> <button id='smallbutton' name='commentid' value=".$commentid[$i].">Rate</button></form></td>
                                  </tr>
                               </table>     
                            </div>";
                          }
                       

                        }
                       ?>  


