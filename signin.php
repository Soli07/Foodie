<?php
session_start();
include'navv.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodie";
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST['Submit'])){
  $sql="SELECT * from users where email ='".$_POST["email"]."' and password='".$_POST["password"]."'";
    $result = mysqli_query($conn,$sql);
    if($row=mysqli_fetch_array($result)){
    $_SESSION['user_id']=$row["id"];
    $_SESSION['firstname']=$row['firstname'];
    $_SESSION['lastname']=$row['lastname'];
    $_SESSION['email']=$row['email'];
    $_SESSION['password']=$row['password'];
    $_SESSION['phone']=$row['phone'];
    $_SESSION['role']=$row['role'];
  
   /* if(isset($_POST['remember'])){
      setcookie('email',$_POST['email'],time()+(86400*30));
      setcookie('password',$_POST['password'],time()+(86400*30));
     
    }*/
    header("Location:index.php");
  }
 /* else
{
echo '<script>alert("Incorrect Email or Password")</script>';

}*/
}
  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">     <link rel="stylesheet" href="signup.css">
	<title>Sign In</title>
</head>
<style>

</style>
<body>

<form class='form' action=" " method="POST"> 
    <h1>LOGIN</h1>
	<label for="email">Email</label>
<input type="text" name="email" id="email"><br><br>
<label for="password" >Password</label>
<input type="password" name="password" id="password">
<br>
<br>
<button type="submit"  class="upbtn" name="Submit">Login</button><br><br>
<p><b>Need an account?</b></p><a href="signup.php" class="upbtn">Sign up
</form>
</body>
</html>
