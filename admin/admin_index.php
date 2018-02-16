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
  <link rel="stylesheet" href="../css/main.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <title>Welcome to the admin index page</title>
</head>
<body>
  <img src="images/header.jpg" alt="header image" id="header-img">
  <div id="admin-container">
  <i class="far fa-star"></i>
  <i class="far fa-star"></i>
  <i class="far fa-star"></i>
  <i class="far fa-star"></i>
  <i class="far fa-star"></i>
  <i class="far fa-star"></i>
  <i class="far fa-star"></i>

<?php

// $time = date("H");
// $timezone = date("e");

date_default_timezone_set('America/New_York');
$time = date('G');

?>

<h3> <?php

  if ( $time >= 5 && $time <= 11 ) {
      echo "Good Morning, ";
  } else if ( $time >= 12 && $time <= 18 ) {
      echo "Good Afternoon, ";
  } else if ( $time >= 19 || $time <= 4 ) {
      echo "Good Evening, ";
  };
  echo $_SESSION['user_name']; ?>!</h3>

  <h2>You're finally here! <br>We've been waiting for you!</h2>

  <h4> Your last time here was <?php echo $_SESSION['user_lastlog']; ?> </h4>

  <i class="far fa-star"></i>
  <i class="far fa-star"></i>
  <i class="far fa-star"></i>
  <i class="far fa-star"></i>
  <i class="far fa-star"></i>
  <i class="far fa-star"></i>
  <i class="far fa-star"></i>
</div>
<img src="images/footer.jpg" alt="footer image" id="footer-img">
</body>
</html>
