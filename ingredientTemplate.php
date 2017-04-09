<?php
include 'inc/support.php';
include 'inc/control.php';
include 'inc/header.php';
 $id = $_GET['id'];
?>

<div class="container-fluid">
	<div class="row visible-on">
		<div class="col-md-3">
			<?php include 'inc/authentication.php';?>
			<?php include 'inc/commenting.php';?>
			<!-- left -->
		</div>
		<div class="col-md-6">
                    <div class="Title" align="center">
                                <h1><?php echo $id ?> </h1> 
                    </div>
                                <div class="maincontent" align="center"> 
                                <?php 
                                $handle = fopen("databases/ingredients.csv", "r");
                                while (($data = fgetcsv($handle)) !==FALSE){
                                    if($id == $data['0']){
                                         echo $data['1'];
                                    }
                                }?>
                                </div>
			<!-- middle -->
		</div>
		<div class="col-md-3">
                        <?php
                        if (isset($_SESSION['userType'])){
                            if ($_SESSION['userType'] == "Customer"){?>
                                <form id ="addCart" class="form-buy" role="form" action="" method="post" align="center" >
                                    <div class="button" >
                                        <button  class = "btn btn-lg btn-primary btn-block" type = "submit" name = "ing" ><span class="glyphicon glyphicon-plus-sign"> Add to cart</span></button>
                                    </div>
                                </form>
                        <?php    }
                          }  
                        ?>
			<!-- right -->
		</div>
	</div>
</div>

<?php include 'inc/footer.php';?>
