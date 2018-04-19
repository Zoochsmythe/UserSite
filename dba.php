<?php 
  include ("info.php");
  session_start();

  if(!(isset($_SESSION['admin']) && $_SESSION['admin'] != ''))
  {
    header("location: dbalogin.php");
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
  <div class="jumbotron">
  <h1 class="text-center">Database Admin Site</h1>
  </div>
  <h4>MySQL Server</h4>
  <?php 

    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

printf("System status: %s\n", mysqli_stat($link));

mysqli_close($link);
  ?>
  <form action="" method="post">
    <div>
    <input type="submit" value="Backup Database" name="sqlbackup">
    </div>
  </form>

  <?php 
  if(isset($_POST['sqlbackup']))
  {
    $dbhost ='localhost:3306';
    $dbuser = 'databaseadmin';
    $dbpass = 'pwned noob';
    $filename='hitech_backup' . date("Y-m-d-H-i-s") . '.sql';
    $output = NULL;
    $return_var = NULL;

    $result="mysqldump -u root -ppassword hitech -r '/var/backups/$filename'";
    exec($result, $output, $return_var);
    echo "Copy and past the following command into a the terminal: ";
    echo $result;

  }
  ?>
  <h4>MongoDB</h4>

  <?php 
  $output = shell_exec('ps aux | grep mongo');
  echo "<pre>$output</pre>";
  ?>
  <form action="" method="post">
    <div>
    <input type="submit" value="Backup Database" name="mongobackup">
    </div>
  </form>

    <?php 
  if(isset($_POST['mongobackup']))
  {
    $output = 'mongodump -d hitech -o /var/backups/';
    echo "Copy and past the following command into a the terminal: ";
    echo $output;

  }
  ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>