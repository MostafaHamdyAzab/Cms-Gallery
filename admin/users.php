<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()){header("Location :index.php");}?>

        <!-- Navigation -->
<?php
$users=User::get_all();
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
          All Users
        </h1>
        <a href="add_user.php" class="btn btn-primary">Add User</a>
    <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                         <tr>
                            <th>Id</th>
                            <th>user Photo</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                        </tr>
                    <tbody>
                    <?php foreach($users as$user):?>
                        <tr>
                            <td><?php echo $user->id; ?></td>
                            <td><img class="admin_user_thumbnail user_img" src="<?php echo $user->image_path_and_placeholder() ?> " alt=""></td>
                            <td><?php echo $user->user_name; ?>
                          
                            <div class="action_links">
                            <a href="delete_user.php?user_id=<?php echo $user->id?>">Delete</a>
                            <a href="edite_user.php?user_id=<?php  echo $user->id ?>">Edite</a>
                           
                            </div>
                            
                            </td>
                            
                            <td><?php echo $user->first_name;?></td>
                            <td><?php echo $user->last_name;?></td>
                            
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