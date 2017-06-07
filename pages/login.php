<?php if (isset($_TOKEN['token']) header('Location: index.php?page=home'); ?>
<?php
  if (!isset($_POST["submit"])) {
?>
  <form name="login-form" class="login-form" action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <input name="username" type="text" placeholder="Username" />
    <input name="password" type="password" placeholder="Password" /></br>
    <input type="submit" name="submit" value="Login" />
  </form>
  <?php } else { ?>
  <?php
    //Handle our login request
    $username = $_POST['username'];
    $password = $REnc->REnc_Encrypt_V3_Short($_POST['password'], $shopEncryptionKey);
    $valid = $User->DoLogin($username, $password);
    if ($valid[0] == false) {
      echo "Wrong username or password";
    } else {
      echo "Welcome";
      header("Location: index.php");
    }
    $_SESSION['token'] = $valid[1];
    $_SESSION['user'] = $valid[2];
?>
<?php } ?>
