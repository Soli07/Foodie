<?php
session_start();
include_once "navv.php";
$servername = "localhost";
$username = "root";
$password = "";
$db = "foodie"; 
$conn = mysqli_connect($servername, $username, $password , $db);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the file
    $foodname = $_POST['foodname'];
    $price = $_POST['foodprice'];
    // $photo = $_FILES['photo'];
  
    // // Check if the file is an image
    // $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    // if (!in_array($photo['type'], $allowed_types)) {
    //   die('Invalid file type');
    // }
  
    // // Read the contents of the file into a variable
    // $data = file_get_contents($photo['tmp_name']);
  
    // // Insert the photo into the database
    // $name = mysqli_real_escape_string($conn, $photo['name']);
    $sql = "INSERT INTO product (name,price) VALUES ('$foodname','$price')";
    mysqli_query($conn, $sql);
  }
?>
<html>
    <head>
        <title>Add Item</title>
    </head>
    <link rel="stylesheet" href="signup.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

.btn{
    background: #ce3232;
    border-radius: 0;
    border: 0;
    color: #f9f9f9;
    font-size: inherit;
    font-weight: normal;
    padding: 10px 25px;
    transition: 0.5s 0.2s;  
}
.header{
    font-size: 40px;
    font-family:bebas Neue;
}
    </style>
    <body>
        <!-- <h1>Add Item</h1> -->
        <br><br>
        <div class="container">
<form action="" method="post">
<fieldset>
<legend class="header">ADD A MENU ITEM</legend>
<input type="text" name="foodname" placeholder="Food Name" required ><br><br>
<input type="text" name="foodprice" placeholder="Price" required><br><br>
<input type="file" name="photo">

<!-- <label for="foodtype">Choose food type:</label> -->
<!-- <select name="foodtype" id="foodtype">
<option value="Drinks">Drinks</option>
<option value="Breakfast">Breakfast</option>
<option value="Dinner">Dinner</option>
<option value="Lunch">Lunch</option>
<option value="Custom">Custom</option>
</select><br><br> -->
<input type="submit" value="submit" class="btn">
</fieldset>
</form>
</div>
    </body>
</html>