<?php
  require_once('phpscripts/config.php');
  $ip = $_SERVER['REMOTE_ADDR'];
  // echo $ip;
  if(isset($_POST['submit'])){
    // echo "works";
    $username = trim($_POST['username']); //trim removes the white space when people try to copy and paste
    $password = trim($_POST['password']);
    if($username !== "" && $password !== ""){ //if it's identical to
      $result = logIn($username, $password, $ip);
      $message = $result;
    }else{
      $message = "Please Fill the required fields.";
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome to your login pannel</title>
</head>
<body>
  <?php if (!empty($message)){ echo $message; }?>
  <form action ="admin_login.php" method="post">
    <label>Username:</label>
    <input type ="text"name="username" value="">
    <br><br>

    <label>Password:</label>
    <input type ="password" name="password" value="">
    <br><br>

    <input type ="submit" name="submit" value="show me the money">
  </form>


</body>
</html>
