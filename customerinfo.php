<?php 
  include ("info.php");
  session_start();

  if((isset($_SESSION['user_id']) && $_SESSION['user_id'] != ''))
  {
    header("location: Index.php");
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
    <div>
      <div class="container">
        <div class="jumbotron">
        <h4 class="text-center">Customer Info</h4>  
        <form action="" method="post">
          <div class="form-group">
          <label for="firstname">First Name:</label>
          <input type="text" class="form-control" name="firstname">
          </div>
          <div class="form-group">
          <label for="lastname">Last Name:</label>
          <input type="text" class="form-control" name="lastname">
          </div>
          <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" name="email">
          </div>
          <div class="form-group">
          <label for="Address">Address:</label>
          <input type="text" placeholder="1234 Main Street" class="form-control" name="addr">
          </div>
          <div class="form-group">
          <label for="city">City:</label>
          <input type="text" class="form-control" name="city">
          </div>
          <div class="form-group">
          <label for="city">City:</label>
          <input type="text" class="form-control" name="city">
          </div>
          <div class="form-group">
          <label for="state">State</label>
          <input type="text" placeholder="UT" class="form-control" name="screenSize">
          </div>
          <div class="form-group">
          <label for="Brand">Brand:</label>
          <input type="text" class="form-control" name="brand">
          </div>
          <div class="text-center">
          <input type="submit" value="Submit" name="update">
          </div>
        </form>
        </div>
    </div>

    <?php
      if(isset($_POST['update']))
      {
        var_dump($_POST);
        $name = ($_POST['firstname'] . $_POST['lastname']);
        echo $name;
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