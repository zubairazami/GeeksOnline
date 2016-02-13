

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
          var up= <?php echo json_encode("rating.php?button=up&seekerid=".$postseekerid."&postid=".$postid); ?>;
          alert(up);
          xmlhttp.open("GET",up);
          xmlhttp.send();
        }

        document.getElementById("dnBtn").onclick= function()
        { 
          var down = <?php echo json_encode("rating.php?button=down&seekerid=".$postseekerid."&postid=".$postid); ?>;
          alert(down);
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


