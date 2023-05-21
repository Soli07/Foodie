<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<title>Medical Care</title>
</head>
<style>
	body{
		background-image: url('edit.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      justify-content: center;
      margin: 50px;
	}
</style>
<body>
<?php

$connection =mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'foodie');
$id=$_SESSION['id'];
$query ="SELECT * FROM users WHERE id='$id'";
$query_run = mysqli_query($connection,$query);

if($query_run)
{
	while ($ss =mysqli_fetch_array($query_run))
    {
?>
		<div class="container" >
 			<div class= "jumbotron">
			<h2>Updating Data</h2>
			<hr>
			<form action="" method="POST">
			<input type ="hidden" name="id" value="<?php echo $ss['id']?>">
				<div class="form-group">
				<label for =" ">Email</label>
				<input type="text" name="email" class="form-control"  value="<?php echo $ss['email']?>" placeholder = "Enter Your Mail" required>				</div>
				<div class="form-group">
				<label for =" ">Password</label>
				<input type="password" name="password" class="form-control" value="<?php echo $ss['password']?>"  placeholder = "Enter Your Password" required>
				</div>
			<button type="submit" name="update" class="btn btn-primary">Update Data</button>
			<a href="crud.php" class="btn btn-danger">Cancel</a>
			</form>
			<?php
			if (isset($_POST['update'])) {
				$email=$_POST['email'];
				$password=$_POST['password'];
				$query="UPDATE users SET email='$email' , password='$password' WHERE id='$id'";
				$query_run=mysqli_query($connection,$query);
				if($query_run){
					echo"<script> alert('Data Updated');</script>";
					header("location: crud.php");
				}
				else{
					echo'<script> alert("Data Not Updated");</script>';
				}
			}
			?>
    		</div>
		</div>	
	<?php
	}
}
else
{
	echo'<script> alert("No Record Found");</script>';
}

?>
</body>
</html>