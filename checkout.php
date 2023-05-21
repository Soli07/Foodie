<?php
session_start();
include_once "navv.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodie";
$connect = new mysqli($servername, $username, $password, $dbname);
if (!empty($_POST['cart'])) {

  $_SESSION['idC'];
  $_SESSION['nameC'];
  $_SESSION['priceC'];

  if (isset($_POST["submit"])) {
    $fullname = $_POST['firstname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $cardname = $_POST['cardname'];
    $cardnumber = $_POST['cardnumber'];
    $expmonth = $_POST['expmonth'];
    $expyear = $_POST['expyear'];
    $cvv = $_POST['cvv'];
    $username = $_SESSION['firstname'];
    $userid = $_SESSION['user_id'];
    $order_item = $_SESSION['nameC'];
    $order_total = $_SESSION['priceC'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    // $sql3 = "INSERT INTO checkout (name_billing,email_billing,address_billing,city_billing,state_billing,zip_billing,name_on_card,Credit_card_number,ExpMonth,ExpYear,CVV,user_name,user_id,order_item,order_total) 
    // values ('$fullname','$email','$address','$city','$state','$zip','$cardname','$cardnumber','$expmonth','$expyear','$cvv','$username',' $userid','$order_item ','$order_total')";
    // $result = mysqli_query($connect, $sql3);
    $sql2 = "INSERT INTO orders (order_item,order_total,user_id,user_email,user_phone) values ('$order_item','$order_total','$userid','$email','$phone')";
    $result2 = mysqli_query($connect, $sql2);
    header("location:menu.php");
    echo "<script>alert('Thanks for purcahse from us!');</script>";

  }
}
else{
  // echo "alert('OOPS!')";
}
?>
<html>
    <head>
        <title>Checkout</title><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<style>
    .header{
        font-size: 35px;
        font-weight: bold;
        text-align: center;
        padding: 10px 10px;
    }
    .row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #75757583;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  
  border: 1px solid #ccc;
  border-radius: 16px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #ce2323;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 16px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #C3383881;
}

span.price {
  float: right;
  color: black;
}


/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}   
</style>
    <body>
        
<div class="header">Checkout</div>
<div class="form">
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="" method="POST">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="firstname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="firstname" name="firstname" placeholder="<?php echo $_SESSION['firstname']; ?> Ahmed Wahba ">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="Karim@example.com">
            <label for="address"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="address" name="address" placeholder="45st Ahmed Fakhery">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Cairo">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="New Cairo">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
            <i style="font-size:24px" class="fa">&#xf1f1;</i>
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cardnames">Name on Card</label>
            <input type="text" id="cardname" name="cardname" placeholder="Karim Ahmed Wahba">
            <label for="cardnumber">Credit card number</label>
            <input type="text" id="cardnumber" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="December">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2022">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="999">
              </div>
            </div>
          </div>

        </div>
        <label>
          <!-- <input type="checkbox" checked="checked"  name="sameadr"> Shipping address same as billing -->
        </label>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>

  <div class="col-25">
    <div class="container">
      <h4>Cart
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          <b><!-- Count el products --></b>
        </span>
      </h4>
      <p><a href="menu.php"><?php echo $_SESSION['nameC']; ?></a> <span class="price"><?php echo number_format($_SESSION['priceC']); ?> LE</span></p>
      <!-- <p><a href="#">Product 2</a> <span class="price">LE</span></p>
      <p><a href="#">Product 3</a> <span class="price">LE</span></p>
      <p><a href="#">Product 4</a> <span class="price">LE</span></p> -->
      <hr>
      <?php
							$total = (  $_SESSION["priceC"]);
						
					?>
      <p>Total <span class="price" style="color:black"><b><!-- total el bill--><?php echo number_format($total, 2); ?> LE</b></span></p>
    </div>
  </div>
</div>
</div>
    </body>
</html>