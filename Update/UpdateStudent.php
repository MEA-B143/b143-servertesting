<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $id = $_POST['StudentID'];
 $change = $_POST['scoreChange'];
 $change = (int)$change;
 
 $result = mysql_query("SELECT score FROM userinformation WHERE id = $id");
 while ($row = mysql_fetch_array($result)) 
 {
	 $onlinescore = $row['score'];  
 }
 $newscore = $onlinescore+$change;
 $Sql_Query = "UPDATE userinformation SET score=$newscore WHERE id = $id";

 if(mysqli_query($con,$Sql_Query))
{
 echo $newscore;
}
else
{
 echo 'Something went wrong';
 }
 }
 mysqli_close($con);
?>