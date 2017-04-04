

<div class="footer">
        <?php  
        if($_SESSION['valid'] == true){
			echo 'User ', $_SESSION['username'], ' logged in at ',  date("Y/m/d h:i:sa"), ' click <a href="./logout.php">here</a> to logout';
		}
		else{
			echo 'logged in as guest';
		}
        ?>
        
        
	<p> This site is part of a CSU <a href="https://www.cs.colostate.edu/~ct310/yr2017sp/">CT 310</a> Course Project.</p>
	

