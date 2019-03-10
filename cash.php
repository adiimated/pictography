<?php 
session_start(); //function to start session
$connect = mysqli_connect("localhost", "root", "", "test2"); //connects to db

if(isset($_POST["add_to_cart"])) // what to do if submit is clicked
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id"); //get data as array
		if(!in_array($_GET["id"], $item_array_id)) // searches for item in array
		{ //if not already added
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else//if item is already present
		{
			echo '<script>alert("Item Already Added")</script>';
			echo '<script>window.location="cash.php"</script>'; //comes back to the cart 
		}
	}
	else  //incase shoppingcart variable doesnot have data
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"], 
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array; //saves this data to shoppingcart variable
	}
}

if(isset($_GET["action"]))  //to remove item
{
	if($_GET["action"] == "delete")  //one of the the things passes (checks if action is delete)
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values) //to access each value of shoppingcart
		{
			if($values["item_id"] == $_GET["id"])  //second variable passed (which id to delete)
			{
				unset($_SESSION["shopping_cart"][$keys]); //destroy a variable of shopping cart
				echo '<script>alert("Item Removed")</script>';  //to tell user item is removed 
				echo '<script>window.location="cash.php"</script>';  //redirection after removal
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title> Shopping Cart</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  <!FRAMEWORK>
 		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<br />
			<br />
			<br />
			<br /><br />
			<?php
				$query = "SELECT * FROM infotab ORDER BY img_id ASC"; //query
				$result = mysqli_query($connect, $query); //executes query
				if(mysqli_num_rows($result) > 0) //checks if data is present in the table
				{
					while($row = mysqli_fetch_array($result)) //fetches data as an array and stores in row
					{
				?>
			<div class="col-md-4"> <!class of bootstrap library>
				<form method="post" action="index.php?action=add&id=<?php echo $row["img_id"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						
<h4 class="text-danger">$ <?php echo $row["img_id"]; ?></h4><!displays Id>

						

						<h4 class="text-danger">$ <?php echo $row["img_price"]; ?></h4><!displays price>

						<input type="text" name="quantity" value="1" class="form-control" /> <!user can enter quantity>


						<input type="hidden" name="hidden_price" value="<?php echo $row["img_price"]; ?>" /> <!saves price for future use >

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" /> <!add to cart button>

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>  <!displays details of cart to user as a table>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">ID</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					//to display items present in cart
					if(!empty($_SESSION["shopping_cart"]))  //to make sure its not empty
					{
						$total = 0; //total of item price variable
						foreach($_SESSION["shopping_cart"] as $keys => $values) //to access all elements of shoppingcart array
						{
					?>
					<tr>
						<td><?php echo $values["item_id"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td> <!converts number to 2dp>
						<td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td> <!prints remove link to remove item>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]); //for total price 
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td> 
						<td align="right">$ <?php echo number_format($total, 2); ?></td> <!prints total price>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
	</div>
	<br />
	
	<button><a href="payment.html">Place order</a></button>
	</body>
</html>

<?php
//If you have use Older PHP Version, Please Uncomment this function for removing error 

/*function array_column($array, $column_name)
{
	$output = array();
	foreach($array as $keys => $values)
	{
		$output[] = $values[$column_name];
	}
	return $output;
}*/
?>