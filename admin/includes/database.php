<?php
require_once("config.php");
class DataBase{
    public $connection;

    function __construct(){
        $this->open_db_connection();
    }//End construct

    public function open_db_connection(){
       $this->connection= new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if($this->connection->connect_errno){
        die( "Connnection To Data Base Failed ".$this->connection->connect_error());
        }
        return $this->connection;
        
    }//end open_db_conection

    public function query($sql){
     $result=$this->connection->query($sql);
    return $result;
        }//end query()

        public function confirm($result){
            if(!$result){
                die("Query Failed".$this->connection->error);
               }
        }//End confirm

        public function escape_string($string){
            $escaped_string=$this->connection->real_escape_string($string);
            return $escaped_string;
        }//escape_string()

        public function the_insert_id(){
            return $this->connection->insert_id;
        }//the_insert_id()

}//end DataBase Class
    $database=new DataBase();



?>