<?php

  class DB {

    protected $db_name = '';
    protected $db_user = '';
    protected $db_pass = '';
    protected $db_host = '';

    //Connect to the database
    public function connect(){
      $connection = mysql_connect($this->db_host, $this->db_user, $this->db_pass);
      mysql_select_db($this->db_name);
      return true;
    }

    public function processRowSet($rowSet, $singleRow=false)
    {
      $ResultArray = array();
      while($row = mysql_fetch_assoc($rowSet))
      {
        array_push($resultArray, $row);
      }
      if($singleRow == true)
        return $resultArray[0];
      
      return $resultArray;
    }

    public function select($table, $where)
    {
      $sql = "SELECT * FROM $table WHERE $where";
      $result = mysql_query($sql);
      if(mysql_num_rows($result) == 1)
        return $this->processRowSet($result, true);
      return $this->processRowSet($result);

    }

    public function insert($data, $table)
    {
      $columns = "";
      $values = "";
  
      foreach ($data as $column => $value){
        $columns .= ($columns == "") ? "" : ", ";
        $columns .= $column;  
        $values .= ($values == "") ? "" : ", ";  
        $values .= $value;  
      }
      $sql = "INSERT INTO $table ($columns) values ($values)";
      mysql_query($sql) or die(mysql_error());

      return mysql_insert_id();
    }

  }

?>
