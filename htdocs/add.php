<?php

$data = array_merge($_POST,$_FILES);
require_once "meal_db.php";
$db = new meal_db();
if ($db->addMeal($data)){
    $class = "alert-success";
    $title = "done";
    $msg = "Successfully added new meal";
}
else{
    $class = "alert-danger";
    $title = "Error";
    $msg = "There was an error adding a new meal";

}


include_once 'include/header.php';
?>
<div class="space "></div>
<div class=<?php echo '"'."alert $class".'"';?>>
    <h3 class="alert-heading"><?php echo $title;?></h3>
    <p><?php echo $msg; ?></p>
</div>
<?php include_once 'include/footer.php';?>
