<?php
class DB {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "foodie";
	public $conn;

	function __construct() {
		$this->conn = $this->connectDB();
	}

	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
}

class Product {
	public $id;
	public $name;
	public $image;
	public $ingerdients;
	public $price;
	public $options;
	function __construct($id) {
		$db_handle = new DB();
		$sql="SELECT * FROM product WHERE id=".$id;
		/////
		$result = mysqli_query($db_handle->conn,$sql);
		if($row=mysqli_fetch_array($result)) {
			$this->id=$row[0];
			$this->name=$row[1];
			$this->image=$row[2];
			$this->ingerdients=$row[3];
			$this->price=$row[4];
			$this->options=array();
		}
		$sql="SELECT options.Name,product_s_o_v.Value 
		from options 
		INNER JOIN product_type_s_o on options.ID=product_type_s_o.Options
        INNER Join product_s_o_v on product_type_s_o.ID=product_s_o_v.Product_Type_S_O
		where product_s_o_v.Product_ID=".$id;
		$result = mysqli_query($db_handle->conn,$sql);
		while($row=mysqli_fetch_array($result)) {
			$this->options[$row['Name']]=$row[1];//x['drug strength']=500mg
		}
			/*$sql1="SELECT options.Name,product_s_o_v.Value 
		from options 
		INNER JOIN product_type_s_o on options.ID=product_type_s_o.Options
        INNER Join product_s_o_v on product_type_s_o.ID=product_s_o_v.Product_Type_S_O
		where product_s_o_v.Product_ID=".$id;
		$result = mysqli_query($db_handle->conn,$sql1);
		while($row=mysqli_fetch_array($result)) {
			$this->options[$row['Name']]=$row[1];//x['drug strength']=500mg
		}*/
	}

	static function getAllProducts()	{
		$prod=[];
		$i = 0;
		$db_handle = new DB();
		$sql = "SELECT * from product";
		$result = mysqli_query($db_handle->conn, $sql);
		while($row=mysqli_fetch_array($result)){
			$prod[$i++] = new Product($row[0]);
		}
		return $prod;
	}
}

class Cart{
	public $productsQuantity;

	function __construct(){
		$this->productsQuantity=array();
	}

	function addProduct($productID,$q){		
		if(array_key_exists((string)$productID,$this->productsQuantity))
		$this->productsQuantity[(string)$productID]+=$q;
		else{
			$this->productsQuantity[(string)$productID]=$q;
		}
	}

	function removeProduct($productID){
		unset($this->productsQuantity[(String)$productID]);
	}

	function emptyCart(){
	unset($this->productsQuantity);
	$this->productsQuantity=array();
	}
}

?>