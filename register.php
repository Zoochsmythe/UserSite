<?php 
  include ("info.php");
  session_start();

  if((isset($_SESSION['user_id']) && $_SESSION['user_id'] != ''))
  {
    header("location: Index.php");
  }
?>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

  $pwd1 = mysqli_real_escape_string($link,$_POST['pwd']);
  $myusername = mysqli_real_escape_string($link, $_POST['username']);


  $sql = "SELECT username FROM customerlogin WHERE username = '$_POST[username]'";
  $result = mysqli_query($link,$sql); 

  if(mysqli_num_rows($result) != 0)
  {
    $error = "Username taken. Please Enter a Different username.";
  }
  else
  {
    $insertquery = "INSERT INTO customerlogin (`username`, `password`) VALUES ('$myusername', '$pwd1')";
    mysqli_query($link, $insertquery);
    header('location: Index.php');
  }
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

    <title>Sign Up</title>
  </head>
  <body>
    <div>
      <div class="container">
        <div class="jumbotron">
        <h4 class="text-center">Create Username & Password</h4>
        <form action="" method="post">
        <div><?php echo $error; ?></div> 
          <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" name="username">
          </div>
          <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" name="pwd">
          </div>
          <div class="text-center">
          <input type="submit" value="Submit" name="update">
          </div>
        </form>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>