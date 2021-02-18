<?php
class Session{
private $user_id;
public $signed_in=false;
public $message="";
public $count;

function __construct(){
session_start();
$this->visitor_count();
$this->check_the_login();

}//end __construct()

function visitor_count(){
    if(isset($_SESSION['count'])){
        return $this->count=$_SESSION['count']++;
    }else{
        return $_SESSION['count']=1;
    }
}//end function visitor_count()

function is_signed_in(){//it is as getter method
    return $this->signed_in;
}//end is_signed_in()

public function login($user){
    if($user){
  $this->user_id=$_SESSION['id']=$user->id;
  $this->signed_in=true;
  }
}//end login()

function logout(){
    unset($_SESSION['id']);
    unset($this->user_id);
    $signed_in=false;
}//end logout()

private function check_the_login(){
if(isset($_SESSION['id'])){
    $this->signed_in=$_SESSION['id'];
    $signed_in=true;
}//end if 
else{
    unset($this->user_id);
    $this->signed_in=false;
}   
}//end check_the_login()

public function message($msg=""){
    if(!empty($msg)){
        $session['message']=$message;
    }else{
        return $this->message;
    }
}//end message()

private function check_message(){
    if(isset($_SESSION['message'])){
        $this->message=$_SESSION['message'];
        unset($_SESSION['message']);
    }else{
        $this->message="";
    }
}

}//end Session

$session=new Session();

?>