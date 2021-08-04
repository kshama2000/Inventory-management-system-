<!DOCTYPE HTML>
<html>
<head>
    <title>Read One Record</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <style>
      h5 {
  text-align: center;
  text-transform: uppercase;
  color: #ff0f0f;
  font-size: 35px;
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
h4 {
  text-align: center;
  color:rgb(163,0,0);
  font-size: 25px;
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
.m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }

    </style> 
</head>
<body>
<h5>SUPERTRONIX</h5>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <br><h4>Order Details</h4><br>
        </div>
         
        <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
//include database connection
include_once("db_connect.php");
 

 
    


$sql = "SELECT b.product,a.qty,a.price,a.amt FROM vendor_order_items a,raw_materials b WHERE a.product_id=b.id AND a.order_id=".$id.";";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	  $product = $row["product"];
	  $qty = $row["qty"];
	  $price = $row["price"];
	  $amt = $row["amt"];
	  ?>
            <!--we have our html table here where the record will be displayed-->
<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Product</td>
        <td><?php echo htmlspecialchars($product, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Quantity</td>
        <td><?php echo htmlspecialchars($qty, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Price</td>
        <td><?php echo htmlspecialchars($price, ENT_QUOTES);  ?></td>
    </tr>
	<tr>
        <td>Amount (Rs)</td>
        <td><?php echo htmlspecialchars($amt, ENT_QUOTES);  ?></td>
    </tr>
    
</table>
<?php
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
 


 

 
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>