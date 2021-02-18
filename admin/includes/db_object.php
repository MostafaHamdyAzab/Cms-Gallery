<?php

class Db_object{

    public $errors=array();
    public $upload_errors_array=array(
    
        UPLOAD_ERR_OK        =>"There Is No Error.",
        UPLOAD_ERR_INI_SIZE  =>"The Upload File Exceeds The Upload Max File",
        UPLOAD_ERR_PARTIAL   =>"The Uploaded File Was Only Partially Uploaded",
        UPLOAD_ERR_NO_FILE   =>"No File Was Uploaded.",
        UPLOAD_ERR_NO_TMP_DIR=>"Missing A Temporary Folder.",
        UPLOAD_ERR_CANT_WRITE=>"Failed To Write File To Disk.",
        UPLOAD_ERR_EXTENSION =>"a PHP EXTENSION STOPPED tHE FILE UPLOAD."
    );
    
    public static function get_all(){
        return  static::find_this_query("select * from " .static::$dbtable_name." ");
   
       }//end get_all_users

     
    public static function get_by_id($id){
        global $database;
        $result_set=static::find_this_query("select * from ".  static::$dbtable_name." where id = $id  limit 1 ");
        return !empty($result_set)?array_shift($result_set):false;
      
    }//end get_user_by_id

    public static function find_this_query($sql){
        global  $database;
        $result_set=$database->query($sql);
        $database->confirm($result_set);
        $the_user_data=array();
        while($row=mysqli_fetch_array($result_set)){
            $the_user_data[]=static::instantation($row);
        }
        return $the_user_data;
          }//end find_this_query

          public function save(){
            isset($this->id)?$this->update():$this->create();
        }//end save()
          
    public function create(){
        global  $database;
        $properties=$this->clean_properties();
        $sql="insert into ". static::$dbtable_name ." (".implode(",",array_keys($properties))." ) ";
        $sql.="values ('".implode("','",array_values($properties))."')";
        $insert_new_user=$database->query($sql);
        if($insert_new_user){
            $this->id=$database->the_insert_id();
             echo" Inserted";
            return true;
        }else{
           
            echo $database->confirm($insert_new_user);
            return false;
        }
    }//end create()


    
    protected function clean_properties(){
        global $database;
        $clean_properties=array();
        foreach($this->get_properties() as $key=>$value){
          $clean_properties[$key]=$database->escape_string($value);
        }
        return $clean_properties;
    }//End clean_proporties()

    public function update(){
        global $database;
        $properties=$this-> clean_properties();
        $properties_pair=array();//this configure data for update
        foreach($properties as$key=>$value){
            $properties_pair[]="{$key}='{$value}' ";  
        }
        $sql="update ".  static::$dbtable_name ." set ";
        $sql.=implode(", ",$properties_pair);
        // $sql.="user_name= '".$database->escape_string($this->user_name)."', ";
        // $sql.="first_name= '".$database->escape_string($this->first_name)."', ";
        // $sql.="last_name= '".$database->escape_string($this->last_name)."', ";
        // $sql.="password= '".$database->escape_string($this->password)."' ";
        $sql.="where id=".$database->escape_string($this->id);
        $database->query($sql);
        return(mysqli_affected_rows($database->connection)==1?true:false);
    }//end update()

    public function delete(){
        global $database;
        $sql="delete from ".static::$dbtable_name;
        $sql.=" where id=".$database->escape_string($this->id);
        $sql.=" limit 1";
        $delete_user_result=$database->query($sql);
        ///return(mysqli_affected_rows($database->connection)==1?true:false);
        if($delete_user_result){
            return true;
        }else{
              echo $database->confirm($delete_user_result);
             return false;
        }
  }//end of delete()

          
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
            $the_called_class=get_called_class();
            $the_user_obj=new  $the_called_class;
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


        protected function get_properties(){
            $properties=array();
            foreach(static::$db_table_fields as $db_field){
                if(property_exists($this,$db_field)){
                    $properties[$db_field]=$this->$db_field;
                }
                }
                return $properties;
            }//end get_properties()


            public function count_all(){
                global $database;
                $sql="select count(*) from ".static::$dbtable_name;
                $result_set= $database->query($sql);
                $row=mysqli_fetch_array($result_set);
                return array_shift($row);
            }


            
  
              
             
        
   
}




?>