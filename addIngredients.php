<?php
include 'inc/support.php';
include 'inc/control.php';
if (!$_SESSION['userType'] == "Administrator"){
  header('Location: index.php');
  exit;
}
include 'inc/header.php';
$ingName = $image = $description = $msg = '';
$max_file_size = 1000000; // small
$db = new Database();
if(isset($_POST["submitfrm"])){
    if(!empty($_POST['ingName']) && !empty($_POST['description']) && !empty($_FILES['image']['name'])){
    $arr = readIngredients();
    $ingName = $_POST['ingName'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];

    $newIng = makeNewIng($ingName, $description, $image);
    array_push($arr, $newIng);
    writeIngredients($arr);
    $db->addIngredient($ingName, $description, $image);
    $loc = "./uploads/".$_FILES['image']['name'];
                 //print_r($_FILES);
    move_uploaded_file ( $_FILES['image']['tmp_name'], "$loc" );
    chmod($loc, 0644);
    $msg = 'Ingredient added';
    }
    else{
    $msg = 'Please enter all fields*';
    }
}
?>
    <p align="center"><?php echo "<font color='red'> $msg</font>"; ?> </p>



<div id="addIngForm">
    <h2 align="center">Add Ingredients</h2>
    <div class="form">
    <form name='input' action="#" method='post' enctype="multipart/form-data" id="formInput" align="center" >

        <input id="formBox" type='text' value='<?php echo $ingName; ?>' id='ingName' name='ingName' placeholder='Enter Ingredient Name'/>
        <br/>
        <br/>
        <textarea value='<?php echo $description; ?>' style="margin-top: 25px; margin-left: 50px;" rows="4" cols="50" id="formInput" name="description" placeholder='Enter description'></textarea>
        <br/>

	    <input id="formBox" type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
        <br/>

         <input type='file' value='<?php echo $image; ?>' id='image' name='image' class="form-control" style="padding-bottom: 30px; width: 270px;vertical-align: middle;margin-left: 40px;display: inline-block;" />
		<br/>


    <br>



        <input type='submit' value='Add ingredient' name='submitfrm' class="Submit Form" />

    </form>
  </div>
</div>

<?php include 'inc/footer.php';?>
