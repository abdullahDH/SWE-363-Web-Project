<?php
$data = array_merge($_POST,$_FILES);
require_once "meal_db.php";
$db = new meal_db();
$J_array = array();



if ($db->addMealReviews($data)){

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else{
    alert("error");

}



