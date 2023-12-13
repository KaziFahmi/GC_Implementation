<?php

require_once "db_connect.php";

function isNewTable($tableName) {
    $conn = connect();
    $result = $conn->query("SELECT * FROM $tableName");
    disconnect($conn);
    if ($result == null){
        return TRUE;
    }
    else if ($result->num_rows === 0) {
        return TRUE;
    }
    else{
        return FALSE;
    }
}
  
  class Table {
    public $table;
    public $columns;
    public $columnsList;
  
    function __construct($tableName, ...$args) {
      $this->table = $tableName;
      $this->columns = "(" . implode(",", $args) . ")";
      $this->columnsList = $args;
  
      if (isNewTable($tableName)) {
        $createData = "";
        foreach ($this->columnsList as $column) {
          $createData .= "$column varchar(100),";
        }
        $createData = rtrim($createData, ",");
  
        $conn = connect();
        $conn->query("CREATE TABLE $this->table($createData)");
        $conn->close();
      }
    }
    // Get all values from the table
    function getAll() {
        $conn = connect();
        $result = $conn->query("SELECT * FROM $this->table");
        disconnect($conn);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
      }
    
      // Get one value based on a column's data
      function getOne($search, $value) {
        $conn = connect();
        $result = $conn->query("SELECT * FROM $this->table WHERE $search = '$value'");
        disconnect($conn);
        $data = $result->fetch_assoc();
        if ($data) {
            return $data;
        } else {
            return null;
        }
      }
    
      // Delete a value based on a column's data
      function deleteOne($search, $value) {
        $conn = connect();
        $conn->query("DELETE FROM $this->table WHERE $search = '$value'");
        disconnect($conn);
      }
    
      // Delete all values from the table
      function deleteAll() {
        $this->drop(); // Remove table and recreate
        $this->__construct($this->table, ...$this->columnsList);
      }
    
      // Remove table from MySQL
      function drop() {
        $conn = connect();
        $conn->query("DROP TABLE $this->table");
        disconnect($conn);
      }
    
      // Insert values into the table
      function insert(...$args) {
        $data = "";
        foreach ($args as $arg) {
          $data .= "'$arg',";
        }
        $data = rtrim($data, ",");
    
        $conn = connect();
        $conn->query("INSERT INTO $this->table $this->columns VALUES($data)");
        disconnect($conn);
      }
  }


?>
