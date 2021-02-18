<?php include("includes/header.php"); ?>
<?php include("includes/photo_library_model.php"); ?>
<?php if(!$session->is_signed_in()){header("Location :index.php");}?>

<?php 
if(empty($_GET['user_id'])){
    header("Location: users.php");
}else{
$user= User::get_by_id($_GET['user_id']);
if(isset($_POST['update'])){

     if($user){
        
    $user->user_name   =  $_POST['user_name'];
    $user->first_name  =  $_POST['first_name'];
    $user->last_name   =  $_POST['last_name'];
    $user->password    =  $_POST['password'];
    if(!empty($_FILES['user_img']['name'])){
        $user->set_file($_FILES['user_img']);
        print_r($users->errors);
    }
  
     $user->save_user_and_image();
     }
   } 
}
?>

<div class="modal fade" id="photo-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Gallery System Library</h4>
      </div>
      <div class="modal-body">
          <div class="col-md-9">
             <div class="thumbnails row">
            
                <!-- PHP LOOP HERE CODE HERE-->
                
               <div class="col-xs-2">
                 <a role="checkbox" aria-checked="false" tabindex="0" id="" href="#" class="thumbnail">
                   <img class="modal_thumbnails img-responsive" src="<!-- PHP LOOP HERE CODE HERE-->" data="<!-- PHP LOOP HERE CODE HERE-->">
                 </a>
                  <div class="photo-id hidden"></div>
               </div>

                    <!-- PHP LOOP HERE CODE HERE-->

             </div>
          </div><!--col-md-9 -->

  <div class="col-md-3">
    <div id="modal_sidebar"></div>
  </div>

   </div><!--Modal Body-->
      <div class="modal-footer">
        <div class="row">
               <!--Closes Modal-->
              <button id="set_user_image" type="button" class="btn btn-primary" disabled="true" data-dismiss="modal">Apply Selection</button>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
































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

<div class="col-md-6 ">
       <a href="" data-toggle='modal' data-target='#photo-modal'> <img class="img-responsive" src="<?php echo $user-> image_path_and_placeholder()?>" alt=""></a>
    </div>
<form action="" method="post" enctype="multipart/form-data">
    

    <div class="col-md-6 ">
        <div class="form-group">   
            <label for="user_name">User Name</label> 
           <input class="form-control"  type="text" name="user_name" value="<?php echo $user->user_name;?>" >
        </div>


        <div class="form-group">    
           <label for="add_new_user_img">Add New User Image</label> 
           <input class="form-control"  type="file" name="user_img" >
            
        </div>

        <div class="form-group">    
              <label for="firstname">First Name</label>
           <input class="form-control" type="text" name="first_name" value="<?php echo $user->first_name;?>"  >
        </div>
    
    
        <div class="form-group">    
              <label for="last_name">Last Name</label>
           <input class="form-control" type="text" name="last_name" value="<?php echo $user->last_name;?>"   >
        </div>

        <div class="form-group">    
              <label for="password">Password</label>
           <input class="form-control" type="password" name="password" value="<?php echo $user->password;?>"   >
        </div>


        <!-- <div class="form-group">    
             
           <input class="btn btn-primary pull-right" type="submit" name="Update" value="Update"   >
        </div> -->
        <div class="info-box-delete pull-left">
            <a  href="delete_user.php?user_id=<?php echo $user->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
         </div>

        <div class="info-box-update pull-right ">
            <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
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