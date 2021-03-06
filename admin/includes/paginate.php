<?php
class paginate{

public $current_page;
public $items_per_page;
public $items_total_count; 

    public function __construct($page=1, $items_per_page=2, $items_total_count=0 ){
        $this->current_page=(int)$page;
        $this->items_per_page=(int)$items_per_page;
        $this->items_total_count=(int)$items_total_count;
}//end construct()

public function next(){
    return $this->current_page +1;
}//end next()

public function previous(){
    return $this->current_page -1;
}//end previous()

public function page_total(){
    return ceil($this->items_total_count/$this->items_per_page);
}//end page_total()

public function has_previous(){
   return $this->previous() >=1 ?true:false;
}//end has_pervious()

public function has_next(){
    return ($this->next() <= $this->page_total())? true:false;
 }//end has_next()

 public function offset(){
 return ($this->current_page -1) * $this->items_per_page;
 }//end offset()






}//end paginate class
?>