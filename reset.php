<?php
session_start();
//echo session_name();
//echo $_SESSION['user'];
?>

<head>
	<link rel="stylesheet"
	href="./style.css"
	type="text/css" />


      <h2 align="center">Reset Password</h2>
</head>
<body>

                <div class = "container form-reset">
                            <?php
                            $key = $_GET['key'];
                            $msg = '';
                            if($key == $_SESSION['key']){
                            require_once 'assets/passwordLib.php';
                            include 'inc/support.php';
                            $arr = readUsers();

                            if (isset($_POST['reset'])  && !empty($_POST['password']) && !empty($_POST['password2'])){
                                if($_POST['password'] === $_POST['password2']){
                                //echo $_SESSION['user'];
                                    $nameOfUser = $_SESSION['user'];
                                    //echo $nameOfUser;

                                    for($i = 0; $i < count($arr); $i++){
                                    if($arr[$i]->username == $nameOfUser){
                                        $arr[$i]->password = password_hash($_POST['password']);
                                    }
                                }

                                writeUsers($arr);
                                $msg = 'Password Reset Sucessful!';

                                }

                            else{
                                $msg = 'Passwords do not match.';
                                //echo $msg;
                            }
                        }
                    }
                            ?>
                         <p align="center"><?php echo $msg; ?> </p>
                        </div>

<div class = "container" align="center">

         <form class = "form-reset" role = "form"
            action = "" method = "post">
            Password:
            <input type = "password" class = "form-control"
               name = "password" >
            Confirm Password:
            <input type = "password" class = "form-control"
               name = "password2" >
            <div class="button">
            <button class = "btn btn-lg btn-primary btn-block" type = "submit"
               name ="reset">reset</button>
            </div>
         </form>
</div>
</body>
<p align="center">Back to <a href = "./index.php" tite = "Login">Login</a> page.
<?php
include 'inc/footer.php';
?>
