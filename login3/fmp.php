<?php
session_start();
//echo session_name();
?>

<head>
	<link rel="stylesheet"
	href="./style.css"
	type="text/css" />
   
      
      <h2 align="center">Recover Password</h2> 
    </head>
        <body>
                    <div class = "container form-email">
                            <?php
                            $msg = '';
                            $sent= '';
                            if (isset($_POST['email'])  && !empty($_POST['username'])){
                                $nameOfUser = $_POST['username'];
                                $handle = fopen("users.csv", "r");
                                while (($data = fgetcsv($handle)) !==FALSE){
                                    if($nameOfUser == $data['0']){
                                        $email = $data['2'];
                                        $str = 'abcdefghijklmnopqrstuvwxyz123456';
                                        $shuffled = str_shuffle($str);
                                        
                                        
                                        $msg = "http://www.cs.colostate.edu/~bobby20/login3/reset.php?key=".$shuffled;
                                        $_SESSION['user'] = $nameOfUser;
                                        $_SESSION['key'] = $shuffled;
                                        $sent = 'Email sent!';
                                        // use wordwrap() if lines are longer than 70 characters
                                        

                                        // send email
                                        mail($email,"Password Reset",$msg);
                                        
                                        
                                    }
                                }
                                
//                                 $str = 'abcdefghijklmnopqrstuvwxyz123456';
//                                 $shuffled = str_shuffle($str);
                            }
                            ?>
                            <p align="center"><?php echo $sent; ?> </p>
                        </div>
                    
                        <div class = "container" align="center">
                                    <form class="form-email" role="form" action="" method="post">
                                        <p>Select user name:</p>
                                                <select name = "username">
                                                        <option value="bob">Bob</option>
                                                        <option value="ct310">ct310</option>
                                                </select>
                                                <br></br>
                                                <div class="button">
                                                <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "email">Send Email</button>
                                                </div>
						</form>
						<br><br><br>
                                </div>
                            </div>
                            
                </body>
<?php
include 'footer.php';
?>
