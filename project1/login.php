<?php
$loginPage = TRUE;
include 'header.php';
include 'nav.php';


?>
	<body>
		
	<!-- create three coulumn with lg and md size-->
		
		<div class="container-fluid">
			<div class="row visible-on">
                            <div class="col-md-4">
                                <img src="tumeric2.jpg" class="img" alt="tumeric" width="250" height="200"></img>
                                <img src="kohlrabi.jpg" class="img" alt="kohlrabi" width="250" height="200"></img>
                                <img src="cilantro.jpg" class="img" alt="cilantro" width="250" height="200"></img>
                                <p> Images from <a href=https://draxe.com/cilantro-benefits/>draxe.com</a> , <a href=http://www.simplyrecipes.com/kohlrabi/>simplyrecipes</a> , and <a href=https://d2v4vjmuxdiocn.cloudfront.net/wp-content/uploads/Curmin-image.jpg>cloudfront.net</a> </p>
                            </div>
            
					
	<!-- Add Main Content here -->
                <div class="col-lg-5">
                        <div class="Title">
                        <h1>Log In</h1> 
                            <h4>Welcome Users.
                            </h4> 
                        </div>
                        <div class="maincontent">
						<?php
						$msg = '';
						if(isset($_POST['submit'])){
							if($_POST['username'] == 'jack' && md5($_POST['pass']) == '81dc9bdb52d04dc20036dbd8313ed055'){
								$_SESSION['valid'] = true;
								$_SESSION['timeout'] = time();
								$_SESSION['username'] = "jack";
								echo "logged in";
							} 
							if($_POST['username'] == 'bobby' && md5($_POST['pass']) == 'd93591bdf7860e1e4ee2fca799911215'){
								$_SESSION['valid'] = true;
								$_SESSION['timeout'] = time();
								$_SESSION['username'] = "bobby";
								echo "logged in";
							} 
							if($_POST['username'] == 'ct310' && md5($_POST['pass']) == 'c783f34850cf52c7fae565a7b83b3521'){
								$_SESSION['valid'] = true;
								$_SESSION['timeout'] = time();
								$_SESSION['username'] = "ct310";
								echo "logged in";
							} 
						} else {
							$_SESSION['valid'] = false;
							echo "Please Log in";
						}
						?>
						<br><br>
						<div class="loginFormat">
					
						<form action="" method="post">
							<p>User Name:</p>
							<select name = "username">
								<option value="jack">Jack</option>
								<option value="bobby">Bobby</option>
								<option value="ct310">ct310</option>
							</select>
							<br><br>
							<p>Password:</p><input type="password" name="pass"><br><br>
							<input type="submit" value="Login" name = "submit">
						</form>
						<br><br><br>
                        </div>
                        </div>	
                </div>
		</div>
		</div>
<?php
include 'footer.php';
?>

	</body>
</html>
