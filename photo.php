<?php
include_once("includes/header.php");
include_once("admin/includes/init.php");

if(empty($_GET['photo_id'])){
    header("Location: index.php");
}


$photo=Photo::get_by_id($_GET['photo_id']);

if(isset($_POST['submit'])){

  $author=$_POST['author'];
  $body=$_POST['body'];
  $new_commment=Comment::create_comment($photo->id,$author,$body);

    if($new_commment&& $new_commment->save()){
        header("Location: photo.php?id= echo $photo->id");
    }else{
        $message="There Is a Problem On Saving";
    }
    // else{
    //     $author="";
    //     $body="";
    // }
     }//end if isset()
    $comments=Comment::find_comments($photo->id);





?>


<body>

    <!-- Navigation -->
   <?php include_once("includes/navigation.php")?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Mostafa Hamdy</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>


                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="admin/<?php echo $photo->photo_path() ?>" alt="" >

                <hr>

                <!-- Post Content -->
                <p class="lead"> 
                <p> <?php echo $photo->caption?> </p>
                <p> <?php echo $photo->description?> </p>
                <hr>

                <!-- Blog Comments -->









                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                    <div class="form-group">
                    <label for="author">Author</label>
                            <input name="author" id="author" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->



                <?php foreach($comments as $comment): ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment->author ;?>
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        <?php echo $comment->body;?>
                      </div>
                </div>
                <?php endforeach;?>

                <!-- Comment -->
                <div class="media">
                   
                   
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <!-- <div class="col-md-4"> -->

                <!-- Blog Search Well -->
                <?php //include_once("includes/sidebar.php")?>
                   
                <!-- </div> -->

                <!-- Side Widget Well -->
                

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        
            <div class="row">
              <?php include("includes/footer.php");?>
            </div>
            <!-- /.row -->
        

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
