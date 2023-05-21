<?php

session_start();

include"navv.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
	<title>Account</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style>
	
</style>
<body >
	<?php require_once'process.php'?>
    <?php
    $mysqli = new mysqli('localhost','root','','foodie')or die(mysqli_error($mysqli));
    $query = "SELECT email,password,id FROM users where id='".$_SESSION["id"]."'";

    $result = mysqli_query($mysqli, $query);

   //pre_r($result);
?>
<br<><br>
<h1 style="color:#ce3232; text-align:center; font-family: bebas Neue; font-size: 30px;">Profile Setting</h1>
<br>
<div class="ss">
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Email</th>
			<th>Password</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<?php
        if(mysqli_num_rows($result) > 0)
         {
         while($ss = mysqli_fetch_array($result))
         {
         ?>
	<tbody>

		<tr>
			<td><?php echo $ss['id']; ?></td>
			<td><?php echo $ss['email']; ?></td>
			<td><?php echo $ss['password']; ?></td>
			
		    <form action="update.php" method="post">
				<input type="hidden" name="user_id" value="<?php echo $ss['id']?>">
				<td><input type="submit" name="edit" class="btn btn-success" value="EDIT"></td>
			
			</form>
			<form action="delete.php" method="post">
				<input type="hidden" name="id" value="<?php echo $ss['id']?>">
				<td><input type="submit" name="delete" class="btn btn-danger" value="DELETE"></td>
			
			</form>
		</tr>
	</tbody>
</table>
<?php
        }
        } 
        ?>
</div>
</body>
</html>