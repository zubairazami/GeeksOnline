<?php 
    require 'core.php';
    require 'connect.php';
    
    if( isset($_COOKIE['user_name']) && !empty($_COOKIE['user_name']) && isset($_COOKIE['user_id']) && !empty($_COOKIE['user_id']))
    {
         $_SESSION['userid'] = $_COOKIE['user_id'];
         $_SESSION['username'] = $_COOKIE['user_name'];
         header('Location:/ip/home.php');
    }
    if((isset($_SESSION['username'])&&!empty($_SESSION['username']))&&(isset($_SESSION['userid'])&&!empty($_SESSION['userid'])))
    {
           header('Location:/ip/home.php');
    }
 ?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Geeks Online</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        
    <div id = "wholesection" >

        <div id = "top" >  
            <div id="topLogo">
               <img src="images/logo.png" height = "59px"> 
           </div>
           
            <div id = "loginregister">

                    <table id = "logintable" cellspacing ="5" cellpadding ="5">

                        <tr>
                            <td><a href="/ip/signin.php">Sign in</a></td>
                            <td><a href="/ip/signup.php">Sign up</a><td>
                        </tr>

                    </table>
            </div>
        </div>

        <div id = "middlebody" >
                
                <div id = "leftbody">
                    <img src="images/g.png" width = "400px" height = "350px">
                </div>
                
                <div id = "logindiv">
                        <form id = "loginform" action="/ip/signin.php" method="POST">
                            <table id = "loginformtable">
                                <tr>
                                    <td colspan = "2">
                                        <h1>Sign In</h1>
                                    </td>
                                </tr>
                                <tr>   
                                    <td align = "right"> <span id = "textofform"> Username   : </span> </td>
                                    <td align = "center" > <input type='text' id="inputfield" name="username" required/> </td>
                                
                                </tr>
                                <tr>
                                    <td align = "right" > <span id = "textofform"> Password   : </span> </td>
                                    <td align = "center"> <input id="inputfield" type='password' name="password" required/> </td>
                                </tr>

                                <tr> 
                                    <td align = "center" colspan = "2" >
                                        <div  >
                                            <input type= "checkbox" id= "rememberme" name = "rememberme"/> 
                                            <label for= "rememberme">Remember me</label>
                                        </div>
                                    </td>  
                                </tr> 
                                <tr>

                                    <td align="center" colspan="2">
                                        <input id = "loginbutton" type = "submit" name = "Sing_in" value = "Log in" >
                                    </td>
                                </tr>   
                            </table>
                        </form>


                        
                </div>
        </div>
         <div id = "footer">
                <hr>
                <p>Copyright : Zubair Azami Badhon</p>
        </div>
    </div>           
    </body>
</html>


<!-- _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ start of base php coding _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _   -->

<?php

    if( (isset($_POST['Sing_in'])&&!empty($_POST['Sing_in'])) )
    {
        if((isset($_POST['username'])&&!empty($_POST['username']))&&(isset($_POST['password'])&&!empty($_POST['password'])))
            {
    
                $user_name=$_POST['username'];
                $password=md5($_POST['password']);
                $query="SELECT `userid` FROM  `login` WHERE `username`='$user_name' AND `password`='$password'";
                $query_check=mysql_query($query);
                $query_run=mysql_num_rows($query_check);
                if($query_run==1)
                {
                    $row = mysql_fetch_assoc($query_check);
                    if(isset($_POST['rememberme'])&&!empty($_POST['rememberme']))
                    {
                        setcookie("user_name",$user_name,time()+3600);//setting cookie
                        setcookie("user_id",$row['userid'],time()+3600);//setting cookie

                    }
                    $_SESSION['username']=$user_name;
                    $_SESSION['userid']=$row['userid'];
    
                    header('Location:/ip/home.php');
                }
                else
                  echo '<script type="text/javascript">alert("Wrong Username/Password");</script>';
    
            }
        else
        {
            echo '<script type="text/javascript">alert("Please, fill up all the fields.");</script>';
        }
    }    
    else
    {
       // echo '<script type="text/javascript">alert("Error in button setting.");</script>';
    }
    
?>