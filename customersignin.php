<?php
  include("info.php");
  session_start();
?>

<!DOCTYPE HTML>

<?php
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($link,$_POST['username']);
      $mypassword = mysqli_real_escape_string($link,$_POST['password']); 
      
      $loginSQL = "UPDATE Admin SET logged_in='1' WHERE username='$_POST[username]'";
      $changed = mysqli_query($link, $loginSQL);

      $sql = "SELECT username FROM customerlogin WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         $_SESSION['user_id'] = $myusername;
         $_SESSION['logged_in'] = 1;
         
         header('location: Index.php');
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
      <link rel="icon" href="/favicon.ico" type="image/x-icon">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="/css/zoochstyle.css">
      <script src="http://code.jquery.com/jquery-latest.min.js"></script>
      <script src="/js/bootstrap.js"></script>
      <script type="text/javascript" src="/js/custom.js"></script>
      
   </head>
   
   <body>
    <div class="container">
      <div class="jumbotron">
      <div class="wrapper">
        <form class="form-signin" action = "" method ="post">       
           <h2 class="form-signin-heading">Customer Login</h2>
             <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
             <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
             <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
             <p><a href="customerinfo.php">Not a member? Register here!</a></p>
             <div><?php echo $error; ?></div> 
        </form>
       </div>
     </div>
   </div>
   </body>
</html>