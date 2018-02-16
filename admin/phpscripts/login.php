<?php
  function logIn($username, $password, $ip) {
    require_once('connect.php');
    $username = mysqli_real_escape_string($link, $username);
    $password = mysqli_real_escape_string($link, $password);
    $loginstring = "SELECT * FROM tbl_user WHERE user_name= '{$username}' AND user_pass='{$password}'";
    $user_set = mysqli_query($link, $loginstring);


    if(mysqli_num_rows($user_set)){
      $founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
      $id = $founduser['user_id'];
      $_SESSION['user_id'] = $id;
      $_SESSION['user_name'] = $founduser['user_fname'];

      //Last Log in hour save
      $_SESSION['user_lastlog'] = $founduser['user_lastlog'];

      $lastlogin = "UPDATE tbl_user SET user_lastlog = NOW()";
      $lastlogin .= "WHERE id = {$_SESSION['user_id']} LIMIT 1";
      $lastloginquery = mysqli_query($link, $lastlogin);


      //User Block
      // $ip = $_SERVER['REMOTE_ADDR'];
      // $loginfail = $mysqli->query("SELECT count(user_ip) AS
      // user_fail FROM tbl_user WHERE user_ip = '$ip'
      // AND date BETWEEN user_date( NOW() , INTERVAL 1 DAY ) AND NOW()");
      //
      // $row  = $result->fetch_assoc();
      // $failed_login = $row['user_fail'];
      // $loginfail ->free();


      //User's Login

      if(mysqli_query($link, $loginstring)){
        $update ="UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id={$id}";
        $updatequery = mysqli_query($link, $update);
      }
      redirect_to("admin_index.php");
      // echo $id;
      }else{
        $message = "Wrong information. Try again!";
        return $message;
      }
      // if ($failed_login < 3) {
  		// 	$mysqli->query("INSERT INTO user_fail (user_ip, date) VALUES ('$ip', NOW())");
  		// } else {
  		// 	$failmessage = "You have tried more than 3 invalid attempts. Your user is blocked.";
  		// }

      function confirmIP($ipvalue) {

        $login = "SELECT user_fail, (CASE when user_lastlog is not NULL and DATE_ADD(user_lastlog, INTERVAL ".TIME_PERIOD.
        " MINUTE)>NOW() then 1 else 0 end) as Denied FROM ".tbl_user." WHERE user_ip = '$ipvalue'";

        $result = mysql_query($login, $this->connection);
        $data = mysql_fetch_array($result);

          if (!$data) {
            return 0;
          }
          if ($data["user_fail"] >= user_fail_NUMBER) {

          if($data["Denied"] == 1) {
          return 1;

          } else {
          $this->clearFail($ipvalue);

          return 0;
            } }
          return 0;
          }

    function failNumber($ipvalue) {

     //Set login attempts

     $login  = "SELECT * FROM ".tbl_user." WHERE user_ip = '$ipvalue'";
     $result = mysql_query($login, $this->connection);
     $data = mysql_fetch_array($result);

     if($data)
     {
       $attempts = $data["user_fail"]+1;

       if($attempts==3) {
         $login  = "UPDATE ".tbl_user." SET user_fail=".$attempts.", user_lastlog=NOW() WHERE user_ip = '$ipvalue'";
         $result = mysql_query($login, $this->connection);
       }
       else {
         $login  = "UPDATE ".tbl_user." user_fail=".$attempts." WHERE user_ip = '$ipvalue'";
         $result = mysql_query($login , $this->connection);
       }
     }
     else {
       $login = "INSERT INTO ".tbl_user." (user_fail, user_ip, user_lastlog) values (1, '$ipvalue', NOW())";
       $result = mysql_query($login , $this->connection);
     }
  }

  function clearFail($ipvalue) {
  $login = "UPDATE ".tbl_user." SET user_fail = 0 WHERE user_ip = '$ipvalue'";
  return mysql_query($login, $this->connection);
}




    // echo mysqli_num_rows($user_set);
    // echo $loginstring;

    mysqli_close($link);
  }

 ?>
