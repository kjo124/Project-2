<?php
include 'inc/support.php';
include 'inc/control.php';

if (!$_SESSION['userType'] == "Administrator"){
  header('Location: index.php');
  exit;

}

include 'inc/header.php';
$max_file_size = 1000000;



?>
        <div class = "container form-addIng">
          <?php
             $msg = '';
             $arr = readIngredients();
             if (isset($_POST['submit'])){
               if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['image'])){
                 $newIng = makeNewIng($_POST['name'], $_POST['description'], $_POST['image']);
                 array_push($arr, $newIng);
                 writeIngredients($arr);
                 $db = new Database();
                 $db->addIngredient($newIng->name, $newIng->description, $newIng->image);
                 $msg = 'Ingredient added';





                 print_r($_FILES);
                 //move_uploaded_file ( $_FILES ["image"], $config->upload_dir . $filename );



                 chmod($chmodImg, 0755);

               }else{
                 $msg = 'Please enter all fields*';
               }
             }
             ?>
             <p align="center"><?php echo "<font color='red'> $msg</font>"; ?> </p>
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
                   <input type = "hidden" name = "MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
                   <input type="file" class="form-control" align = "middle" name="image" id="image"/>
                   <div class="button">
                   <button class = "btn btn-lg btn-primary btn-block" type = "submit"
                      name = "submit">Add Ingredient</button>
                   </div>
                   </br>
                </form>
             </div>


<?php include 'inc/footer.php';?>
