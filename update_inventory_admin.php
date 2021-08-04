<!DOCTYPE HTML>
<html>
<head>
    <title>Update Inventory</title>
     
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
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
  font-size: 30px;
}
</style>  
</head>
<body>
<h5>SUPERTRONIX</h5><br>
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h4>Update Product</h4>
        </div>
     
        <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
//include database connection
include_once("db_connect.php");
 
$sql = "SELECT id, product, stock FROM products WHERE id =".$id.";";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	  $product = $row["product"];
	  $stock = $row["stock"];
  }
	  
}
    

 

?>
 
        <?php
 
// check if form was submitted
if($_POST){
     
    
        

        $inv=htmlspecialchars(strip_tags($_POST['inv']));
        
        
         
        $sql2 = "update products set stock=stock+".$inv." where id =".$id.";";

if ($conn->query($sql2) === TRUE) {
					
?>
<script language="javascript" type="text/javascript">
alert("Updated successfully !");
window.location="product_stock_admin.php";
</script>
<?php

}
else
{
	?>
<script language="javascript" type="text/javascript">
alert("Error in inserting record!");
window.location="product_stock_admin.php";
</script>
<?php
}
         
    
     
    
}
?>
 
<!--we have our html form here where new record information can be updated-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Product</td>
            <td><input type='text' name='product' value="<?php echo htmlspecialchars($product, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Current Stock (Meters)</td>
            <td><textarea name='stock' class='form-control'><?php echo htmlspecialchars($stock, ENT_QUOTES);  ?></textarea></td>
        </tr>
        <tr>
            <td>Add Stock (in Meters)</td>
            <td><input type='text' name='inv'  class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='product_stock_admin.php' class='btn btn-danger'>Back to Inventory Page</a>
            </td>
        </tr>
    </table>
</form>
         
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>