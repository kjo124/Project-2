
<?php 

include 'header.php';

if(empty($_POST['username']) || empty($_POST['password'])) {
  echo "Empty Password or Username!";
} else {

  $accessPassword1_MD5 = "3aaec86181ee6974b99d893b4c1eb5b5";
  $accessPassword2_MD5 = "1d470f10eef138324489569ae8f8ead7";
  $accessPassword3_MD5 = "5f4dcc3b5aa765d61d8327deb882cf99";

  $accessPasswords = array($accessPassword1_MD5, $accessPassword2_MD5, $accessPassword3_MD5);

  $accessUser1 = "ct310";
  $accessUser2 = "Dan";
  $accessUser3 = "Kyle";

  $accessUsernames = array($accessUser1, $accessUser2, $accessUser3);

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  $passMD5 = md5($password);


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