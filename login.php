
<?php

include 'control.php';

if(empty($_POST['username']) || empty($_POST['password'])) {
  echo "Empty Password or Username!";
} else {

  // TODO: Log in stuff
  $succ = 0;
  for($i = 0; $i < sizeof($accessPasswords); $i++) {
    if($accessPasswords[$i] == $passMD5 && $accessUsernames[$i] == $username) {
      $succ++;
    }
  }

  if($succ > 0) {
    echo "Successful Login!";
    echo "<hr>";
    $newUsername = filter_var($username, FILTER_SANITIZE_STRING);
    $_SESSION["username"] = $newUsername;
    $_SESSION["currentdate"] = date('Y-m-d g:i:s');

    print_r($_SESSION);


    header("Location: index.php");
    die();
  } else {
    echo "Login Unsuccessful!";
    echo "<hr>";
  }
}

?>

<html>
<body>
  <a href = "index.php"> index </a>
</body>
</html>
