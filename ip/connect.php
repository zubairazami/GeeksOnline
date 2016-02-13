<?php
$host='localhost';
$db_user='root';
$db_password='rootbadhon';
$db_connect=mysql_connect($host,$db_user,$db_password);
if($db_connect)
{
		$db="geeksonline";
		$db_select=mysql_select_db($db);
		if($db_select)
		{
				
		}
		else
		{
				echo "Can't find database geeksonline in Database Management System";
		}
}
else
{
	echo "Failed";
}


?>
