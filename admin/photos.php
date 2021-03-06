<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()){header("Location :index.php");}?>

        <!-- Navigation -->
<?php
$photos=Photo::get_all();



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
    <div class="col-lg-12">
        <h1 class="page-header">
          All Photos
            <small> </small>
        </h1>
    <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                         <tr>
                            <th>Photo</th>
                            <th>Id</th>
                            <th>FileName</th>
                            <th>Title</th>
                            <th>Size</th>
                            <th>Comments</th>
                        </tr>
                    <tbody>
                    <?php foreach($photos as$photo):?>
                        <tr>
                       
                            <td><img class="admin-photo-thumbnail" src="<?php echo $photo->photo_path();?> " >
                            <div class="action_link">
                            <a href="delete_photo.php/?photo_id=<?php echo $photo->id?>">Delete</a>
                            <a href="edite_photo.php?photo_id=<?php  echo $photo->id ?>">Edite</a>
                            <a href="../photo.php?photo_id=<?php echo $photo->id?>">View</a>
                            
                            </div>
                            
                            
                            
                            </td>
                            <td><?php echo $photo->id; ?></td>
                            <td><?php echo $photo->file_name;?></td>
                            <td><?php echo $photo->title;?></td>
                            <td><?php echo $photo->size;?></td>
                            <td>
                            <a href="comment_photo.php?photo_id= <?php echo $photo->id ;?> ">
                           <?php
                            $comments=Comment::find_comments($photo->id);
                             
                              echo count($comments);
                              ?>
                               </a>
                            
                           
                            </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                    </thead>
                    
                    
                    </table>
    
    
    
    
    
    
    
    
    
    </div>
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>