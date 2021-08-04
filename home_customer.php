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
    <h5>SUPERTRONIX</h5>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home_customer.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="placeorder_cust.php">Place Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="order_hist_cust.php">Order History</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pending_order_cust.php">Pending Orders</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="userlogout.php">Logout</a>
          </li>

        
      </ul>
    </div>
  </div>
</nav>
<img src="4.jpg" width="100%">
<div class="card-group">
    <div class="card">
     
      <div class="card-body">
        <h5 class="card-title">LS cables and system</h5>
        <p class="card-text">Near Home Town Super market,<br> Marathahalli Bridge Marathahalli-Sarjapur<br> Outer Ring Rd Marathahalli<br> Bengaluru, Karnataka 560037 .</p>
        <p class="card-text"><small class="text-muted"><b>+9198756342156</b></small></p>
      </div>
    </div>
    <div class="card">
      
      <div class="card-body">
        <h5 class="card-title">Polycab</h5>
        <p class="card-text">Shop L1, Polycab, Koramangala,<br> 5th Block, Near BDA Complex Koramangala 3 Block,<br> Koramangala Bengaluru, Karnataka 560034.</p>
        <p class="card-text"><small class="text-muted"><b>+919657481236</b></small></p>
      </div>
    </div>
    <div class="card">
      
      <div class="card-body">
        <h5 class="card-title">Leoni</h5>
        <p class="card-text"> 15th Main Rd, West Of Chord Road,<br> 3rd Stage, Rajajinagar<br> Bengaluru, Karnataka 560010.</p>
        <p class="card-text"><small class="text-muted"><B>+919845789652</B></small></p>
      </div>
    </div>
  </div> 
  <footer>
    <p><b>Contact us</b>
    <a href="https://www.instagram.com/world_through_the_cam?r=nametag" class="fa fa-facebook"></a>
      <a href="https://www.instagram.com/world_through_the_cam?r=nametag" class="fa fa-instagram"></a>
      <a href="https://www.linkedin.com/in/kshama-g-830a4545" class="fa fa-linkedin"></a>
    </p>
  </footer>