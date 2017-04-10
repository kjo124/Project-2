<?php
include 'inc/support.php';
include 'inc/control.php';
include 'inc/header.php';
?>
<!-- A Home page - Welcome message, info and links about other sections etc. -->

<!-- You must use the Bootstrap Framework to support your implementation. Alternative Frameworks may be approved on case-by-case basis if a team wishes to ask. -->
<div class="container-fluid">
	<div class="row visible-on">
		<div class="col-md-3">
			<?php include 'inc/authentication.php';?>
		</div>
		<div class="col-md-6">
			<p>Welcome to Kyle Odin & Bobby Elliott Project #2. We have added ability
				to add ingredients, a shopping cart, and customer/admin accounts. Feel
				free to login and comment on our ingredients.</p>
		</div>
		<div class="col-md-3">
			<div class="image">
				<img src="./assets/img/Logo.png" class="img-circle" alt="Logo" width="300" height="300">
			</div>
		</div>
	</div>
</div>

<?php include './inc/footer.php';?>
