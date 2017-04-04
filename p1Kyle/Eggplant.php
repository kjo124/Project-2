<?php
include 'header.php';
?>

<!-- Individual pages for each ingredient sold. For now, these are real pages in the sense there is a *.php file on the server for each ingredient. You will be assigned three ingredents that must appear on your site. (See Addendum at the bottom of this page for assignments.)  -->

<!-- Each Ingredient needs a picture, and you must include an acknowledgement with each picture clearly showing the origin of the picture and in so doing indicating your right to use that image. -->

<div class="container-fluid">
	<div class="row visible-on">
		<div class="col-md-3">
			<?php include 'Authentication.php';?>

            <!-- Provision for commenting on an ingredient. Comments may only be entered by authenticated users. For Project 1 you need only redisplay the comment temporarily. To be clear, you need not yet build and archival store able to retain comments over time. That requirement will come in Project 2. -->
            <?php include 'Commenting.php';?>
		</div>
		<div class="col-md-6">
			<blockquote cite="https://en.wikipedia.org/wiki/Eggplant">
            Eggplant (Solanum melongena), or aubergine, is a species of 
            nightshade grown for its edible fruit. Eggplant is the common name 
            in North America and Australia, but British English uses the French 
            word aubergine. It is known in South Asia, Southeast Asia, and South 
            Africa as brinjal.
            </blockquote> 
		</div>
		<div class="col-md-3">
			<div class="image">
				<img src="Eggplant.jpg" class="img-circle" alt="Eggplant" width="300" height="300">
			</div>
			
			<p class="caption">Image from <a href="http://www.morguefile.com/">Morguefile</a></p>
		</div>
	</div>
</div>

<?php include 'footer.php';?>
