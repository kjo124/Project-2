<?php
include 'inc/support.php';
include 'inc/control.php';
include 'inc/header.php';
?>


 <div class = "container form-addIng">
                            <?php
                            $msg = '';
                            $arr = readIngredients();
                            
                            if (isset($_POST['submit'])  && !empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['image'])){

                                $newIng = makeNewIng($_POST['name'], $_POST['description'], $_POST['image']);
                                array_push($arr, $newIng);
                                
                                writeIngredients($arr);
                                $msg = 'Ingredient added';
                                    
                
                        }
                        else{
                            $msg = 'Please enter all fields';
                        }
                
                            ?>
                         <p align="center"><?php echo $msg; ?> </p>
                        </div>




<div class = "container" align="center">
         <form class = "form-addIng" role = "form" 
            action = "" method = "post">
            <h4 class = "form-signin-heading"></h4>
            Name of Ingredient:
            <input type = "text" class = "form-control" 
               name = "name" ></br>
            Text description:
            <input type = "text" class = "form-control"
               name = "description" ></br>
            Image:
            <input type = "text" class = "form-control"
               name = "image" ></br>
            <div class="button">
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "submit">Add Ingredient</button>
            </div>
            </br>
         </form>
      </div> 



<?php include 'inc/footer.php';?>
