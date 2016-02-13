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

    $query2 = "SELECT username FROM  `userprofile` ORDER BY  `userprofile`.`rating` DESC ";

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
                    <div id="homemain">
                        <div id="tablediv">
                            <h1>All Users</h1>
                            <table id="questiontable" cellspacing="1px" cellpadding="0px">
                                <?php  
                                    
                                    $size = count($userName);
                                    $totalrows = ceil($size/6);
                                    $count=0;
                                    $strip = "smalltd";
                                    for ($i=0; $i <$totalrows && $count<$size ; $i++) 
                                    { 
                                        echo '<tr>';
                                            for ($j=0; $j < 6 && $count<$size ; $j++) 
                                            { 
                                                echo '
                                                <td id = "'.$strip.'">
                                                    <form method = "POST" action ="/ip/profile.php"> <button name="username" id="smallbutton" value="'.$userName[$count].'">'.$userName[$count].'</button></form>
                                                </td>';
                                                $count++;
                                                
                                                if($strip=='smalltd') 
                                                    $strip = 'smalltd2';
                                                else
                                                    $strip = 'smalltd';

                                                
                                            }
                                        echo '</tr>';
                                        if($strip=='smalltd') 
                                            $strip = 'smalltd2';
                                        else
                                            $strip = 'smalltd';
                                    }
                                ?>

                            </table>
                        </div>
                    </div>
                </div>  
                

                <div class="pure-u-1-6" id="mainbodyright"> 
                    <table id = "topusertable">
                        <tr><td><span id = "sectionspan"> Top Users </span> </td> </tr>
                       <?php 
                            
                            if(count($userName)<=18)
                                $number = count($userName);
                            else
                                $number = 18;

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