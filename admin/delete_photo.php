<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){ header("Location: login.php"); }//end  is_signed_in()
?>


<?php
if(empty($_GET['photo_id'])){
    header("Location: ../photos.php");
  
}

$photo=Photo::get_by_id($_GET['photo_id']);
if($photo){
     $photo->delete_photo();
     header("Location: ../photos.php");
    
}else{
    header("Location: ../photos.php");
}








?>