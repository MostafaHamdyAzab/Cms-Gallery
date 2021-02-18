<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){ header("Location: login.php"); }//end  is_signed_in()
?>


<?php
if(empty($_GET['comment_id'])){
    header("Location: comments.php");
  
}

$comment=comment::get_by_id($_GET['comment_id']);
if($comment){
     $comment->delete_comment();
     header("Location: comments.php");
    
}else{
    header("Location: comments.php");
}








?>