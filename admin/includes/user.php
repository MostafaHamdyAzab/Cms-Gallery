<?php require_once("db_object.php");?>
<?php

class User extends Db_object{
    protected static $dbtable_name="users";
    protected static $db_table_fields=array('user_name','first_name','last_name','password','user_img');
    public $id;
    public $user_name;
    public $password;
    public $first_name;
    public $last_name;
    public $user_img;
    public $upload_dir="images";
    public $tmp_path;
    public $img_placeholder="http://placehold.it/400x400&text=image";
    
    public function set_file($file){
        if(empty($file)||!is_array($file)||!$file){
            parent::$errors[]="There Is No File Uploaded Here";
            return false;
        }else if($file['error']!=0){
            parent::$errors[]=parent::$upload_errors_array[$file['errors']];
            return false;
        }else{
         
          $this->user_img  =basename($file['name']);
          $this->size      =($file['size']);
          $this->type      =($file['type']);
          $this->tmp_path  =($file['tmp_name']);
      
        }
      }//end of set_file()
   
    public function image_path_and_placeholder(){
        return empty($this->user_img)?$this->img_placeholder:$this->upload_dir.DS.$this->user_img;
    }//end image_path_and_placeholder()

    public function save_user_and_image(){
        if($this->id){
         $this->update();
          
        }else{
            if(!empty($this->errors)){
                return false;
            }
            if(empty($this->user_img)||empty($this->tmp_path)){
                $this->errors="The File is not Available ";
                return false;
            }
        }//end else
       $target_path=SITE_ROOT.DS.'admin'.DS.$this->upload_dir.DS.$this->user_img;
        
        if(file_exists($target_path)){
            $this->errors="The File .$this->user_img. Is Already Exists";
             return false; 
        }  
        if(move_uploaded_file($this->tmp_path,$target_path)){
          if($this->create()){
             unset($this->tmp_path);
             return true;}
         } else{
           $this->errors[]="The File Probably Has Not A Permission";
            return false;
        }
        
    }//end save()






    
      public function photo_path(){
          return $this->upload_dir.DS.$this->user_img;
      }//end of photo_path()
  
    
   
    public static function verify_user($user_name,$password){
        global  $database;
        $user_name=$database->escape_string($user_name);
        $password=$database->escape_string($password);
        $sql="select * from ".self::$dbtable_name." where ";
        $sql.="user_name = '{$user_name}' and ";
        $sql.="password =  '{$password}' limit 1";
        $the_result=static::find_this_query($sql);
        return !empty($the_result)? array_shift($the_result) : false;
        }//end verify_user()

    public static function instantation($the_record){
        $the_user_obj=new self;
        foreach($the_record as $the_attribute=>$value){
            if($the_user_obj->has_the_attribute($the_attribute)){
                $the_user_obj->$the_attribute=$value;
          }//end if
          }//end foreach
          return $the_user_obj;
          }//end instantation()

    private  function has_the_attribute($the_attribute){
        $the_object_attributes=get_object_vars($this);//this to get all static attribute in a class 
        return array_key_exists($the_attribute,$the_object_attributes);
    }  //end has_the_attribute  
    
    // public function delete_user(){
    //     if($this->delete()){//delete from data base
    //      $target_path=SITE_ROOT.DS.'admin'.DS.$this->photo_path;
    //      return unlink($target_path)?true:false; //delete file from the server
    //     }else{
    //         return false;
    //     }
    // }
    
    
  

}//end of class

?>