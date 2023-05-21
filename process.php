<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";
$mysqli =new mysqli('localhost','root','','foodie') or die(mysqli_error($mysqli));
if(isset($_POST['save'])){
$email=$_POST['email'];
$password=$_POST['password'];
$mysqli->query("INSERT INTO users (email,password) VALUES ('$email','$password')")or die($mysqli->error);
}