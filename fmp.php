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
                                $handle = fopen("databases/users.csv", "r");
                                while (($data = fgetcsv($handle)) !==FALSE){
                                    if($nameOfUser == $data['0']){
                                        $email = $data['2'];
                                        $str = 'abcdefghijklmnopqrstuvwxyz123456';
                                        $shuffled = str_shuffle($str);
                                        
                                        
                                        $msg = "http://www.cs.colostate.edu/~kjo124/Project-2/reset.php?key=".$shuffled;
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
                                                        <option value="Bobby">Bobby</option>
                                                        <option value="Kyle">Kyle</option>
                                                        <option value="ct310">ct310</option>
                                                        <option value="Fred">fred</option>
                                                        <option value="cust2">Cust2</option>
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
<div class = "footer">
<p>This site is part of a CSU <a href="https://www.cs.colostate.edu/~ct310/yr2017sp/index.php">CT 310</a> Course Project.</p>
</div>
