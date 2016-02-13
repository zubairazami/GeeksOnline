<?php 
    require 'core.php';
    require 'connect.php';

    $query1 = "SELECT tagname FROM  `tags` ORDER BY  `tags`.`numberofquestions` DESC ";

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


    $query2 = "SELECT username FROM  `userprofile` ORDER BY  `userprofile`.`rating` DESC LIMIT 0 , 14";

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
                

                <div class="pure-u-2-3" id="bodysection">   
                    <div id="askaquestionmain" >

                            <form method = 'POST' action ='/ip/askaquestion.php'>
                                <table id="askaquestiontable" cellspacing ="0px" cellpadding = "0px">
                                
                                    <tr>    
                                            <td colspan = "2" align ="center">
                                                    <a href="/ip/askaquestion.php"><h1> Ask your Question </h1></a>
                                            </td>   
                                    </tr>   
                                    <tr>
                                        <td id="tabletexttd"><span id = "questiontitle"> Question Title    :   </span></td>
                                        <td id = "tablefieldtd">
                                            <input type='text' id="titlefield" name="title" value="Be specific in your title" required/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="tabletexttd"><span id = "questiontitle"> Question Details  :   </span></td>
                                        <td id = "tablefieldtd"> <textarea id = 'questionarea' name='questionarea' required></textarea>   </td>
                                    </tr> 

                                    <tr>
                                        <td id = "tabletexttd">
                                                <input type ='radio' id='tagradio' name ='tag' value ='given' checked>
                                                <label for='tagradio'><span id='questiontitle'>Tag : </span></label>
                                         </td>
                                        <td  id = "tablefieldtd" colspan = "3"> 
                                            <select id = "taglist"  name = 'tag1' value = ''>
                                                <?php 
                                                        for($i=0;$i<count($tagName);$i++)
                                                        {
                                                            echo "<option value=".$tagName[$i].">".$tagName[$i]."</option>";
                                                        }


                                                 ?>

                                            </select>  
                                            <select id = "taglist" name = 'tag2' value = ''>
                                                <option>not needed</option> 
                                                <?php 
                                                        for($i=0;$i<count($tagName);$i++)
                                                        {
                                                            echo "<option value=".$tagName[$i].">".$tagName[$i]."</option>";
                                                        }


                                                 ?>

                                            </select>  
                                            <select id = "taglist" name = 'tag3' value = ''>
                                                <option>not needed</option> 
                                                <?php 
                                                        for($i=0;$i<count($tagName);$i++)
                                                        {
                                                            echo "<option value=".$tagName[$i].">".$tagName[$i]."</option>";
                                                        }
                                                 ?>

                                            </select>  
                                        </td>
                                    </tr> 
                                    <tr>
                                         <td id = "tabletexttd">
                                                <input type ='radio' id='tagradio2' name ='tag' value =''>
                                                <label for='tagradio2'><span id='questiontitle'>Can't find my Tag : </span></label>
                                         </td>
                                         <td id = "tablefieldtd">
                                            <input type='text' id="titlefield" name="othertagfield" value='othertag'/>
                                         </td>
                                    </tr>
                                    <tr>
                                         <td colspan="4" rowspan="2" > 
                                            <input type = "submit" id="askbutton"  name = "ask" value = "Ask" >
                                         </td>

                                    </tr>   

 
                                </table>
                               

                            </form>
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

<?php 

        if(isset($_POST['ask']) && !empty($_POST['ask']))
        {

            $username = $_SESSION['username'];
            $title = htmlentities($_POST['title']);
            $questionarea = htmlentities($_POST['questionarea']);
            $tagselection = htmlentities($_POST['tag']);
            $tag1 = htmlentities($_POST['tag1']);
            $tag2 = htmlentities($_POST['tag2']);
            $tag3 = htmlentities($_POST['tag3']);
            $other = htmlentities($_POST['othertagfield']);
        }

        if( !empty($username) && !empty($title) && !empty($questionarea) && !empty($tag1) && !empty($tag2) && !empty($tag3))   // checking if the fields are filled as required
        {  
            if($tagselection=="given")
            {
                
                $rating = 0;
                $insertCommand = " INSERT INTO `geeksonline`.`post` (`userid` ,`postheader` ,`postdetails` ,`tag1` ,`tag2` ,`tag3` ,`rating` ,`time`)VALUES ('".$_SESSION['userid']."', '".$title."', '".$questionarea."', '".$tag1."', '".$tag2."', '".$tag3."', '".$rating."',CURRENT_TIMESTAMP);";
                if(mysql_query($insertCommand)) 
                {   
                    $numberoftags = 0;
                    if($tag1!="not needed")
                    {

                        if(mysql_query("UPDATE `geeksonline`.`tags` SET numberofquestions = numberofquestions+1 WHERE `tags`.`tagname` = '".strtolower($tag1)."';"))
                        {
                           $numberoftags++;
                        }
                    }
                    if($tag2!="not needed")
                    {

                        if(mysql_query("UPDATE `geeksonline`.`tags` SET numberofquestions = numberofquestions+1 WHERE `tags`.`tagname` = '".strtolower($tag2)."';"))
                        {
                             $numberoftags++;
                        }
                    }
                    if($tag3!="not needed")
                    {

                        if(mysql_query("UPDATE `geeksonline`.`tags` SET numberofquestions = numberofquestions+1 WHERE `tags`.`tagname` = '".strtolower($tag3)."';"))
                        {
                             $numberoftags++;
                        }
                    }
                    echo ' <script type="text/javascript"> alert("Question has been submitted for '.$numberoftags.' seleccted tags."); </script>';
                }
            }

            else
            {
                echo'other<br>';
                if(!in_array($other, $tagName))
                {
                    $rating = 0;
                    $insertCommand = " INSERT INTO `geeksonline`.`post` (`userid` ,`postheader` ,`postdetails` ,`tag1` ,`tag2` ,`tag3` ,`rating` ,`time`)VALUES ('".$_SESSION['userid']."', '".$title."', '".$questionarea."', '".strtolower($other)."', '"."not needed"."', '"."not needed"."', '".$rating."',CURRENT_TIMESTAMP);";
                    if (mysql_query($insertCommand)) 
                    {
                        if ( mysql_query("INSERT INTO `geeksonline`.`tags` (`tagname` ,`numberofquestions`) VALUES ('".strtolower($other)."', '1');") )
                        {
                             echo ' <script type="text/javascript"> alert("Question has been submitted with a new '.$other.' tag."); </script>';
                        }
                    }
                }
                else
                {
                    $rating = 0;
                    $insertCommand = " INSERT INTO `geeksonline`.`post` (`userid` ,`postheader` ,`postdetails` ,`tag1` ,`tag2` ,`tag3` ,`rating` ,`time`)VALUES ('".$_SESSION['userid']."', '".$title."', '".$questionarea."', '".strtolower($other)."', '"."not needed"."', '"."not needed"."', '".$rating."',CURRENT_TIMESTAMP);";
                    if (mysql_query($insertCommand)) 
                    {
                        if(mysql_query("UPDATE `geeksonline`.`tags` SET numberofquestions = numberofquestions+1 WHERE `tags`.`tagname` = '".strtolower($other)."';"))
                        {
                            echo ' <script type="text/javascript"> alert("Question has been submitted for existing '.$other.' tag."); </script>';
                        }
                    }
                }
            }
        }
 ?>

            