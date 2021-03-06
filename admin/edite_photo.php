<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){header("Location :index.php");}?>

<?php 
if(empty($_GET['photo_id'])){

    header("Location: photos.php");
}else{
    $photo=Photo::get_by_id($_GET['photo_id']);

   if(isset($_POST['update'])){
     
    $photo->title          =$_POST['title'];
    $photo->caption        = $_POST['caption'];
    $photo->description    =  $_POST['decsription'];
    $photo->alternate_text =$_POST['alternate_text'];
   $photo->save();

   } 
}


?>

        <!-- Navigation -->
<?php
// $photos=Photo::get_all();



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
<form action="" method="post">
    <div class="col-lg-8">
        <div class="form-group">    
           <input class="form-control"  type="text" name="title" value=<?php echo $photo->title?> >
        </div>


        <div class="form-group">    
             <a class="thumbnail" href="#"><img src="<?php echo $photo->photo_path()?>" alt=""></a>
        </div>

 




        <div class="form-group">    
              <label for="caption">Caption</label>
           <input class="form-control" type="text" name="caption"  value=<?php echo $photo->caption?> >
        </div>
    
    
        <div class="form-group">    
              <label for="caption">Alternative Text</label>
           <input class="form-control" type="text" name="alternate_text"  value=<?php echo $photo->alternate_text?> >
        </div>
    

        <div class="form-group">    
              <label for="caption">Description</label>
          <textarea class="form-control" name="decsription" id="" cols="30" rows="10"  value=<?php echo $photo->description ?>></textarea>
        </div>
    
    </div>


    <div class="col-md-4" >
                            <div  class="photo-info-box">
                                <div class="info-box-header">
                                   <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                            <div class="inside">
                              <div class="box-inner">
                                 <p class="text">
                                   <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                  </p>
                                  <p class="text ">
                                    Photo Id: <span class="data photo_id_box"><?php echo $photo->id ;?></span>
                                  </p>
                                  <p class="text">
                                    Filename: <span class="data"><?php echo $photo->file_name?></span>
                                  </p>
                                 <p class="text">
                                  File Type: <span class="data"><?php echo $photo->type?></span>
                                 </p>
                                 <p class="text">
                                   File Size: <span class="data"><?php echo $photo->size?></span>
                                 </p>
                              </div>
                              <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a  href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
                                </div>
                                <div class="info-box-update pull-right ">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                </div>   
                              </div>
                            </div>          
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