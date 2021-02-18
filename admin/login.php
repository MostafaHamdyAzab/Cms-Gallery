<?php require_once("includes/header.php")?>
<?php
$the_message="";
if($session->is_signed_in()){
  header("Location: index.php");
}//end  is_signed_in()

if(isset($_POST['submit'])){
$user_name=trim($_POST['user_name']);
$password=trim($_POST['password']);

if(empty($password)&&empty($user_name)){
    header("Location: login.php");
}else{
$user_found=User::verify_user($user_name,$password);
if($user_found){
    $session->login($user_found);
    header("Location: index.php");
  
}
else{
    $the_message="Your UserName Or Password Not Correct";
    
}
}//end if(isset())
}
else{
    $user_name="";
    $password="";
}

?>

<div class="col-md-4 col-md-offset-3">

<h4 class="bg-danger"><?php echo $the_message; ?></h4>
	
<form id="login-id" action="" method="post">
	
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="user_name" value="<?php echo htmlentities($password)?>" >

</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" value="<?php echo htmlentities($password)?>">
	
</div>


<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">

</div>


</form>


</div>



