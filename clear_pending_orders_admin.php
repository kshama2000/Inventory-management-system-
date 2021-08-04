<?php
session_start();
ob_start();
if(isset($_SESSION['user_id'])=="") {
	header("Location: userlogin.php");
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
  font-size: 30px;
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
  
  <?php
  if(!$_POST){
 $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
    <h5>SUPERTRONIX</h5>
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
            <a class="nav-link" href="vendor_order_admin.php">Place Vendor Order</a>
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
            <h3>Deliver Pending Orders</h3>
        </div>
     
        <?php
// include database connection
include_once("db_connect.php");
 

$sql = "SELECT b.product,a.qty,a.product_id from order_items a,products b where a.product_id=b.id and a.order_id=".$id.";";
$result = $conn->query($sql);

 
//check if more than 0 record found

 if ($result->num_rows > 0) {
	 ?>
	 <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
	 <?php
    echo "<table class='table table-hover table-responsive table-bordered'>";//start table
 
    //creating our table heading
    echo "<tr>";
        echo "<th>PRODUCT</th>";
        echo "<th>QUANTITY</th>";
        echo "<th>QTY IN STOCK</th>";
        
    echo "</tr>";
     
    // retrieve our table contents
// fetch() is faster than fetchAll()
// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while($row = $result->fetch_assoc()){
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
    extract($row);
     
    // creating new table row per record
    echo "<tr>";
        echo "<td>".$row["product"]."</td>";
        echo "<td>".$row["qty"]."</td>";
		
        $sqlsum = "SELECT stock FROM products WHERE id=".$row["product_id"].";";
		$resultsum = $conn->query($sqlsum);

		if ($resultsum->num_rows > 0) {
		  // output data of each row
		  while($rowsum = $resultsum->fetch_assoc()) {
			$qtyinstock = $rowsum["stock"];
		  }
		} else {
		  echo "0 results";
		}
		echo "<td>".$qtyinstock."</td>";
		
        
    echo "</tr>";
}
 
// end table
echo "</table>";
 
 


            ?>
			<input type="hidden" id="fname" name="fname" value="<?php echo $id ?>" readonly />
			<p style="margin-left:100px;"><input name="submit" value="Clear this Order !" type="submit"/></p>
        
<?php
echo "</form>";
 }
  }
?>
 
<?php
if($_POST){
	include_once("db_connect.php");
	$id = $_POST['fname'];
		
		$sql9 = "update status_check set flg=0 where id=1";
		$conn->query($sql9);
		
		$sql2 = "update orders set stat=1,date_clrd=now() where id=".$id.";";
		$conn->query($sql2);
		
		$sql22 = "SELECT flg from status_check where id=1";
		$result22 = $conn->query($sql22);
		
		
		
		while($row22 = $result22->fetch_assoc()){
    
    extract($row22);
     
    if ($row22["flg"] ==1)
	{
		?>
	<script language="javascript" type="text/javascript">
alert("Order Cleared successfully !");
window.location="pending_custorders_admin.php";
</script>
<?php
	}
	else{
		$sql33 = "update orders set stat=0 where id=".$id.";";
		$conn->query($sql33);
		?>
		<script language="javascript" type="text/javascript">
alert("Order Couldnot be Cleared, Check the Stock!");
window.location="pending_custorders_admin.php";

</script>
<?php
	}		
		
		}
	
		
		
		
		
		//echo $sql2;
		
		/*if ($conn->query($sql2) === TRUE) {
			
$sql3 = "SELECT product_id,qty FROM order_items where order_id=".$id.";";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
  // output data of each row
  while($row3 = $result3->fetch_assoc()) {
    $prodid = $row3["product_id"];
	$qt = $row3["qty"];
	
	$sql4 = "update products set stock=stock-".$qt." where id =".$prodid.";";
	$conn->query($sql4);
	#echo $sql4;
  }
} 

				
?>
<script language="javascript" type="text/javascript">
alert("Order Cleared successfully !");
window.location="pending_custorders_admin.php";
</script>
<?php

}
else
{
	?>
<script language="javascript" type="text/javascript">
alert("Error in inserting record!");
window.location="pending_custorders_admin.php";
</script>
<?php
}*/

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