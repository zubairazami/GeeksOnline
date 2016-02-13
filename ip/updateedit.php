<?php 
		require 'core.php';
		require 'connect.php';
        if(isset($_POST['ask']) && !empty($_POST['ask']))
        {
            $title = htmlentities($_POST['title']);
            $questionarea = htmlentities($_POST['questionarea']);
            $postid = $_POST['ask'];
        }


        if(!preg_match('/(edited)/',$title))
        {
        	$title = $title." (edited)";
        }

        if( !empty($title) && !empty($questionarea) )   // checking if the fields are filled as required
        {  
         
            $query = "UPDATE `geeksonline`.`post` SET `postheader` = '".$title."',`postdetails` = '".$questionarea."' WHERE `post`.`postid` ='".$postid."';";

            if (mysql_query($query)) 
            {
               	header('Location:http://localhost/ip/myquestions.php');
            }
            else
            {
                
            }
        }   
 ?>