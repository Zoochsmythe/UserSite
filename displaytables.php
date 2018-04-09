<?php 
  include ("info.php");
  session_start();

  if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != ''))
  {
    header("location: login.php");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="Index.php">Hi-Tech Communications</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li>
            <a class="nav-link" href="Index.php">Home <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="Index.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Buy/Sell
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="Index.php">Buy Phone</a>
              <a class="dropdown-item" href="Index.php">Sell Phone</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="Index.php">Something else here</a>

            </div>
          </li>
        </ul>
      <ul class="nav navbar-nav navbar-right">
      <li class="nav-item active"><a class="nav-link" href="#">Display Tables</a></li>
      <li><a class="nav-link" href="AddEditPhones.php">Add/Edit Phone</a></li>
      <li><a class="nav-link" href="addEditCustomer.php">Add/Edit Customer</a></li>
      <li><a class="nav-link" href="addEditOrder.php">Add/Edit Order</a></li>
      <li><a class="nav-link" href="logout.php">Log Out</a></li>    
      </ul>
      </div>
    </nav>
    <h4>Customers</h4>
      <?php
      $sql = "SELECT * FROM Customer";
      $result = mysqli_query($link, $sql);

      if (mysqli_num_rows($result) > 0)
      {
        echo "<b>"."Customer ID | Name | Phone Number | Shipping Address | Email Address"."</b>"."<br>";
        while($row = mysqli_fetch_assoc($result)) {
        echo $row["customerID"]. " | " . $row["name"]. " | " . $row["phone_number"]. " | " . $row["shipping_address"]. " | " . $row["email_address"]. "<br>";
    }
      }
      else
      {
        echo "nope";
      }
    ?>
    <h4>Payment Info</h4>
          <?php
      $sql = "SELECT * FROM PaymentInfo";
      $result = mysqli_query($link, $sql);

      if (mysqli_num_rows($result) > 0)
      {
        echo "<b>"."Card Number | Billing Address | Card Type | Expiration Date | Customer ID"."</b>"."<br>";
        while($row = mysqli_fetch_assoc($result)) {
        echo $row["cardNumb"]. " | " . $row["billing_address"]. " | " . $row["card_type"]. " | " . $row["exp_date"]. " | " . $row["customerID"]. "<br>";
    }
      }
      else
      {
        echo "nope";
      }
    ?>
      <h4>Orders</h4>
          <?php
      $sql = "SELECT * FROM Orders";
      $result = mysqli_query($link, $sql);

      if (mysqli_num_rows($result) > 0)
      {
        echo "<b>"."Order Number | Order Date | Expected Delivery | Order Type"."</b>"."<br>";
        while($row = mysqli_fetch_assoc($result)) {
        echo $row["order_numb"]. " | " . $row["order_date"]. " | " . $row["exp_delivery"]. " | " . $row["order_type"]. "<br>";
    }
      }
      else
      {
        echo "nope";
      }
    ?>
      <h4>Phones</h4>
      <?php
      $sql = "SELECT * FROM Phones";
      $result = mysqli_query($link, $sql);

      if (mysqli_num_rows($result) > 0)
      {
        echo "<b>"."Serial Number | Phone Model | Price | RAM | CPU | Condition | Sreen Size | Brand "."</b>"."<br>";
        while($row = mysqli_fetch_assoc($result)) {
        echo $row["serial_numb"]. " | " . $row["phone_model"]. " | " . $row["price"]. " | " . $row["RAM"]. " | " . $row["CPU"]. " | " . $row["conditions"]. " | " . $row["screen_size"]. " | ". $row["brand"] . "<br>";
    }
      }
      else
      {
        echo "nope";
      }
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>