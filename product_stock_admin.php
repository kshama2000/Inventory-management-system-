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
            <a class="nav-link" href="placeorder_vend_admin.php">Place Vendor Order</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="pending_vendororders_admin.php">Pending Vendor Orders</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="cleared_vendororders_admin.php">Cleared Vendor Orders</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="rawmaterial_stock_admin.php">RawMaterial Stock</a>
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
        <br> <h4>Products Inventory</h4><br>
        </div>
     
        <?php
// include database connection
include_once("db_connect.php");
 
// delete message prompt will be here
 
// select all data
$sql = "SELECT id, product,stock FROM products";
$result = $conn->query($sql);




/*$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>Name</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();*/




 
// link to create record form
//echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";
 
//check if more than 0 record found

 if ($result->num_rows > 0) {
    echo "<table class='table table-hover table-responsive table-bordered'>";//start table
 
    //creating our table heading
    echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>PRODUCT</th>";
        echo "<th>Current Stock in Meters</th>";
        echo "<th>Action</th>";
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
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["product"]."</td>";
		echo "<td>".$row["stock"]."</td>";
		
        

		
		
        echo "<td>";
            
             
            // we will use this links on next part of this post
            echo "<a href='update_inventory_admin.php?id={$id}' class='btn btn-primary m-r-1em' target='_blank' >Add Inventory</a>";
 
            
        echo "</td>";
    echo "</tr>";
}
 
// end table
echo "</table>";
 }
 else {
  echo "0 results";
}
$conn->close();

 

?>
         
    </div> <!-- end .container -->


  <footer>
    <p><b>Contact us</b>
    <a href="https://www.instagram.com/world_through_the_cam?r=nametag" class="fa fa-facebook"></a>
      <a href="https://www.instagram.com/world_through_the_cam?r=nametag" class="fa fa-instagram"></a>
      <a href="https://www.linkedin.com/in/kshama-g-830a4545" class="fa fa-linkedin"></a>
    </p>
  </footer>