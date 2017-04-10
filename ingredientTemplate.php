<?php
include 'inc/support.php';
include 'inc/control.php';
include 'inc/header.php';
$id = $_GET['id'];
$db = new Database();
$ingredient = $db->findIngredient($id);
?>

<div class="container-fluid">
	<div class="row visible-on">
		<div class="col-md-3">
      <?php
      if (isset($_SESSION['userType'])){
          if ($_SESSION['userType'] == "Customer"){?>


            <form action="" method="POST">
              <input type="submit" name="submit" value="Add to Cart">
            </form>
            <?php
            if (isset($_POST['submit'])===true) {
              if (isset($_SESSION['cart_items'])===true) {
                //Session is set
                array_push($_SESSION['cart_items'], $ingredient->name);
                echo "\n";
                echo $ingredient->name . " added to Cart!";
              } else {
                //Session is not set, setting session now
                $cart_array=array($ingredient->name);
                $_SESSION['cart_items'] = $cart_array;
              }
            }
            ?>

              <!-- <form id ="addCart" class="form-buy" role="form" action="" method="post" align="center" >
                  <div class="button">
                      <button  class = "btn btn-lg btn-primary btn-block" type = "submit" name = "ing" ><span class="glyphicon glyphicon-plus-sign"> Add to cart</span></button>
                  </div>
              </form> -->



      <?php    }
        }
      ?>
			<?php include 'inc/authentication.php';?>
			<?php include 'inc/commenting.php';?>
			<!-- left -->
		</div>
		<div class="col-md-6">
                    <div class="Title" align="center">
                                <h1><?php echo $ingredient->name ?> </h1>
                    </div>
                                <div class="maincontent" align="center">
                                  <?php echo $ingredient->description ?>
                                </div>
			<!-- middle -->
		</div>
		<div class="col-md-3">

                        <img src="uploads/<?php echo $ingredient->image ?>" class="img-circle img-responsive" alt="<?php echo $ingredient->image ?>"/>

			<!-- right -->
		</div>
	</div>
</div>

<?php include 'inc/footer.php';?>
