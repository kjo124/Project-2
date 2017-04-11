<!-- TODO: revamp so this works with database -->

<!-- Provision for commenting on an ingredient. Comments may only be entered by authenticated users. For Project 1 you need only redisplay the comment temporarily. To be clear, you need not yet build and archival store able to retain comments over time. That requirement will come in Project 2. -->

<?php if (isset($_SESSION['userType'])){ ?>

  <?php $dbc = new Database(); ?>

    <form action="" method="POST">
      <div align="center">
        <!-- <input type="textarea" name="comment"><br> -->
        <textarea name="comment" cols="40" rows="5"></textarea>
        <input type="submit" value="save">
      </div>
    </form><br>
      <?php
      if (isset($_POST['comment'])===true) {
        $newstr = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
        echo "<br>";
        echo "Comment added.";
        echo "<br>";
        $dbc->addComment($id, $newstr , $_SESSION["username"], date('l jS \of F Y h:i:s A'));
        $commentArr = $dbc->getComments($id);

        ?>

        <div class="shownComments">
          <?php
          // TODO:  Print commentArr
          foreach ($commentArr as $print) {
            echo $print;
            echo "<br>";
            echo "<br>";
          }

          ?>
        </div>
        <?php

      } else {
        $commentArr = $dbc->getComments($id);

        ?>

        <div class="shownComments">
          <?php
          foreach ($commentArr as $print) {
            echo $print;
            echo "<br>";
            echo "<br>";
          }
          ?>
        </div>
        <?php
      }

    }
?>
