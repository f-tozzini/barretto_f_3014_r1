<?php
  require_once('phpscripts/config.php');
  $ip = $_SERVER['REMOTE_ADDR'];
  // echo $ip;
  if(isset($_POST['submit'])){
    // echo "works";
    $username = trim($_POST['username']); //trim removes the white space when people try to copy and paste
    $password = trim($_POST['password']);
    if($username !== "" && $password !== ""){ //if it's identical
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
  <link rel="stylesheet" href="../css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body>

  <img src="images/header.jpg" alt="header image" id="header-img">
  <div id="login-container">
  <h3>Login here for your</h3>
  <h2>Personalized Movie Selection</h2>
  <form action ="admin_login.php" method="post">

    <i class="fas fa-sign-in-alt"></i>
    <label>  Username:</label>
    <input type ="text"name="username" value="">
    <br><br>

    <i class="fas fa-unlock"></i>
    <label>Password:</label>
    <input type ="password" name="password" value="">
    <br><br>

    <input type ="submit" name="submit" value="SUBMIT" class="button">
  </form>
      <?php if (!empty($message)){ echo $message; }?>
</div>
  <img src="images/footer.jpg" alt="footer image" id="footer-img">
</body>
</html>
