<?php 
    
    session_start();

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
        <link href="/ip/css/style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        
    <div id = "wholesection" >

        <div id = "top" >  
            
            <div id="topLogo">
               <img src="/ip/images/logo.png" height = "59px"> 
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

            <div id = "rightbody" >
                
                <table id = "infotable">

                    <tr>
                        <td> <img src="images/tick.png" width = "48px" height = "48px"> </td>
                        <td> <h1>Ask Question</h1> </td>
                    </tr>
                    
                    <tr>
                        <td> <img src="images/tick.png" width = "48px" height = "48px"> </td>
                        <td> <h1>Get Answer</h1> </td>
                    </tr>
                    
                    <tr>
                        <td> <img src="images/tick.png" width = "48px" height = "48px"> </td>
                        <td> <h1> Contribute </h1> </td>
                    </tr>
                    
                    <tr>
                        <td> <img src="images/tick.png" width = "48px" height = "48px"> </td>
                        <td> <h1> Earn reputation</h1> </td>
                    </tr>
                     <tr>
                        <td> <img src="images/tick.png" width = "48px" height = "48px"> </td>
                        <td> <h1>24 x 7 online</h1> </td>
                    </tr>
                </table>
            </div>
        </div>
         <div id = "footer">
                <hr>
                <p>Copyright : Zubair Azami Badhon</p>
        </div>
    </div>    
    </body>
</html>