<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()){header("Location :index.php");}?>

        <!-- Navigation -->
<?php
$comments=Comment::get_all();



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
           All comments
           
        </h1>
      
    <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                         <tr>
                            <th>Id</th>
                            <th>Author</th>
                            <th>Body</th>
                            
                        </tr>
                    <tbody>
                    <?php foreach($comments as$comment):?>
                        <tr>
                            <td><?php echo $comment->id; ?></td>
                            
                            <td><?php echo $comment->author; ?>
                          
                            <div class="action_links">
                            <a href="delete_comment.php?comment_id=<?php echo $comment->id?>">Delete</a>
                            </div>
                            
                            </td>
                            <td><?php echo $comment->body;?></td>
                            
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