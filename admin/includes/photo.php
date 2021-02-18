<?php require_once("db_object.php");?>
<?php

class Photo extends Db_object{

    protected static $dbtable_name="photos";
    protected static $db_table_fields=array('photo_id','title','caption','description','file_name','alternate_text','type','size');
    public $id;
    public $title;
    public $description;
    public $file_name;
    public $type;
    public $size;
    public $caption;
    public $alternate_text;
    public $tmp_path;
    public $upload_dir="images";
    
    public function set_file($file){
      if(empty($file)||!is_array($file)||!$file){
        parent::$errors="There Is No File Uploaded Here";
          return false;
      }else if($file['error']!=0){
          parent::$errors[]=parent::$upload_errors_array[$file['errors']];
          return false;
      }else{
       
        $this->file_name =basename($file['name']);
        $this->size      =($file['size']);
        $this->type      =($file['type']);
        $this->tmp_path  =($file['tmp_name']);
      }
    }//end of set_file()

    public function photo_path(){
        return $this->upload_dir.DS.$this->file_name;
    }//end photo_path()

    public function save(){
        if($this->id){
            $this->update();
        }else{
            if(!empty($this->errors)){
                return false;
            }
            if(empty($this->file_name)||empty($this->tmp_path)){
                $this->errors="The File isnot Available ";
                return false;
            }
        }//end else
        $target_path=SITE_ROOT.DS.'admin'.DS.$this->upload_dir.DS.$this->file_name;
        if(file_exists($target_path)){
            $this->errors="The File .$this->file_name. Is Already Exists";
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
        $this->create();
    }//end save()
  
    public function delete_photo(){
        if($this->delete()){//delete from data base
         $target_path=SITE_ROOT.DS.'admin'.DS.$this->photo_path;
         return unlink($target_path)?true:false; //delete file from the server
        }else{
            return false;
        }
    }







    
}



?>