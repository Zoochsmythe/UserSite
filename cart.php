<?php 
  include ("info.php");
  session_start();

  if(!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != ''))
  {
    header("location: customersignin.php");
  }
?>


<?php
  $serial_numb = $_GET['serial_numb'];
  $phone_model = $_GET['phone_model'];
  $price = $_GET['price'];
  $username = $_SESSION['user_id'];

  $serialnumb = mysqli_real_escape_string($link,$serial_numb);
  $phonemodel = mysqli_real_escape_string($link,$phone_model);
  $price = mysqli_real_escape_string($link,$price);
  $username = mysqli_real_escape_string($link,$username);

  $stmt = $link->prepare("INSERT INTO cart (username, serial_numb, phone_model, price) VALUES (?,?,?,?)");

  $stmt->bind_param("sssi", $username, $serialnumb, $phonemodel, $price);
  $stmt->execute();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css">

    <title>Cart</title>
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
              <a class="dropdown-item" href="buyPhones.php">Buy Phone</a>
              <a class="dropdown-item" href="buyPhones.php">Sell Phone</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="Index.php">Something else here</a>
            </div>
          </li>
        </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a class="nav-link" href="session.php">Admin Login</a></li>    
      </ul>
      </div>
    </nav>
    <div>
      <div class="container">
        <div class="jumbotron">
        <h4 class="text-center"><?php echo $username ?>'s Cart</h4>
        <table class="table">
            <tr> 
                <th scope="col">Serial Number</th> 
                <th scope="col">Phone Model</th> 
                <th scope="col">Price</th>  
            </tr> 
            <?php 
            
            $sql="SELECT serial_numb, phone_model, price FROM cart ORDER BY phone_model ASC";  
            $query = mysqli_query($link, $sql);
            $total = 0;
                
            while ($row=mysqli_fetch_array($query)) { 
                    
            ?> 
                <tr> 
                    <td><?php echo $row['serial_numb'] ?></td> 
                    <td><?php echo $row['phone_model'] ?></td> 
                    <td>$<?php echo $row['price'] ?></td>
                    <?php $total = $total + $row['price']?>
                </tr> 
            <?php 
                    
            } 

            ?>
            <tr>
              <td></td>
              <td></td>
              <th>Total</th>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>$<?php echo $total?></td>
            </tr>
            </table>
            <form action="" method="post">
            <div class="text-center">
            <input type="submit" value="Submit" name="update">
            </div>
            </form>
        </div>
    </div>

    <?php
      if(isset($_POST['update']))
      {
        $command = 'python insertdoc.py '.$username.' '.$total;
        exec($command);

        $stmt = $link->prepare("DELETE FROM cart WHERE username=(?)");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        header("location:Index.php");
      }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>