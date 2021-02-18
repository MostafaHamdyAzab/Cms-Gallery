<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){ header("Location: login.php"); }//end  is_signed_in()
?>


<?php
if(empty($_GET['comment_id'])){
    header("Location: comment_photo.php");
  
}

$comment=comment::get_by_id($_GET['comment_id']);
if($comment){
     $comment->delete_comment();
     header("Location: comment_photo.php");
    
}else{
    header("Location: comment_photo.php");
}








?>