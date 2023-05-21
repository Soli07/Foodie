<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medical care";
$conn = new mysqli($servername, $username, $password, $dbname);
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    </head>

    <body>
    <?php
if(!empty($_SESSION["role"]) && $_SESSION["role"]==1){
	?>
     <nav>
        		<a href="main.php"><img src="logo.png" sizes="13"></a>
        		<div class="nav-links" id="navLinks">
        			<!--<i class="fa fa-times" onclick="hideMenu()" ></i>-->
        			<ul>
                    <li><a href="profile.php"><i style='font-size:24px' class='fas'>&#xf406;</i>Welcome,<?php echo $_SESSION['fullname'];?> </a><li>
        				<li><a href="index.php">HOME</a></li>
                        <li><a href="add.php">Add a Doctor</a></li>
						<li><a href="doctordatabase.php">Doctors</a></li>
                        <li><a href="signout.php">LogOut</a></li>
                       
                        

        			
        			</ul>
        		</div>
        	<!--	<i class="fa fa-bars" onclick="showMenu()" ></i>-->
        	</nav>
            <?php
}

else if(!empty($_SESSION["role"]) && $_SESSION["role"]==2){
	?>
     <nav>
        		<a href="main.php"><img src="logo.png" sizes="13"></a>
        		<div class="nav-links" id="navLinks">
        			<!--<i class="fa fa-times" onclick="hideMenu()" ></i>--><div class="dropdown">
        			<ul>
					<li><a href="profile.php"><i style='font-size:24px' class='fas'>&#xf406;</i>  Welcome ,  <?php echo $_SESSION['fullname'];?> </a><li>
        				<li><a href="index.php">Home</a></li>
						<li><a href="doctors.php">Doctors</a></li>
						<li><a href="orders.php">Reservations</a></li>
        				<li><a href="ContactUs.php">Contact Us</a></li>
						<li><a href="signout.php">Sign Out</a></li>
                      </ul>
                    </div>


        			
        			</ul>
        		</div>
        		<!--	<i class="fa fa-bars" onclick="showMenu()" ></i>-->
        	</nav>
			<?php
}

else if(!empty($_SESSION["role"]) && $_SESSION["role"]==3){
	?>
     <nav>
        		<a href="main.php"><img src="logo.png" sizes="13"></a>
        		<div class="nav-links" id="navLinks">
        			<!--<i class="fa fa-times" onclick="hideMenu()" ></i>-->
        			<ul>
                    <li><a href="profile.php"><i style='font-size:24px' class='fas'>&#xf406;</i>  Welcome , Doctor  <?php echo $_SESSION['fullname'];?> </a><li>
        				<li><a href="index.php">HOME</a></li>
						<li><a href="appointments.php">Appointments</a></li>
                        <li><a href="signout.php">LogOut</a></li>
                       


        			
        			</ul>
        		</div>
        		<!--	<i class="fa fa-bars" onclick="showMenu()" ></i>-->
        	</nav>
            <?php
}
else{
?>
 <nav>
        		<a href="index.php"><img src="logo.png" sizes="13"></a>
        		<div class="nav-links" id="navLinks">
        			<!--<i class="fa fa-times" onclick="hideMenu()" ></i>-->
        			<ul>
        				
        				<li><a href="signup1.php">SIGN UP</a></li>
                        <li><a href="signin.php">SIGN IN</a></li>
        				<li><a href="index.php">HOME</a></li>
						<li><a href="doctors.php">Doctors</a></li>
        				<li><a href="ContactUs.php">CONTACT US</a></li>
                        <li><a href="doctorSignup.php">Join us as a doctor</a></li>

        			
        			</ul>
        		</div>
        		<!--	<i class="fa fa-bars" onclick="showMenu()" ></i>-->
        	</nav>
<?php 
}
?>
    </body>
</html>
