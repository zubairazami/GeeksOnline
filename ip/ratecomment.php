<?php 
    
    require 'core.php';
    require 'connect.php';
    
    $commentid=$_POST['commentid'];
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

                  $query="SELECT * FROM login JOIN comment ON login.userid = comment.userid WHERE commentid = ".$commentid;
                  
                  if($query_run=mysql_query($query))
                  {
                    $commentpostid="";
                    $commentuserid = "";
                    $commentusername = "";
                    $commentid = "";
                    $commenttext = "";
                    $commentrating = "";
                    $commenttime= "";
                    

                    if($query_rows = mysql_fetch_assoc($query_run))
                    {
                      $commentpostid   = $query_rows['postid'];
                      $commentuserid   = $query_rows['userid'];
                      $commentusername = $query_rows['username'];
                      $commentid       = $query_rows['commentid'];
                      $commenttext     = $query_rows['commenttext'];
                      $commentrating   = $query_rows['rating'];
                      $commenttime     = $query_rows['time'];
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


                <!-- ______________________________________________ _________________________________________________ -->


                <div id = "mainbodymiddle" class ="pure-u-2-3" >
                                    <h1>Comment Rating</h1>
                  <div id="postdiv" class="pure-g-r">
                        <div id="postdivleft" class="pure-u-1-6">
                          
                           <button id="upBtn" class="buttonclass2"  ><img id ="updown" src="/ip/images/1.png"></button>
                           
                           <div id="ratingdiv"> 

                              <span id ="ratingspan"><?php echo $commentrating ?></span>
                              
                           </div>
                           
                           <button id="dnBtn" class="buttonclass2"><img src="/ip/images/2.png" id ="updown"></button>
                           
                        </div>
                        

                        <div id ="postdivright" class="pure-u-5-6">
                             <table id ="posttable" cellspacing="3px">
      
                                  <tr>
                                        <td colspan="5" id = "detailstd">
                                             <p><?php echo $commenttext ?></p> 
                                        </td>
                                  </tr>
                                  <tr>
                                      <td id="footertd"><form method = 'POST' action ='/ip/profile.php'><input type='submit' id='smallbutton' name='username' value=<?php echo $commentusername ?>></form></td>
                                      <td id="footertd"> <?php echo $commenttime; ?> </td>
                                      <td id ="footertd"><form method = 'POST' action ='/ip/post.php'><button id='smallbutton' name='postid' value=<?php echo $commentpostid ?>> Post </button>
                                       
                                  </tr>
                             </table>  
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
                var up= <?php echo json_encode("commentrating.php?button=up&askedby=".$commentuserid."&currentuser=".$currentuser."&commentid=".$commentid); ?>;
                //alert(up);
                xmlhttp.open("GET",up);
                xmlhttp.send();
              }
    
              document.getElementById("dnBtn").onclick= function()
              { 
                var down = <?php echo json_encode("commentrating.php?button=down&askedby=".$commentuserid."&currentuser=".$currentuser."&commentid=".$commentid); ?>;
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