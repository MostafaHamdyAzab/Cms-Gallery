<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){header("Location :login.php");}?>

<?php

$message="";

if(isset($_POST['submit'])){
    $photo=new Photo();
    $photo->title=$_POST['title'];
    $photo->set_file($_FILES['file_upload']);


    if($photo->save()){
        $message="File Uploaded Sucessfully";
    }else{
        // $message = join($photo->errors);
       print_r($photo->errors);
}
}//end if isset()
?>















        <!-- Navigation -->



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
    <div class="col-lg-12">
        <h1 class="page-header">
            Uploads 
            <?php echo $message;?>
            
        </h1>
        
        <div class="col-md-6">
   <form action="upload.php" method="post" enctype="multipart/form-data">
  
   <div class="form-group">
   <input type="text" name="title" class="form_control">
   </div>

   <div class="form-group">
   <input type="file" name="file_upload" >
   </div>
   <input type="submit" name="submit" class="form_control">
   </form>
   </div>
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>