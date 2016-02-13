<?php 
    
    require 'core.php';
    require 'connect.php';
    
    $postid=$_POST['postid'];
    $currentuser= $_SESSION['userid']; 

    $query1 = "SELECT tagname FROM  `tags` ORDER BY  `tags`.`numberofquestions` DESC LIMIT 0 , 18";

    if( $query_run1=mysql_query($query1) )
    {
        $tagName = array();
        while($query_rows = mysql_fetch_assoc($query_run1))
        {
            $tagName[]= $query_rows['tagname'];
        }
    }
    else
    {
        $errorno = mysql_errno();
        $errormessage = mysql_error();
        echo '<script type="text/javascript"> alert("Error ('.$errorno.') : '.$errormessage.'"); </script>';
        die($errorno . " : ". $errormessage);
    }

    $query2 = "SELECT username FROM  `userprofile` ORDER BY  `userprofile`.`rating` DESC LIMIT 0 , 18";

    if( $query_run2=mysql_query($query2) )
    {
        $userName = array();
        while($query_rows = mysql_fetch_assoc($query_run2))
        {
            $userName[]= $query_rows['username'];
        }
    }
    else
    {
        $errorno = mysql_errno();
        $errormessage = mysql_error();
        echo '<script type="text/javascript"> alert("Error ('.$errorno.') : '.$errormessage.'"); </script>';
        die($errorno . " : ". $errormessage);
    }
 ?>

<!DOCTYPE HTML>
<html>
    
    <head>
        <title>Geeks Online</title>
        <link href="/ip/css/grids-min.css" rel="stylesheet" type="text/css" />
        <link href="/ip/css/styledynamic.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        
    <div id="wholesection" >

        <div id="top" >  
            
            <div id="topLogo">
               <img src="/ip/images/logo.png" height="59px"> 
           </div>
           
            <div id="loginregister">

                    <table id="logintable" cellspacing ="5" cellpadding ="5">

                        <tr>
                            <?php echo "<td><a href='/ip/profile.php'>".$_SESSION['username']."</a></td>"; ?>
                            <td><a  href="/ip/logout.php">Log Out</a></td>

                        </tr>


                    </table>
            </div>
        </div>
        <br>
        <br>
        <div id="mainbody" >
            
            <div id="mainbodytop" >
               <table id = "topbuttontable" cellspacing = "0" cellpadding ="0" >
                    <tr>
                         <td><form method = 'POST' action ='/ip/myquestions.php'><input type = "submit" id="topbutton"  name = "myquestions" value = "My Questions" > </form></td>   
                         <td><form method = 'POST' action ='/ip/myanswers.php'> <input type = "submit" id="topbutton"  name = "myanswers" value = "My Answers" ></form></td>
                         <td><form method = 'POST' action ='/ip/home.php'> <input type = "submit" id="topbutton"  name = "" value = "Home" ></form></td>
                         <td><form method = 'POST' action ='/ip/askaquestion.php'> <input type = "submit" id="topbutton"  name = "ask" value = "Ask a Question"></form></td>
                    </tr>
                </table>
            </div>
            <br>
            <br>
            <div id = "container"  class="pure-g-r">
                <div class="pure-u-1-6" id="mainbodyleft">  
                    <table id = "tagstable">
                        <tr><td><span id = "sectionspan"> Top Tags </span> </td> </tr>
                        <?php 
                            if(count($tagName)<=18)
                                $number = count($tagName);
                            else
                                $number = 18;

                            for ($i=0; $i < $number ; $i++) 
                            { 
                               echo "<tr><td><form method = 'POST' action ='/ip/tag.php'><input type='submit' id='tagbutton' name='tagname' value=".$tagName[$i]." ></form></td></tr>";
                            }

                         ?> 
                         <tr><td><form method = 'POST' action ='/ip/alltags.php'><input type='submit' id="tagbutton" name="tagname" value="More Tags" ></form></td></tr>
                    </table>
                </div>
                

                <?php 
                  
                	 $query = "SELECT * FROM  `login` JOIN `post` ON `login`.`userid` = `post`.`userid` WHERE `postid`='".$postid."';";
                   $postheader  =  "";
                   $postdetails =  "";
                   $posttag1    =  "";
                   $posttag2    =  "";
                   $posttag3    =  "";
                   $postrating  =  "";
                   $posttime    =  "";
                   $postseekerid=  "";
                        

                   if($query_run=mysql_query($query))
                   {
                        
                        if($query_rows = mysql_fetch_assoc($query_run))
                        {
                            
                            $postseekerid =  htmlentities($query_rows['userid']);
                            $postseeker   =  htmlentities($query_rows['username']);
                            $postheader   =  htmlentities($query_rows['postheader']);
                            $postdetails  =  htmlentities($query_rows['postdetails']);
                            $posttag1     =  htmlentities($query_rows['tag1']);
                            $posttag2     =  htmlentities($query_rows['tag2']);
                            $posttag3     =  htmlentities($query_rows['tag3']);
                            $postrating   =  htmlentities($query_rows['rating']);
                            $posttime     =  htmlentities($query_rows['time']);
                        }
                        else
                        {
                          $errorno = mysql_errno();
                          $errormessage = mysql_error();
                          echo '<script type="text/javascript"> alert("Error ('.$errorno.') : '.$errormessage.'"); </script>';
                          die($errorno . " : ". $errormessage);
                        }
                   }
                   else
                   {
                      $errorno = mysql_errno();
                      $errormessage = mysql_error();
                      echo '<script type="text/javascript"> alert("Error ('.$errorno.') : '.$errormessage.'"); </script>';
                      die($errorno . " : ". $errormessage);
                   }
                ?>
                <?php  

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
                    $errorno = mysql_errno();
                    $errormessage = mysql_error();
                    echo '<script type="text/javascript"> alert("Error ('.$errorno.') : '.$errormessage.'"); </script>';
                    die($errorno . " : ". $errormessage);
                  }

                  $TotalComment = count($commentid);
                ?>
                <div class="pure-u-2-3" id="bodysection">   
                  <div id="postmain">
<!-- .............................................start of post div ................................................ -->
                    <div id="printingComment">
                        <span >Post Section</span>
                    </div>

                    <div id="postdiv" class="pure-g-r">
            
                        <div id="postdivleft" class="pure-u-1-6">
                    			
                           <button id="upBtn" class="buttonclass"  ><img id ="updown" src="/ip/images/1.png"></button>
                           
                           <div id="ratingdiv"> 

                              <span id ="ratingspan"><?php echo $postrating ?></span>
                              
                           </div>
                           
                           <button id="dnBtn" class="buttonclass"><img src="/ip/images/2.png" id ="updown"></button>
                    			 
                    		</div>
                    		

                        <div id ="postdivright" class="pure-u-5-6">
                    			   <table id ="posttable" cellspacing="3px">

                                  <tr>
                                        <td colspan="5" id="headertd">
                                                  <?php echo $postheader ?>                                            
                                        </td>
                                  </tr> 
                                  
                                  <tr>
                                        <td colspan="5" id = "detailstd">
                                             <p><?php echo $postdetails ?></p> 
                                        </td>
                                  </tr>
                                  <tr>
                                      <td id="footertd"><form method = 'POST' action ='/ip/profile.php'><input type='submit' id='smallbutton' name='username' value='<?php echo $postseeker ?>'></form></td>
                                      <td id="footertd"> <?php echo $posttime; ?> </td>
                                      <td id="footertd"><form method = 'POST' action ='/ip/tag.php'><input type='submit' id='smallbutton' name='tagname' value='<?php echo $posttag1 ?>'></form> </td>
                                      <?php 
                                        if(strtolower($posttag2)!=strtolower('not needed'))
                                        {
                                            echo "<td id='footertd'> <form method = 'POST' action ='/ip/tag.php'><input type='submit' id='smallbutton' name='tagname' value=".$posttag2." ></form>"."</td>";
      
                                        }
                                        if(strtolower($posttag3)!=strtolower('not needed'))
                                        {
                                           echo "<td id='footertd'> <form method = 'POST' action ='/ip/tag.php'><input type='submit' id='smallbutton' name='tagname' value=".$posttag3." ></form>"."</td>";
                                        }
                                      ?>
                                  </tr>
                             </table>  
                        </div>     
                    </div>
                    
<!-- .............................................................end of post div ............................................................-->
                    <br>
                    <div id="printingComment">
                        <span >Comment Section</span>
                    </div>
                    

<!-- ...........................................................start of comment divs ..........................................................-->
                    <div id="commentsection">
                      <?php 
                        for ($i=0; $i < $TotalComment; $i++)
                        { 
                          echo "
                            <div id='commentdiv'>
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
                      ?>
                     </div>

                     <div id="addcomment">

                              <textarea id='commentarea' name='commentarea' required></textarea>
                              <button   id='commentbutton' name='commentbtn' value='<?php echo $postid; ?>'> comment </button>
                     </div>
                    


                  </div>
                </div>
                

                <div class="pure-u-1-6" id="mainbodyright"> 
                    <table id = "topusertable">
                        <tr><td><span id = "sectionspan"> Top Users </span> </td> </tr>
                       <?php 
                            $number = count($userName);
                            for ($i=0; $i < $number ; $i++) 
                            { 
                                echo "<tr><td><form method = 'POST' action ='/ip/profile.php'><input type='submit' id='tagbutton' name='username' value=".$userName[$i]." ></form></td></tr>";
                            }
                       ?> 
                       <tr><td><form method = 'POST' action ='/ip/allprofiles.php'><input type='submit' id="tagbutton" name="username" value="More Users" ></form></td></tr>
                    </table>

                </div>    
            </div> 
        </div>

        <script type="text/javascript">

          var xmlhttp;
          if (window.XMLHttpRequest)
          {
            xmlhttp=new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
          }
          else
          {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
          }


          document.getElementById("upBtn").onclick= function()
          { 
            var up= <?php echo json_encode("rating.php?button=up&askedby=".$postseekerid."&currentuser=".$currentuser."&postid=".$postid); ?>;
            //alert(up);
            xmlhttp.open("GET",up);
            xmlhttp.send();
          }

          document.getElementById("dnBtn").onclick= function()
          { 
            var down = <?php echo json_encode("rating.php?button=down&askedby=".$postseekerid."&currentuser=".$currentuser."&postid=".$postid); ?>;
            //alert(down);
            xmlhttp.open("GET",down);
            xmlhttp.send();
          }
          xmlhttp.onreadystatechange=function()
          {
          
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            {
              var status = xmlhttp.responseText;
              if(status==false)
              {
                alert("You've already voted.");
              }
              else
              {
                document.getElementById("ratingspan").innerHTML=status;
              }
            
            }
          }
         </script>


        <script type="text/javascript">

          var Request;
          if (window.XMLHttpRequest)
          {
             Request=new XMLHttpRequest();
          }
          else
          {
           Request=new ActiveXObject("Microsoft.XMLHTTP");
          }
          document.getElementById("commentbutton").onclick = function()
          {
            var button = document.getElementById("commentbutton").value;
            var text = document.getElementById("commentarea").value; 
            if(!isEmpty(text)&& !isBlank(text))
            {

              text = text.replace(/\r?\n/g, '<br />');
              text = text.replace(/'/g, '"');

              var url = "addcomment.php?id=".concat(button).concat("&text=").concat(text);
              //alert(url);
              Request.open("GET",url,true);
              Request.send();
            }
            else
            {
              alert("Comment field blank.");
            }
          }



          Request.onreadystatechange=function()
          {
            
            var status = Request.responseText;
            if (Request.readyState==4 && Request.status==200)
            {
               if(status==false)
              {
                alert("Error ocured, Check menually");
              }
              else
              {
                    document.getElementById("commentsection").innerHTML = status;
              }
      
            }
          }


          function isEmpty(str) 
          {
            return (!str || 0 === str.length);
          }
          function isBlank(str) 
          {
            return (!str || /^\s*$/.test(str));
          }

        </script>

         <div id="footer">
                <hr>
                <p>Copyright : Zubair Azami Badhon</p>
        </div>
    
    </div>    
    </body>
</html>