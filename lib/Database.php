<?php
include_once '../config/config.php';
class Database{

    /* Initialization Variable For DB Connection */
    public $HostDb = DB_HOST;
    public $UserDb = DB_USER;
    public $PassDb = DB_PASS;
    public $NameDb = DB_NAME;

    public $link,$error;

    function __construct()
    {
          $this->connectDb();
    }

    /* Connect to the Database */
    private function connectDb(){
      $this->link = new mysqli($this->HostDb,$this->UserDb,$this->PassDb,$this->NameDb);
      if (!$this->link){
          $this->error = "Could Not Connect".$this->link->connect_error;
          return false;
      }
    }

    /* Select Query || Get Data */
    public function SelectData($query)
    {
        $select_Data = $this->link->query($query) or die($this->link->error.__LINE__);
        if ($select_Data->num_rows > 0) {
            return $select_Data;
            exit();
        }
        else{

            return  false;
        }
    }
    /* All Query Excute */
    public function QueryExcute($query)
    {
        $query_Excute = $this->link->query($query) or die($this->link->error.__LINE__);
        if ($query_Excute ) {
            return $query_Excute;
            exit();
        }
        else{
            return false;
        }
    }
}

?>