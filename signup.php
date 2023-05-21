<?php

    $connect=mysqli_connect("localhost","root","","foodie");
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
    $errors = [];
    if (empty($firstname)) {
      $errors['username'] = "Username is required.";
    }
    if (empty($email)) {
      $errors['email'] = "Email is required.";
    }
    if (empty($password)) {
      $errors['password'] = "Password is required.";
    }
    //  if(!empty($_POST['name'])&&!empty($_POST['email'])&&!empty($_POST['password'])&&!empty($_POST['confirmpassword'])&&!empty($_POST['gender'])&&!empty($_POST['birthofdate'])){
if (!empty($errors)) {
    session_start();
    $_SESSION['errors'] = $errors;
    if (isset($_POST['signup'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];

        $sql = "INSERT INTO users (firstname,lastname,email,phone,password,gender,address,role) values ('$firstname','$lastname','$email','$phone','$password','$gender','$address','user')";
        $result = mysqli_query($connect, $sql);
        $_SESSION['user_id'];
        $_SESSION['firstname'] = $firstname;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['phone'] = $phone;
        $_SESSION['gender'] = $gender;
        $_SESSION['role'] = "user";
        echo "<script>alert('Your Account has submitted Successfully!')</script>";

        header("location:index.php");
    }
}

else{

  echo"<script>alert('Please all fields Required!')</script>";
}
?>
<html>
    <head>
<meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">
     <link rel="stylesheet" href="signup.css">
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-style.css">
     </head>
     <title>Foodie.SignUp</title>
     <style>
     </style>
<body>

<div class="nav">    <?php include_once("navv.php")?>
</div>
<br><br><br><br><br><br>
     <div class="header1">
        <h1 class="head">Sign Up</h1>
     </div>

        <div class="cform">
        <form action=" "method="POST">
    <label for="firstname">First Name</label>
    <input type="text" name="firstname" id="firstname">
    <div id="username-error" class="error"></div>


    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname">
    <div id="firstname-error" class="error"></div>


    <label for="email">Email</label><br> 
    <input type="text" name="email" id="email">
    <div id="email-error" class="error"></div>

    <label for="phone">Phone</label> 
    <input type="text" name="phone" id="phone">

    <label for="password">Password</label>
     <input type="password" name="password" id="password">
     <div id="password-error" class="error"></div>

    <label for="confirmpassword">Confirm Password</label>
    <input type="password" name="confirmpassword" id="confirmpassword">

    <label for="address">Address</label>
    <input type="text" name="address" id="address">

    <label for="gender">Gender</label>
    <select id=gender name="gender" placeholder="Gender">
<option>Not Specified</option>
<option> Male</option>
<option>Female</option>
</select><br>
<br>
<button type="submit" class="buttonS" name="signup" id="submit">Sign Up</button><br><br>
<p><b>Already have an account?</b></p><a href="signin.php" class="upbtn">Sign In
        </form>
        </div>
        <br><br>
</body>
</html>
<script>
$("#signup-form").submit(function(event) {
  event.preventDefault();
  var firstname = $("#firstname").val();
  var email = $("#email").val();
  var password = $("#password").val();
  $.ajax({
    type: "POST",
    url: "signup.php",
    data: {
        firstname: firstname,
      email: email,
      password: password
    },
    success: function(response) {
      if (response.errors) {
        if (response.errors.username) {
          $("#firstname-error").text(response.errors.firstname);
        }
        if (response.errors.email) {
          $("#email-error").text(response.errors.email);
        }
        if (response.errors.password) {
          $("#password-error").text(response.errors.password);
        }
      } else {
        // Form was successfully submitted, handle success here
      }
    }
  });
});
</script>