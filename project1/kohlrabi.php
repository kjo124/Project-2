<?php
include 'header.php';
include 'nav.php';
?>
<body>

                    <div class="container-fluid">
                        <div class="row visible-on">
                            <div class="col-md-3">
                                <img src="kohlrabi2.jpg" class="img" alt="kohlrabi" width="250" height="375"></img>
                            </div>
                            
                            <div class="col-md-5">
                                    <div class="Title">
                                        <h1>Kohlrabi</h1> 
                                    </div>
                                <div class="maincontent">    
                                    <p> Kohlrabi has been created by artificial selection for lateral meristem growth (a swollen, nearly spherical shape); its origin in nature is the same as that of cabbage, broccoli, cauliflower, kale, collard greens, and Brussels sprouts: they are all bred from, and are the same species as, the wild cabbage plant (Brassica oleracea). </p><p>The taste and texture of kohlrabi are similar to those of a broccoli stem or cabbage heart, but milder and sweeter, with a higher ratio of flesh to skin. The young stem in particular can be as crisp and juicy as an apple, although much less sweet.</p>
                                    <p> This is from <a href=https://en.wikipedia.org/wiki/Kohlrabi>wikipedia.com</a></p>
                                </div>	
                            </div>
                           <div class="col-md-4 col-lg-2">
                            <?php
                            if($_SESSION['valid'] == true){
								include 'comment.php';
							}
							else{
								echo 'please <a href="./login.php">login</a> to comment';
							}
                            ?>
                            </div>
            
                        </div>
                     </div>


<?php
include 'footer.php';
?>

	</body>
</html>
