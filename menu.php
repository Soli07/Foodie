<?php
session_start();
require_once("classes.php");
include_once"navv.php";
$cart=new Cart();
if(!empty($_SESSION['user_id'])){
if(!empty($_POST['cart'])) {
	$cart->productsQuantity=json_decode($_POST['cart'],true);
}
if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "add":
			if(!empty($_POST["quantity"])) {
				$cart->addProduct($_GET["id"],$_POST["quantity"]);
			}
		break;
		case "remove":
			$cart->removeProduct($_GET["id"]);
		break;
		case "empty":
			$cart->emptyCart();	
		break;	
		
	}
}}

?>
<html>
<HEAD>
<link rel="stylesheet" href="menu.css">

<TITLE>MENU</TITLE>
<!--<link href="style.css" type="text/css" rel="stylesheet" />-->
</HEAD>
<body>
<div class="txt-heading">
<br><Br>	<h1>Our Menu</h1> <br><Br>
	</div>
<div id="product-grid">
	<div class="txt-heading"></div>
	<?php	
	$allProducts=Product::getAllProducts();
	foreach ($allProducts as $product){?>
		<div class="product-item" width="200px">
			<form method="post" action="menu.php?action=add&id=<?php echo $product->id; ?>">
						<img src="<?php echo $product->image; ?>"><br>
						<p><?php echo $product->name?></p>
						<p><?php echo $product->ingerdients?> LE</p>
				<div>
					<input type="text" name="quantity" id="quantity" value="1" size="2" />
					<input type="submit" value="Add to cart" class="btnAddAction" />
				</div>
				<input type='hidden' name='cart' value='<?php echo (json_encode($cart->productsQuantity)); ?>' />
			</form>
		</div>
		<?php
	}
	?>
</div>

	<?php if($cart->productsQuantity){ ?>
		<div class="shopping-cart">

	<?php
	if(count($cart->productsQuantity)>0)
		?>
		<table cellpadding="10" cellspacing="1">
			<tr>
				<th><strong>Name</strong></th>
				<!-- <th><strong>Ingredients</strong></th> -->
				<th><strong>Quantity</strong></th>
				<th><strong>Price</strong></th>
				<th><strong></strong></th>
			</tr>	
			<?php	
			foreach ($cart->productsQuantity as $productID => $quantity){
		    $product = new Product($productID);
			?>
			<tr>
				<td><strong><?php echo $product->name;?></strong></td><br>	
				<!--<td><?php echo $product->price?></td>	<br>-->
				<td><?php echo $quantity?></td>
				<td><?php echo $product->ingerdients;echo" LE" ?></td>
				<td>
				<form method="post" action="menu.php?action=id">
					<input type="submit"value="Revome Item" class="btnRemAction">
					<!-- Checkout button funtion-->
					<input type="hidden" name="cart" value="<?(json_encode($cart->productsQuantity))?>">


				</form>
				

				</td>
			</tr>
		</table>	
	
	<?php
	} 
	?>
		<form  method="POST" action="checkout.php">
			<?php  $_SESSION['idC']="$product->id";
			$_SESSION['nameC']="$product->name";
			$_SESSION['priceC']="$product->ingerdients"; ?>
					<input type="submit" value="Checkout" class="btncheAction">
					<a id="btnEmpty" style="color:white; font-size: large; padding:10px 15px ; "class="btnCheAction" href="menu.php?action=empty">Empty Cart</a>
				</form>

				</div>
	<?php }else{ ?>
		<h3></h3>
		<?php }?>

</body>
</html>