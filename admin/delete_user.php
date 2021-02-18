<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){ header("Location: login.php"); }//end  is_signed_in()
?>


<?php
if(empty($_GET['user_id'])){
    header("Location: users.php");
    echo"Dont get id";
  
}

$user=User::get_by_id($_GET['user_id']);
if($user){
     $user->delete();
     header("Location: users.php");
    
}else{
    header("Location: users.php");
}








?>