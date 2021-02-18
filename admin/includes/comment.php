<?php require_once("db_object.php");?>
<?php

class Comment extends Db_object{
    protected static $dbtable_name="comments";
    protected static $db_table_fields=array('id','photo_id','author','body');
    public $id;
    public $photo_id;
    public $author;
    public $body;



    public static function create_comment($photo_id,$author="azab",$body=""){
           
        if(!empty($photo_id)&&!empty($author)&&!empty($body)){
            $comment=new Comment();
            $comment->photo_id=(int)$photo_id;
            $comment->author=$author;
            $comment->body=$body;
            return $comment;

        }else{return false;}


    }//enf create_comment()


    public static function find_comments($photo_id){
        global $database; 
        $sql="select * from ".self::$dbtable_name;
        $sql.=" where `photo_id` = ".$database->escape_string($photo_id);
        $sql.=" order by photo_id ASC";
        return self::find_this_query($sql);
    }//end find_comment()


    public function delete_comment(){
        if(!$this->delete()) {
            return false;
        }
    }//end delete_photo()
   
  

}//end of class

?>