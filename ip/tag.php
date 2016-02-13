<?php 
    
    require 'core.php';
    require 'connect.php';
    $tagname = $_POST['tagname'];

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
        $error =  mysql_error();
        die($error);
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
        $error =  mysql_error();
        die($error);
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
               <table id = "topbuttontable" cellspacing = "0px" cellpadding ="0px" >
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
                

                <div class="pure-u-2-3" id="bodysection">   

                    <div id="homemain">

                        <?php 
                        	

                            $query1 = "SELECT `postid`, `post`.`userid`, `username`, `postheader`, `tag1`, `tag2`, `tag3`, `post`.`rating`, `time` FROM `post` JOIN `userprofile` ON `post`.`userid` = `userprofile`.`userid` WHERE `tag1` = '".$tagname."' OR `tag2` = '".$tagname."' OR `tag3` = '".$tagname."' ORDER BY `post`.`time` DESC";
                    
                            if($query_run1=mysql_query($query1))
                            {
                           
                                $postid = array();
                                $userid = array();
                                $username = array();
                                $postheader = array();
                                $tag1 = array();
                                $tag2 = array();
                                $tag3 = array();
                                $rating = array();
                                $time = array();

                                while($query_rows = mysql_fetch_assoc($query_run1))
                                {
                                    $postid[]    = $query_rows['postid'];
                                    $userid[]    = $query_rows['userid'];
                                    $username[]  = $query_rows['username'];
                                    $temp = $query_rows['postheader'];
                                    if(strlen($temp)>65)
                                    {
                                        $temp = substr($temp, 0,64)." . . ."; 
                                    }
                                    $postheader[]= $temp;
                                    $tag1[]      = $query_rows['tag1'];
                                    $tag2[]      = $query_rows['tag2'];
                                    $tag3[]      = $query_rows['tag3'];
                                    $rating[]    = $query_rows['rating'];
                                    $time[]      = $query_rows['time'];
                                }

                                $size = count($postid);

                                for($i=0;$i<$size;$i++)
                                {
                                    echo '
                                        <div id="questiondiv">
                                            <table id="questiontable" cellspacing="2px" cellpadding="0px">
                                                <tr>
                                                    <td id="questiontablequestiontd" colspan="6"> 
                                                        <form method = "POST" action ="/ip/post.php"> 
                                                            <button  name="postid"  id="questionbutton" value="'.$postid[$i].'">'.$postheader[$i].'</button>
                                                        </form> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id = "smalltd">
                                                        <span id="smalltext"> Rating : '.$rating[$i].'</span>
                                                    </td>
                                                    
                                                    <td id = "smalltd2">
                                                        <form method = "POST" action ="/ip/profile.php"> <button name="username" id="smallbutton" value="'.$username[$i].'">'.$username[$i].'</button></form>
                                                    </td>
                                                    
                                                    <td id = "smalltd">
                                                        <span id="smalltext">'.$time[$i].'</span>
                                                    </td>
                                                    
                                                    <td id = "smalltd2">
                                                        <form method = "POST" action ="/ip/tag.php"> <button name="tagname"  id="smallbutton" value="'.$tag1[$i].'">'.$tag1[$i].'</button></form>
                                                    </td>';
                                    if(strtolower($tag2[$i])!="not needed")
                                    {
                                        echo    '
                                                    <td id = "smalltd">
                                                       <form method = "POST" action ="/ip/tag.php"> <button name="tagname"  id="smallbutton" value="'.$tag2[$i].'">'.$tag2[$i].'</button></form>
                                                    </td>
                                                ';
                                    }
                                    // else
                                    // {
                                    //     echo '<td id = "smalltd"></td>';
                                    // }

                                    if(strtolower($tag3[$i])!="not needed")
                                    {
                                        echo    '
                                                    <td id = "smalltd2">
                                                       <form method = "POST" action ="/ip/tag.php"> <button  name="tagname" id="smallbutton" value="'.$tag3[$i].'">'.$tag3[$i].'</button></form>
                                                    </td>
                                                ';
                                    }
                                    // else
                                    // {

                                    //     echo '<td id = "smalltd2"></td>';
                                    // }                 
                                    echo ' 
                                                </tr>
                                            </table>
                                        </div>';
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


         <div id="footer">
                <hr>
                <p>Copyright : Zubair Azami Badhon</p>
        </div>
    </div>    
    </body>
</html>