<?php include("includes/header.php"); ?>
<?php
if(!$session->is_signed_in()){ header("Location: login.php"); }//end  is_signed_in()



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

            <?php include ("includes/admin_content.php")?>

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>