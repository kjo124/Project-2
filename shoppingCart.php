<?php
include 'inc/support.php';
include 'inc/control.php';

if (!$_SESSION['userType'] == "Customer"){
  header('Location: index.php');
  exit;
}

include 'inc/header.php';
?>

<div class="container-fluid">
	<div class="row visible-on">
		<div class="col-md-3">
      <!-- TODO:  Customers have a shopping basket and can submit orders.
       A customer can add and remove ingredients from a shopping basket and submit
         an order. Once submitted, the customer and the administrator(s) receive and
         email version of the order. -->
			<!-- left -->
      <form action="" method="POST">
        <input type="submit" name="submit" value="Clear Cart">
      </form>
      <?php
      if (isset($_POST['submit'])===true) {
        if (isset($_SESSION['cart_items'])===true) {
          //Session is set
          $cart_array=array();
          $_SESSION['cart_items'] = $cart_array;
          echo "\n";
          echo "Removed all items from cart";
        } else {
          //Session is not set, setting session now
          echo "\n";
          echo "Removed all items from empty cart";
        }
      }
      ?>


		</div>
		<div class="col-md-6">
			<!-- middle -->

      <?php
      $cart = array();
        if (isset($_SESSION['cart_items'])===true){
          if (!empty($_SESSION['cart_items'])) {
            foreach ($_SESSION['cart_items'] as $item) {
              if (array_key_exists($item, $cart)) {
                $cart[$item]++;
              } else {
                $cart[$item] = 1;
              }
            }

            //print_r($_SESSION['cart_items']);
            echo "Cart: ";
            print_r($cart);
          } else {
            echo "Cart is empty!";
          }

        } else {
          echo "Cart is empty!";
        } ?>

		</div>
		<div class="col-md-3">
			<!-- right -->
		</div>
	</div>
</div>

<?php include 'inc/footer.php';?>
