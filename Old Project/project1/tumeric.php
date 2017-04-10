<?php
include 'header.php';
include 'nav.php';
?>
<body>

                    <div class="container-fluid">
                        <div class="row visible-on">
                            <div class="col-md-3">
                                <img src="tumeric.jpg" class="img" alt="turmeric" width="250" height="375"></img>
                            </div>
                            
                            <div class="col-md-5">
                                    <div class="Title">
                                        <h1>Turmeric</h1> 
                                    </div>
                                <div class="maincontent">    
                                    <p> Turmeric (/ˈtɜːrmərɪk/)[2] is a rhizomatous herbaceous perennial plant (Curcuma longa) of the ginger family, Zingiberaceae.[3] It is native to southern Asia, requiring temperatures between 20 and 30 °C (68 and 86 °F) and a considerable amount of annual rainfall to thrive.[4] Plants are gathered annually for their rhizomes and propagated from some of those rhizomes in the following season. </p><p>When not used fresh, the rhizomes are boiled for about 30–45 minutes and then dried in hot ovens, after which they are ground into a deep-orange-yellow powder[5] commonly used as a coloring in Bangladeshi cuisine, Indian cuisine, Iranian cuisine, Pakistani cuisine, and curries, as well as for dyeing.</p>
                                    <p> This is from <a href=https://en.wikipedia.org/wiki/Turmeric>wikipedia.com</a></p>
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
