<?php 
session_start();
include_once "navv.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodie";
$connect = new mysqli($servername, $username, $password, $dbname);

// if (isset($_POST['submit'])) {
//     $rating = (int) $_POST['rating'];
//     $query="UPDATE orders SET rating='$rating' WHERE order_id='".$row['order_id']."'";
// 	$query_run=mysqli_query($connect,$query);
//     echo "<script>alert('Congratulations, your form has been successfully submitted!');</script>";
//   }

  
?>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <title>Orders</title>
    </head>
    <style>
        body{
            /* background-image: url(images/slider-image2.jpg); */
            background-repeat: no-repeat;font-family: bebas neue;
            
        }
        h1{
            text-align: center;
            color:#ce3232;
            font-family: bebas neue;letter-spacing: 5px;
        }
        table{
            border: 2px solid;
            width: 80%;
            margin: auto;
            padding: 10px 15px;
            text-align: left;
           
        }
        table #tr,td,th{
            border:2px solid ;
            border-color: #ce3232;
            text-align: center;
            width: 20%;
            background-color: white;
           color: #757575;
           font-weight: bold;
           font-size: 20px;letter-spacing: 5px;
        }
        table #td{
            font-size: 25px;
            border: 2px solid;
            color: #ce3232;

        }
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
        form {
  display: flex;
  align-items: center;
}


.star {
  background: url(star.png) no-repeat;
  background-size: contain;
  width: 40px;
  height: 40px;
  cursor: pointer;
}

.star:hover {
  background-image: url(star-selected.png);
}
.star.selected{
    background-image: url(star-selected.png);

}

    </style>
    <body>
    <h1>Orders</h1>
    <table>
        <Tr>
            <th>Order ID</th>
            <th>Customer Email</th>
            <th>Customer Number</th>
            <th>Item</th>
            <th>Total</th>
            <th>Rate</th>
            
        </Tr><?PHP
        $query = "SELECT * FROM orders";
        // $_SESSION['order'] = $row["order_id"];
        $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
    ?>
	<tr>
		<td><?php echo $row["order_id"]; ?></td>
        <td><?php echo $row["user_email"]; ?></td>
		<td><?php echo $row["user_phone"]; ?></td>
		<td><?php echo $row["order_item"]; ?></td>
		<td><?php echo $row["order_total"]; ?></td>
        <td><?php echo $row["rating"]; ?></td>
			</tr>
<?php 
            }
    }

?>
</table>
    </table>
    </body>
    
</html>
<script>

$('.star').click(function() {
  $('.star').removeClass('selected');
  $(this).prevAll().addClass('selected');
  $(this).addClass('selected');  
  $('#rating').val($(this).data('value'));
});
// $('.star').click(function() {
//   $('.star').removeClass('selected');

//   $(this).addClass('selected');
//   $('#rating').val($(this).data('value'));
// });

</script>