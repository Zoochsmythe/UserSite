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
      <li class="nav-item active"><a class="nav-link" href="AddEditPhones.php">Add/Edit Phone</a></li>
      <li><a class="nav-link" href="addEditCustomer.php">Add/Edit Customer</a></li>
      <li><a class="nav-link" href="addEditOrder.php">Add/Edit Order</a></li>
      <li><a class="nav-link" href="logout.php">Log Out</a></li>    
      </ul>
      </div>
    </nav>
    <div>
      <div class="container">
        <div class="jumbotron">
        <h4 class="text-center">Add/Update Phones</h4>  
        <form action="" method="post">
          <div class="form-group">
          <label for="serialnumb">Serial Number:</label>
          <input type="text" placeholder="Must be existing serial number if updating..." class="form-control" name="serialnumb">
          </div>
          <div class="form-group">
          <label for="phoneModel">Phone Model:</label>
          <input type="text" class="form-control" name="phoneModel">
          </div>
          <div class="form-group">
          <label for="price">Price:</label>
          <input type="number" class="form-control" name="price">
          </div>
          <div class="form-group">
          <label for="RAM">RAM:</label>
          <input type="number" class="form-control" name="RAM">
          </div>
          <div class="form-group">
          <label for="CPU">CPU:</label>
          <input type="text" class="form-control" name="CPU">
          </div>
          <div class="form-group">
          <label for="condition">Condition:</label>
          <input type="text" class="form-control" name="condition">
          </div>
          <div class="form-group">
          <label for="screenSize">Screen Size:</label>
          <input type="number" step="0.1" maxlength="2" class="form-control" name="screenSize">
          </div>
          <div class="form-group">
          <label for="Brand">Brand:</label>
          <input type="text" class="form-control" name="brand">
          </div>
          <div class="text-center">
          <input type="submit" value="Update" name="update">
          </div>
          <div class="text-center">
          <input type="Submit" value="Add Phone" name="add">
          </div>
        </form>
        </div>
    </div>

    <?php
      if(isset($_POST['update']))
      {
        var_dump($_POST);

        $serialnumber = test_input($_POST['serialnumb']);
        $phonemodel = test_input($_POST['phoneModel']);
        $price = test_input($_POST['price']);
        $RAM = test_input($_POST['RAM']);
        $CPU = test_input($_POST['CPU']);
        $conditions = test_input($_POST['condition']);
        $screensize = test_input($_POST['screenSize']);
        $brand = test_input($_POST['brand']);

        $sql = "UPDATE Phones SET serial_numb='$serialnumber', phone_model='$phonemodel', price='$price', RAM='$RAM', CPU='$CPU', conditions='$conditions', screen_size='$screensize', brand='$brand' WHERE serial_numb='$serialnumber'";

        if ($link->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $link->error;
        }
      }
      elseif(isset($_POST['add']))
      {
        $serialnumber = test_input($_POST['serialnumb']);
        $phonemodel = test_input($_POST['phoneModel']);
        $price = test_input($_POST['price']);
        $RAM = test_input($_POST['RAM']);
        $CPU = test_input($_POST['CPU']);
        $conditions = test_input($_POST['condition']);
        $screensize = test_input($_POST['screenSize']);
        $brand = test_input($_POST['brand']);

        $sql = "INSERT INTO Phones VALUES ('$serialnumber', '$phonemodel', '$price', '$RAM', '$CPU', '$conditions', '$screensize', '$brand')";

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