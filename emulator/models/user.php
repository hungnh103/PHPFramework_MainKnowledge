<?php
class Model_User extends Model{
  protected $_table = "user";

  public function listAll(){
    $this->getData($this->_table);
    return $this->fetchAll();
  }

  public function deleteUser($id){
    $this->where("id = '$id'");
    $this->delete($this->_table);
  }

  public function addUser($data){
    $this->insert($this->_table, $data);
  }

  public function checkUsername($username, $id=""){
    if($id != ""){
      $this->_where = "where id <> '$id' and username='$username'";
    }else{
      $this->where("username = '$username'");
    }
    $this->select("username");
    $this->getData($this->_table);
    if($this->num_rows() == 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function getUserById($id){
    $this->where("id = '$id'");
    $this->select("id, username, level");
    $this->getData($this->_table);
    return $this->fetch();
  }

  public function updateUser($data){
    $this->update($this->_table, $data);
  }
}
