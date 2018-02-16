<?php
  require_once('phpscripts/config.php');
  confirm_logged_in();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome to the admin index page</title>
</head>
<body>
  <h2>HELLOOOOOO</h2>
  <?php echo $_SESSION['user_name']; ?>

</body>
</html>
