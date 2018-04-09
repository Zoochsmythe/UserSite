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

    <title>Hi-Tech Communications</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="Index.php">Hi-Tech Communications</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
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
      <li><a class="nav-link" href="displaytables.php">Display Tables</a></li>
      <li><a class="nav-link" href="AddEditPhones.php">Add/Edit Phone</a></li>
      <li class="nav-item active"><a class="nav-link" href="addEditCustomer.php">Add/Edit Customer</a></li>
      <li><a class="nav-link" href="addEditOrder.php">Add/Edit Order</a></li>
      <li><a class="nav-link" href="logout.php">Log Out</a></li>    
      </ul>
      </div>
    </nav>
    <div>
      <div class="container">
        <div class="jumbotron">
        <h4 class="text-center">Add/Update Customers</h4>  
        <form action="" method="post">
          <div class="form-group">
          <label for="customerID">Customer ID:</label>
          <input type="text" placeholder="Must be existing customer ID if updating..." class="form-control" name="customerID">
          </div>
          <div class="form-group">
          <label for="cName">Name:</label>
          <input type="text" class="form-control" name="cName">
          </div>
          <div class="form-group">
          <label for="phoneNumb">Phone Number:</label>
          <input type="number" class="form-control" name="phoneNumb">
          </div>
          <div class="form-group">
          <label for="shippingAdd">Shipping Address:</label>
          <input type="text" class="form-control" name="shippingAdd">
          </div>
          <div class="form-group">
          <label for="emailAdd">Email Address:</label>
          <input type="Email" class="form-control" name="emailAdd">
          </div>
          <div class="text-center">
          <input type="submit" value="Update" name="update">
          </div>
          <div class="text-center">
          <input type="Submit" value="Add Customer" name="add">
          </div>
        </form>
        </div>
    </div>

    <?php
      if(isset($_POST['update']))
      {
        var_dump($_POST);

        $customerID = test_input($_POST['customerID']);
        $cName = test_input($_POST['cName']);
        $phoneNumb = test_input($_POST['phoneNumb']);
        $shippingAdd = test_input($_POST['shippingAdd']);
        $emailAdd = test_input($_POST['emailAdd']);


        $sql = "UPDATE Customer SET customerID='$customerID', name='$cName', phone_number='$phoneNumb', shipping_address='$shippingAdd', email_address='$emailAdd' WHERE customerID='$customerID'";

        if ($link->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $link->error;
        }
      }
      elseif(isset($_POST['add']))
      {
        $customerID = test_input($_POST['customerID']);
        $cName = test_input($_POST['cName']);
        $phoneNumb = test_input($_POST['phoneNumb']);
        $shippingAdd = test_input($_POST['shippingAdd']);
        $emailAdd = test_input($_POST['emailAdd']);

        $sql = "INSERT INTO Customer VALUES ('$customerID', '$cName', '$phoneNumb', '$shippingAdd', '$emailAdd')";

        if ($link->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $link->error;
        }
      }


      function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
      ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>