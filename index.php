<?php include("includes/header.php"); ?>
<?php
$page=!empty($_GET['page'])?$_GET['page']:1;
$items_per_page=3;
$items_total_count=Photo::count_all();

$paginate=new Paginate($page,$items_per_page,$items_total_count);
$sql ="select * from photos ";
$sql.="limit {$items_per_page}  ";
$sql.="offset ".$paginate->offset();
$photos=Photo::find_this_query($sql);


?>



        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
              <div class="thumbnails row">
    <?php foreach($photos as $photo):?>
    
          
            <div class="cl-xs-6 col-md-3">
            <a class="thumbnails" href="photo.php?photo_id=<?php echo $photo->id; ?>">
            <img class=" home-page-photo img-responsive" src="admin/<?php echo $photo->photo_path();?>" alt="" width="200px" height="200px">
            
            
            </a>
            
            </div>
     
            <?php endforeach; ?>
            </div>

<div class="row">
<ul class="pager">
 <?php

        if($paginate->page_total()>1){

        if($paginate->has_next()){
            echo "<li class='next'><a href='index.php?page={$paginate->next()}'> Next </a></li>";
            
            }
           for($i=1;$i<=$paginate->page_total();$i++){

            if($i==$paginate->current_page){
              echo "<li class='active'><a  href='index.php?page=$i'>$i</a></li>";
            }else{
              echo "<li ><a href='index.php?page=$i'>$i</a></li>";
            }
           }
            
            

            if($paginate->has_previous()){
              echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'> Previous </a></li>";
              
              }

   }
 
 
 
 
 
 
 
 
 ?>


</ul>

















  
   <!-- <li class="next"><a href="index.php?page=<?php //echo $paginate->next()?>"> Next </a></li> -->
   <!-- <li class="previous"><a href="index.php?page=<?php echo $paginate->previous()?>"> Previous </a></li> -->
    <!-- <li class="previous"><a href=""></a></li> -->
 


</div>











            <?php include("includes/footer.php"); ?>
            </div>
           

            <!-- Blog Sidebar Widgets Column -->
            <!-- <div class="col-md-4">

            
                 <?php //include("includes/sidebar.php"); ?>



        </div> -->
        <!-- /.row -->

        
    