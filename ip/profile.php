<?php 
	require 'core.php';
	require 'connect.php';
	$Profile = $_POST['username'];
	
    if(empty($_POST['username']))
	{
		$Profile = $_SESSION['username'];
	}
	
	$CurrentUser =  $_SESSION['username'];
	$isOwnerofThisProfile = ($Profile==$CurrentUser);

	$Query = "SELECT * FROM `login` JOIN `userprofile` ON `login`.`userid` = `userprofile`.`userid` WHERE `login`.`username`='".$Profile."' ORDER BY `login`.`userid` ASC";
	if ($Query_check=mysql_query($Query))
	{
		$UserID     = ""; 
		$Username   = "";
		$Email      = "";
		$Rating     = "";
		$Photo      = ""; 
		$BirthDay   = "";
		$Gender     = "";		
        $Occupation = "";
		$Country    = "";
			
		if($Result = mysql_fetch_assoc($Query_check))
		{
			$UserID = htmlentities($Result['userid']);
			$Username = htmlentities($Result['username']);
			$Email= htmlentities($Result['email']);
			$Rating = 	htmlentities($Result['rating'])		;	
			$Photo = htmlentities($Result['photolink']);
			$BirthDay = htmlentities($Result['dateofbirth']);
			$Gender = htmlentities($Result['sex']);
			$Occupation = htmlentities($Result['occupation']);
			$Country = htmlentities($Result['country']);
		}
	}
	else
	{
		$errorno = mysql_errno();
        $errormessage = mysql_error();
        echo '<script type="text/javascript"> alert("Error ('.$errorno.') : '.$errormessage.'"); </script>';
        die($errorno . " : ". $errormessage);
	}

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

                    <div id="profilemain" >
                        
                        <div id="prifiletop" class="pure-g-r">


                            <div id ="profiletopleft" class="pure-u-1-4">


                            </div>

                            <div id="profiletopmiddle" class="pure-u-1-2" >
                               <h1><?php echo $Username ?> </h1>
                            </div>
                            
                            <div id ="profiletopright" class="pure-u-1-4">

                            </div>

                        </div>
                        <div id="infodiv">

                                <table id="ProfileTable" cellspacing ="3px" cellpadding="0px">


                                        <tr>
                                            <td id='TableLeft'> <span id="nametag"> Username : </span>   </td>
                                            <td id='TableRight'>  <span><?php echo $Username ?></span> </td>
                                        </tr>
                                        
                                        <tr>
                                            <td id='TableLeft'> <span id="nametag"> User Identity No : </span>   </td>
                                            <td id='TableRight'>  <span><?php echo $UserID  ?></span> </td>
                                        </tr>
                                        
                                        <tr>
                                            <td id='TableLeft'> <span id="nametag"> Email : </span>   </td>
                                            <td id='TableRight'>  <span><?php echo $Email ?></span> </td>
                                        </tr>
                                        
                                        <tr>
                                            <td id='TableLeft'> <span id="nametag"> Rating : </span>   </td>
                                            <td id='TableRight'>  <span><?php echo $Rating ?></span> </td>
                                        </tr>
                                        
                                        <tr>
                                            <td id='TableLeft'> <span id="nametag"> Birth Date : </span>   </td>
                                            <td id='TableRight'>  <span><?php echo $BirthDay ?></span> </td>
                                        </tr>
                                        
                                        <tr>
                                            <td id='TableLeft'> <span id="nametag"> Gender : </span>   </td>
                                            <td id='TableRight'>  <span><?php echo $Gender  ?></span> </td>
                                        </tr>
                                        
                                        <tr>
                                            <td id='TableLeft'> <span id="nametag"> Occupation : </span>   </td>
                                            <td id='TableRight'>  <span><?php echo $Username ?></span> </td>
                                        </tr>
                                         
                                        <tr>
                                            <td id='TableLeft'> <span id="nametag"> Country : </span>   </td>
                                            <td id='TableRight'>  <span><?php echo $Occupation ?></span> </td>
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


         <div id="footer">
                <hr>
                <p>Copyright : Zubair Azami Badhon</p>
        </div>
    </div>    
    </body>
</html>














                                    