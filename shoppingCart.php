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
            echo "In your cart you have: <br>";
            foreach ($cart as $key => $value) {
              if ($value > 1) {
                echo $value . " " . $key . "s" . "<br>";
              } else {
                echo $value . " " . $key . "<br>";
              }
            }
            
            echo "<br>";
            ?>
            <form action="" method="POST">
              <input type="submit" name="buy" value="Confirm Purchase">
            </form>
            <?php
            if (isset($_POST['buy'])===true) {
                $handle = fopen("databases/users.csv", "r");
                while (($data = fgetcsv($handle)) !==FALSE){
                    if($_SESSION['username'] == $data['0']){
                        $email = $data['2'];
                        }
                     }   
                 
                $msg = 'Items Purchased: ';
                $email1 = 'bobby20@comcast.net';
                $email2 = 'kylejodin@gmail.com';
                $email3 = 'ct310@cs.colostate.edu';
            foreach ($cart as $key => $value) {
              if ($value > 1) {
                $msg .= " " . $value . " " . $key . "s";
              } else {
                $msg .=  " " .$value . " " . $key;
              }
            }
                $subject = $_SESSION['username']." your order has been confirmed!";
                $subject2 = $_SESSION['username']." just made a purchase!";

                mail($email, $subject,$msg);
                mail($email1,$subject2,$msg);
                mail($email2,$subject2,$msg);
                mail($email3,$subject2,$msg);
               // echo "Confirmation email has been sent";
                $cart_array=array();
                $_SESSION['cart_items'] = $cart_array;
                echo "Confirmation email has been sent";
                
               
            }
            
            
            
            
          } else {
            echo "Cart is empty!";
          }

        } else {
          echo "Cart is empty!";
        } ?>

		</div>
		<div class="col-md-3">
			<!-- right -->
      <!-- Buy Button -->
		</div>
	</div>
</div>

<?php include 'inc/footer.php';?>
