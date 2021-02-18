<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){header("Location :index.php");}?>

<?php 
if(empty($_GET['photo_id'])){
    header("Location: comment_photo.php");
}


   if(isset($_POST['submit'])){
    $photo_comment_id =$_GET['photo_id'];
    $comment_author   =$_POST['auhtor'];
    $comment_body     =$_POST['body'];
    $new_commment=Comment::create_comment( $photo_comment_id ,$comment_author,$comment_body);

    if($new_commment&& $new_commment->save()){
        header("Location: photo.php?id= echo $photo->id");
    }else{
        $message="There Is a Problem On Saving";
    }
    

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
            <label for="author">Author</label> 
           <input class="form-control"  type="text" name="auhtor"  >
        </div>


        <div class="form-group">    
           <label for="body">Body</label> 
           <textarea name="body" id="" cols="30" rows="10"></textarea>
            
        </div>

       


        <div class="form-group">    
        <!-- <a href="#" class="btn btn-primary pull-right" name="add">Add comment</a> -->
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