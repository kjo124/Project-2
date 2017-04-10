<!-- A Common Header (Title and Logo), Footer and Navigation elements on all pages - Please implement using the PHP include tag. -->

<!-- All your pages will carry a disclaimer on the footer in fine print which reads: "This site is part of a CSU CT 310 Course Project." The text "CT 310" will be a link to the course homepage. -->
</div>

<div class="footer">
	<?php
		if(isset($_SESSION["username"])) {
			echo "Logged in as: " . $_SESSION["username"];
			echo "<br>";
			echo "You are a: " . $_SESSION["userType"];
		} else {
			echo "Logged in as: Guest";
		}
		//echo "<br>";
		// print_r($_SESSION);
	?>
	<p>This site is part of a CSU <a href="https://www.cs.colostate.edu/~ct310/yr2017sp/index.php">CT 310</a> Course Project.</p>
	<a href = "./logout.php"> Logout </a>
</div>
</body>

</html>
