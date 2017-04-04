<!-- A Common Header (Title and Logo), Footer and Navigation elements on all pages - Please implement using the PHP include tag. -->
<!-- links -->
<!-- <a href="index.php">Home</a> -->
<!-- <a href="AboutUs.php">About Us</a> -->
<!-- <a href="Cabbage.php">Cabbage</a> -->
<!-- <a href="Eggplant.php">Eggplant</a> -->
<!-- <a href="Leek.php">Leek</a> -->

<nav class="navbar navbar-inverse">
  	<div class="container-fluid">
		<div class="navbar-header">
    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>                        
      		</button>
      		<a class="navbar-brand" href="#">Tasty</a>
    	</div>
    	<div class="collapse navbar-collapse" id="myNavbar">
     		<ul class="nav navbar-nav">
     			<li><a href="index.php">Home</a></li>
     			<li><a href="AboutUs.php">About Us</a></li>
        		<li class="dropdown">
          			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Ingredients<span class="caret"></span></a>
      				<ul class="dropdown-menu">
   						<li><a href="Cabbage.php">Cabbage</a></li>
    					<li><a href="Eggplant.php">Eggplant</a></li>
    					<li><a href="Leek.php">Leek</a></li>
        			</ul>
        		</li>
      		</ul>
    	</div>
  	</div>
</nav>

