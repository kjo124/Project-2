<?php
session_start('newSesh');
//print_r($_SESSION);
?> 


<p align="center">User <?php echo $_SESSION['username'] ?>
    
    <?php echo "Logged in " . date("Y/m/d h:i:sa"); ?>
     and has been logged in for
     <?php echo time() - $_SESSION['timeout']?> seconds.
<br></br>
Click here to <a href = "logout.php" tite = "Logout"> Logout</a>.

<?php
include 'footer.php';
?>
