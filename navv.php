<html>
<link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-style.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

nav{
display: flex;
padding: 50px 4px;
padding-left: 5px;
padding-right: 5px;
background-color: white;
justify-content:  space-between;
align-items: center;
height: 20px;
padding-bottom: 10px;

}
nav img{
	width: 150px;

}
.nav-links{
	flex: 1;
	text-align: right;
}
.nav-links ul li{
	list-style: none;
	display: inline-block;
	padding: 8px 12px;
	position: relative;
}
.nav-links ul li a{
	color: #ce3232;
	text-decoration:none;
	font-size: 25px;
    font-family:bebas Neue;
    padding: 5px;


}
.nav-links ul li::after {
	content: '';
	width: 0%;
	height: 2px;
	background: #757575;
	display: block;
	margin: auto;
	transition: 0.5s;
}
.nav-links ul li:hover::after{
	width: 100%;
}
.text-box{
	width: 90%;
	color: white;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	text-align: center;
}
.text-box h1{
	font-size: 50px;
}
.text-box h3{
	margin: 10px 0 40px;
	color: lightgrey;
}
nav.fa{
	display: hide;
}
@media(max-width: 700px){
	.text-box h1{
	font-size: 20px;
    }
    .nav-links ul li{
	display: block;
    }
    .nav-links{
	position: absolute;
	background: lightgrey;
	height: 100vh;
	width: 200px;
	top:0;
	right: -200px;
	text-align: left;
	z-index: 2;
	transition: 1s;
    }
    nav.fa{
	display: block;
	color: blue;
	margin: 10px;
	font-size: 22px;
	cursor: pointer;
    }
    .nav-links ul{
    	padding: 30px;
    }
}
.nav-logo{
font-size: 45px;
font-family: bebas Neue;
color: #ce3232;
float: left;
    height: 50px;
    padding: 15px 15px;
    line-height: 20px;
}
/* Dropdown Button */
.dropbtn {
  background-color: transparent;
  color: #ce3232;
  padding: 16px;
  font-size: 25px;font-family:bebas Neue;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #757575;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  font-size: 20px;
  padding: 14px 16px;
  text-align: left;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #757575;}
</style>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<body>
<?php
if(!empty($_SESSION["role"]) && $_SESSION["role"]=="user"){
	?>
<nav>
<a href="index.html" class="nav-logo">Foodie <span style="font-size:large; 
 font-family: bebas Neue;
 color:#757575;">.</span> Restaurant</a>
        		<div class="nav-links" id="navLinks">
        			<ul>
                    <li>
					<div class="dropdown">
  <button class="dropbtn">Welcome, <?php echo $_SESSION['firstname'];?></button>
  <div class="dropdown-content">
     <a href="CRUD.php">Account</a>
	 <a href="orders.php">Orders</a>
    <a href="signout.php">Logout</a>
  </div>
</div><li>

                    	<li><a href="index.php">HOME</a></li>
                        <li><a href="menu.php">Menu</a></li>
						<li><a href="index.php#contact">Contact</a></li>
                        <a href="menu.php" class="section-btn">Order Now !</a>

                        

        			
        			</ul>
        		</div>
        	</nav>
            <?php } else if (!empty($_SESSION["role"]) && $_SESSION["role"] == "admin") { ?>
                <nav>
<a href="index.html" class="nav-logo">Foodie <span style="font-size:large; 
 font-family: bebas Neue;
 color:#757575;">.</span> Restaurant</a>
        		<div class="nav-links" id="navLinks">
        			<ul>
                    <li>
					<div class="dropdown">
  <button class="dropbtn">Welcome, <?php echo $_SESSION['firstname'];?></button>
  <div class="dropdown-content">
    <a href="CRUD.php">Account</a>
    <a href="signout.php">Logout</a>
  </div>
</div></li>

                    	<li><a href="index.php">HOME</a></li>
                        <li><a href="additem.php">Update Menu</a></li>
						<li><a href="delete.php">Delete Item</a></li>
                        <li><a href="Rorders.php">View Orders</a></li>
                        
        			</ul>
        		</div>
        	</nav>
            <?php } else if (!empty($_SESSION["role"]) && $_SESSION["role"] == "delv") {?>
                <nav>
<a href="index.html" class="nav-logo">Foodie <span style="font-size:large; 
 font-family: bebas Neue;
 color:#757575;">.</span> Restaurant</a>
        		<div class="nav-links" id="navLinks">
        			<ul>
                    <li>
					<div class="dropdown">
  <button class="dropbtn">Welcome, <?php echo $_SESSION['firstname'];?></button>
  <div class="dropdown-content">
    <a href="CRUD.php">Account</a>
    <a href="signout.php">Logout</a>
  </div>
</div></li>

                    	<li><a href="index.php">HOME</a></li>
                        <li><a href="delvOrders.php">Orders</a></li>
                          			
        			</ul>
        		</div>
        	</nav>  
            <?php } else { ?>
                <nav>
<a href="index.html" class="nav-logo">Foodie <span style="font-size:large; 
 font-family: bebas Neue;
 color:#757575;">.</span> Restaurant</a>
        		<div class="nav-links" id="navLinks">
        			<ul>
                    	<li><a href="index.php">HOME</a></li>
                        <li><a href="menu.php">Menu</a></li>
						<li><a href="contact.php">Contact</a></li>
                        <li><a href="signin.php">Sign In</a></li>
                        <a href="menu.php" class="section-btn">Order Now !</a>

                        

        			
        			</ul>
        		</div>
        	</nav>
            <?php }?>
</body>
</html>