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
			<blockquote cite="https://en.wikipedia.org/wiki/Cabbage">
            Cabbage or headed cabbage (comprising several cultivars of Brassica 
            oleracea) is a leafy green or purple biennial plant, grown as an 
            annual vegetable crop for its dense-leaved heads. It is descended 
            from the wild cabbage, B. oleracea var. oleracea, and is closely 
            related to broccoli and cauliflower (var. botrytis), Brussels 
            sprouts (var. gemmifera) and savoy cabbage (var. sabauda) which are 
            sometimes called cole crops. Cabbage heads generally range from 0.5 
            to 4 kilograms (1 to 9 lb), and can be green, purple and white. 
            Smooth-leafed firm-headed green cabbages are the most common, with 
            smooth-leafed red and crinkle-leafed savoy cabbages of both colors 
            seen more rarely. It is a multi-layered vegetable. Under conditions 
            of long sunlit days such as are found at high northern latitudes in 
            summer, cabbages can grow much larger. 
            </blockquote> 
		</div>
		<div class="col-md-3">
			<div class="image">
				<img src="Cabbage.jpg" class="img-circle" alt="Cabbage" width="300" height="300">
			</div>
			
			<p class="caption">Image from <a href="http://www.morguefile.com/">Morguefile</a></p>
		</div>
	</div>
</div>

<?php include 'footer.php';?>
