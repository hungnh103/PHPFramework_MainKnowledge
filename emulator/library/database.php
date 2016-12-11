<?php
class Database{
  protected $_hostname = "localhost";
  protected $_userhost = "root";
  protected $_passhost = "";
  protected $_dbname = "project";
  protected $_conn;
  protected $_result;

  public function connect(){
    $this->_conn = mysql_connect($this->_hostname, $this->_userhost, $this->_passhost);
    mysql_select_db($this->_dbname, $this->_conn);
  }

  public function disconnect(){
    if($this->_conn){
      mysql_close($this->_conn);
    }
  }

  public function query($sql){
    $this->_result = mysql_query($sql);
  }

  public function num_rows(){
    if($this->_result){
      $row = mysql_num_rows($this->_result);
    }
    else {
      $row = 0;
    }
    return $row;
  }

  public function fetch(){
    if($this->_result){
      $row = mysql_fetch_assoc($this->_result);
    } else {
      $row = 0;
    }
    return $row;
  }

  public function fetchAll(){
    $data = "";
    if($this->_result){
      while($row = $this->fetch()){
        $data[] = $row;
      }
    }
    return $data;
  }
}



// ==================== //
// ==================== //
// ==================== //
class Model extends Database{
  protected $_where;
  protected $_select = "*";
  protected $_order;
  protected $_limit;

  public function __construct(){
    $this->connect();
  }

  public function where($where){
    if(is_array($where)){
      foreach($where as $k => $v){
        $arr[] = "$k '$v'";
      }
      $cond = implode(" and ", $arr);
      $this->_where = "where $cond";
    } else {
      $this->_where = "where $where";
    }
  }

  public function select($col){
    if($col != ""){
      $this->_select = $col;
    }
  }

  public function order($col, $type = "asc"){
    if($col != ""){
      $this->_order = "order by $col $type";
    }
  }

  public function limit($record, $start = ""){
    if($start != ""){
      $this->_limit = "limit $start, $record";
    } else {
      $this->_limit = "limit $record";
    }
  }

  public function insert($table, $data){
    $col = implode(", ", array_keys($data));
    $value = array_values($data);
    foreach($value as $item){
      $insvalue[] = "'$item'";
    }
    $insvalue = implode(", ", $insvalue);
    $sql = "insert into $table($col) values($insvalue)";
    $this->query($sql);
  }

  public function update($table, $data){
    foreach($data as $k => $v){
      $arr[] = "$k = '$v'";
    }
    $condition = implode(", ", $arr);
    if($this->_where){
      $where = $this->_where;
    } else {
      $where = "";
    }
    $sql = "update $table set $condition $where";
    $this->query($sql);
  }

  public function delete($table){
    if($this->_where){
      $where = $this->_where;
    } else {
      $where = "";
    }
    $sql = "delete from $table $where";
    $this->query($sql);
  }

  public function getData($table){
    $sql = "select $this->_select from $table $this->_where $this->_order $this->_limit";
    $this->query($sql);
  }
}
