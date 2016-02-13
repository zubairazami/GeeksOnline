<?php 
    require 'core.php';
    require 'connect.php';

    $postid=$_POST['postedit'];

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

     $query1= "SELECT postheader, postdetails FROM `post` WHERE postid =".$postid;

    if( $query_run1=mysql_query($query1) )
    {
        $header="";
        $details="";
        while($query_rows = mysql_fetch_assoc($query_run1))
        {
            $header= $query_rows['postheader'];
            $details = $query_rows['postdetails'];
        }

    }
    else
    {

         $errorno = mysql_errno();
         $errormessage = mysql_error();
         echo '<script type="text/javascript"> alert("Error ('.$errorno.') : '.$errormessage.'"); </script>';
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

                            <form method = 'POST' action ='/ip/updateedit.php'>
                                <table id="askaquestiontable" cellspacing ="0px" cellpadding = "0px">
                                
                                    <tr>    
                                            <td colspan = "2" align ="center">
                                                    <a href="/ip/askaquestion.php"><h1> Edit your Question </h1></a>
                                            </td>   
                                    </tr>   
                                    <tr>
                                        <td id="tabletexttd"><span id = "questiontitle"> Question Title    :   </span></td>
                                        <td id = "tablefieldtd">
                                            <input type='text' id="titlefield" name="title" value="<?php echo $header ?>" required/>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td id="tabletexttd"><span id = "questiontitle"> Question Details  :   </span></td>
                                        <td id = "tablefieldtd"> <textarea id = 'questionarea' name='questionarea' required><?php echo $details ?></textarea>   </td>
                                    </tr> 

                                    <tr>
                                         <td colspan="4" rowspan="2" > 
                                            <button id="askbutton"  name = "ask" value ="<?php echo $postid; ?>" >Edit</button>
                                            
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



            