<!-- An Authentication Page - a simple hardwired authentication - hardcode at least 3 sets of credentials. One for each of you on the team and a third with Username: ct310. The password for this user is provided below. -->

<!-- You need sanitize user input. Refer to this Sanitize and Validate Data with PHP Filters for a nice explanation of how best to sanitize input. -->

<center>
<form id='login' action = "login.php" method='post' accept-charset='UTF-8'>
<fieldset >
<hr>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for='username' >Username:</label>
<input type='text' name='username' id='username'  maxlength="50" />
<label for='password' >Password:</label>
<input type='password' name='password' id='password' maxlength="50" />
<input type='submit' name='Submit' value='Submit' />
</fieldset>
</form>
Forget your password? Click <a href = "./fmp.php" tite = "Logout">here</a>!
<hr>
</center>
