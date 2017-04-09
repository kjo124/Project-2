
<?php

include 'inc/control.php';
require_once 'assets/passwordLib.php';

             $msg = '';
            if (!empty($_POST['username'])
               && !empty($_POST['password'])) {
               $nameOfUser = $_POST['username'];
                $handle = fopen("databases/users.csv", "r");
                while (($data = fgetcsv($handle)) !==FALSE){
                 if(($nameOfUser == $data['0']) && password_verify($_POST['password'], $data['1']) ){
                 $_SESSION['valid'] = true;
                 $_SESSION['curentdate'] = date('Y-m-d g:i:s');
                 $_SESSION['username'] = $_POST['username'];
                 if($nameOfUser == "Bobby" || $nameOfUser == "Kyle" || $nameOfUser == "ct310"){
                    $_SESSION['userType'] = "Administrator";
                 }
                 else{
                    $_SESSION['userType'] = "Customer";
                 }
                 header("location: index.php");
                 die();
               }
               else {
                   $msg = 'Wrong username or password';
                   }
            }
        }

// if(empty($_POST['username']) || empty($_POST['password'])) {
//   echo "Empty Password or Username!";
// } else {
//
//
//
//
//   // TODO: Log in stuff
//   $succ = 0;
//   for($i = 0; $i < sizeof($accessPasswords); $i++) {
//     if($accessPasswords[$i] == $passMD5 && $accessUsernames[$i] == $username) {
//       $succ++;
//     }
//   }
//
//   if($succ > 0) {
//     echo "Successful Login!";
//     echo "<hr>";
//     $newUsername = filter_var($username, FILTER_SANITIZE_STRING);
//     $_SESSION["username"] = $newUsername;
//     $_SESSION["currentdate"] = date('Y-m-d g:i:s');
//
//     print_r($_SESSION);
//
//
//     header("Location: index.php");
//     die();
//   } else {
//     echo "Login Unsuccessful!";
//     echo "<hr>";
//   }
// }

?>

<html>
<body>
    <?php header("location: index.php"); ?>
  <a href = "index.php"> index </a>
</body>
</html>
