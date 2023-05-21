<?php
$connection =mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection ,'foodie');

if(isset($_POST['delete']))
{
$user_id=$_POST['id'];
$query="DELETE FROM users WHERE id='$user_id' ";
$query_run=mysqli_query($connection,$query);
if($query_run){
	echo '<script> alert ("Data Deleted");</script>';
	header("location:crud.php");
}
else{
	echo'<script> alert("Data Not Deleted");</script>';
}
}

?>