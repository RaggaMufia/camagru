<?php
session_start();
?>
<!DOCTYPE html>
<HTML>
  <header>
    <link rel="stylesheet" type="text/css" href="style/index.css">
    <meta charset="UTF-8">
    <title>SIGNUP</title>
  </header>
  <body>
    <div id="login">
      <div class="title">SIGNUP</div>
      <div id="blue">
        <form method="post" style="position: relative;" action="functions/signup.php">
          <label>Email: </label>
          <input id="mail" name="email" placeholder="email" type="mail">
          <label>Username: </label>
          <input id="name" name="username" placeholder="username" type="text">
          <label>Password: </label>
          <input id="password" name="password" placeholder="password" type="password">
          <input name="submit" type="submit" value=" SEND ">
        </form>
      </div>
      <?php
      echo $_SESSION['error'];
      $_SESSION['error'] = null;
      if (isset($_SESSION['signup_success'])) {
        echo "Signup success please check your mail box";
        $_SESSION['signup_success'] = null;
      }
      ?>
    </div>
  </body>
</HTML>
