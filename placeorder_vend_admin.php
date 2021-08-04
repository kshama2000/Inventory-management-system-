<?php
session_start();
ob_start();
if(isset($_SESSION['user_id'])=="") {
	header("Location: adminlogin.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="my.js"></script>
    <title>Cables</title>
    <style>
      h5 {
  text-align: center;
  text-transform: uppercase;
  color: #ff0f0f;
  font-size: 35px;
}
th {
  text-align: center;
    color:rgb(0, 0, 0);
  font-size: 20px;
}
td{
  text-align: center;
    color:rgb(0, 0,0);
  font-size: 18px;
}
h4 {
  text-align: center;
  color:rgb(163,0,0);
  font-size: 25px;
}
p{
    text-align: center;
}
p1{
    text-align: center;
    color: #070802;
    
}
footer {
text-align: center;
padding: 4px 16px;
background-color: #e3f2fd;
color: black;
}
.fa {
    padding: 30px;
  font-size: 30px;
  width: 20px;
  text-align: center;
  text-decoration: none;
  border-radius: 30%;
}
.fa:hover {
  opacity: 0.7;
}

.m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }

    </style>
  </head>
  <body>
 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
    <h5>SUPERTRONIX</h5><br>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home_admin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="customers_admin.php">Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="vendors_admin.php">Vendors</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pending_custorders_admin.php">Pending Customer Orders</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="cleared_custorders_admin.php">Cleared Customer Orders</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="product_stock_admin.php">Products Stock</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="stock_movement_admin.php">Stock Movement</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="placeorder_vend_admin.php">Place Vendor Order</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="pending_vendororders_admin.php">Pending Vendor Orders</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="cleared_vendororders_admin.php">Cleared Vendor Orders</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="raw_material_stock_admin.php">RawMaterial Stock</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="userlogout.php">Logout</a>
          </li>

        
      </ul>
    </div>
  </div>
</nav>

    <!-- container -->
    <div class="container">
  
        <div class="page-header">
        <br><h4>Place Order</h4><br>
        </div>
     
        <?php
// include database connection
include_once("db_connect.php");
 

$sql = "SELECT id, product, price FROM raw_materials";
$result = $conn->query($sql);

 
//check if more than 0 record found

 if ($result->num_rows > 0) {
	 ?>
	 <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
	 <?php
	 
	 
	 
	 
	 $sqldrop="select distinct id,email,company_name from users where role='vendor'";
 $resdrop = $conn->query($sqldrop);

?>
<label for="vend">Choose Vendor:</label>
<select name="vend" id="vend" >
  

<?php
if ($resdrop->num_rows > 0) {
  // output data of each row
  while($rowdrop = $resdrop->fetch_assoc()) {
    ?>
 <option value="<?php print $rowdrop["id"]; ?>" selected="selected" ><?php print $rowdrop["email"]; ?></option>
 <?php
  }
 echo " </select>";
  echo "<br>";
}
	 echo "<br>";
	 
	 
	 
	 
	 
    echo "<table class='table table-hover table-responsive table-bordered'>";//start table
 
    //creating our table heading
    echo "<tr>";
	    echo "<th>MARK</th>";
        echo "<th>ID</th>";
        echo "<th>PRODUCT</th>";
        echo "<th>Price(Rs)/Meter</th>";
        echo "<th>Quantity</th>";
    echo "</tr>";
     
    
while($row = $result->fetch_assoc()){
    
    extract($row);
     
    
	?>
	<tr>
	
	<td class="a-center "><input type="checkbox" class="flat" name='id[]' value="<?php echo $row['id'] ?>" readonly /> </td>
	<td class="a-center "><input type="text" class="flat" name="id2[]" size="1" value="<?php echo $row['id'] ?>" readonly /></td>
	<td class="a-center "><input type="text" class="flat" name="product[]" size="35" value="<?php echo $row['product'] ?>" readonly /></td>
	<td class="a-center "><input type="text" class="flat" name="price[]" size="1"value="<?php echo $row['price'] ?>" readonly /></td>
	<td class="a-center "><input type="text" class="flat" name="qty[]" size="1"/></td>
	
	
	<?php

    echo "</tr>";
	
}
 
// end table
echo "</table>";


            ?>
			<p style="margin-left:100px;"><input name="submit" value="Submit the Order !" type="submit"/></p>
        
<?php
echo "</form>";
 }
?>
 
<?php
if(isset($_POST['submit'])){
	$vend = $_POST['vend'];
$sql2 = "SELECT id FROM vendor_orders order by id desc limit 1";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {
    $order_id_last = $row2["id"]+1;
  }
} else {
  $order_id_last = 1;
}
//$conn->close();


    if(!empty($_POST['id'])) {
		
		$customerid = $_SESSION['user_id'];
		
		if (mysqli_query($conn, "INSERT ignore INTO vendor_orders (id,customer_id)
			VALUES (
			".$order_id_last.",
			".$vend."
				)")) {
		
		

        foreach($_POST['id'] as $value){
            //echo "value : ".$value.'<br/>';
			//echo "product : ". $_POST['product'][$value-1].'<br/>';
			//echo "price : ". $_POST['price'][$value-1].'<br/>';
			//echo "qty : ". $_POST['qty'][$value-1].'<br/>';
			//echo $order_id_last.'<br/>';
			//echo $_SESSION['user_id'].'<br/>';
			//echo $_SESSION['user_name'].'<br/>';
			
			$productid = $_POST['product'][$value-1];
			//$customerid = $_SESSION['user_id'];
			$price = $_POST['price'][$value-1];
			$qty = $_POST['qty'][$value-1];
			$amt = $price * $qty;
			include_once("db_connect.php");
			if (mysqli_query($conn, "INSERT ignore INTO vendor_order_items (order_id,product_id,price,qty,amt)
			VALUES (
			".$order_id_last.",
			".$value.",
			".$price.",
			".$qty.",
			".$amt."
				)")) {
					
?>
<script language="javascript" type="text/javascript">
alert("Order placed successfully !");
window.location="home_admin.php";
</script>
<?php

}
else
{
	?>
<script language="javascript" type="text/javascript">
alert("Error in inserting record!");
window.location="home_admin.php";
</script>
<?php
}

			
			/*echo "INSERT ignore INTO orders (order_id,product_id,customer_id,price,qty)
			VALUES (
			".$order_id_last.",
			".$value.",
			".$customerid.",
			".$price.",
			".$qty.",
			".$amt."
				)";*/

			
				//$conn->query($sql3);

			  
			} 
				}
			//$conn->close();
        }

    }


?>
         
    </div> <!-- end .container -->


  <footer>
    <p><b>Contact us</b>
    <a href="https://www.instagram.com/world_through_the_cam?r=nametag" class="fa fa-facebook"></a>
      <a href="https://www.instagram.com/world_through_the_cam?r=nametag" class="fa fa-instagram"></a>
      <a href="https://www.linkedin.com/in/kshama-g-830a4545" class="fa fa-linkedin"></a>
    </p>
  </footer>