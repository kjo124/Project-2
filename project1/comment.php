<?php

$comment = "";

  if (empty($_POST["comment"])) {
    $comment = "";
}

   else {
    $comment = $_POST["comment"];

  }
?>
  
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
    <input type="submit" name="submit" value="Submit"> 
  </form>
  
  
  <?php
  echo $comment;
  ?>
