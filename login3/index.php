<?php
   ob_start();
   session_start();
   require_once 'passwordLib.php';
    $nameOfUser = $password = '';
   ?>


   
<!DOCTYPE html>
<html>
<head>
<meta name="Author" content="Bobby Elliott">
<meta name="description" content="Assignment6">
<meta name="keywords" description="HTML, CT310, CSS">
<title>Bobby Elliott Login2</title>
<link rel="stylesheet"
	href="./style.css"
	type="text/css" />
</head>
	
   <body>
      
      <h2 align="center">Enter Username and Password</h2> 
      <div class = "container form-signin">
         
         <?php
             $msg = '';
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
               $nameOfUser = $_POST['username'];
                $handle = fopen("users.csv", "r");
                while (($data = fgetcsv($handle)) !==FALSE){
                 if(($nameOfUser == $data['0']) && password_verify($_POST['password'], $data['1']) ){
                 $_SESSION['valid'] = true;
                 $_SESSION['timeout'] = time();
                 $_SESSION['username'] = $_POST['username'];
                 header("location: protected.php"); 
               }
               else {
                   $msg = 'Wrong username or password';
                   }
            }
        }
         ?>
      </div> <!-- /container -->
      
      <div class = "container" align="center">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            Username:
            <input type = "text" class = "form-control" 
               name = "username" ></br>
            Password:
            <input type = "password" class = "form-control"
               name = "password" >
            <div class="button">
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
            </div>
         </form>
         Forget your password? Click <a href = "./fmp.php" tite = "Logout">here</a>!
      </div> 
      
      

<?php
include 'inc/footer.php';
?>
      
   </body>
</html>
