<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){header("Location :index.php");}?>

<?php 
$user=new User();

   if(isset($_POST['submit'])){
     
    $user->user_name   =  $_POST['user_name'];
    $user->first_name  =  $_POST['first_name'];
    $user->last_name   =  $_POST['last_name'];
    $user->password    =  $_POST['password'];
    $user-> set_file($_FILES['user_img']);
    $user->save_user_and_image();

   } 



?>



        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php include("includes/top_nav.php");?>
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php include("includes/side_nav.php");?>


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           
            <!-- /.navbar-collapse -->
        </nav>







        <div id="page-wrapper">

        <div class="container-fluid">

<!-- Page Heading -->
<div class="row">


<form action="" method="post" enctype="multipart/form-data">
    <div class="col-md-8 col-md-offset-3">
        <div class="form-group">   
            <label for="user_name">User Name</label> 
           <input class="form-control"  type="text" name="user_name"  >
        </div>


        <div class="form-group">    
           <label for="user_img">User Image</label> 
           <input class="form-control"  type="file" name="user_img"  >
        </div>

        <div class="form-group">    
              <label for="firstname">First Name</label>
           <input class="form-control" type="text" name="first_name" >
        </div>
    
    
        <div class="form-group">    
              <label for="last_name">Last Name</label>
           <input class="form-control" type="text" name="last_name"   >
        </div>

        <div class="form-group">    
              <label for="password">Password</label>
           <input class="form-control" type="password" name="password"   >
        </div>


        <div class="form-group">    
             
           <input class="btn btn-primary pull-right" type="submit" name="submit"   >
        </div>
    
    </div>
     </form>


    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>