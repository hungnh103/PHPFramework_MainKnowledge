<?php
class Helper_Validate{
  protected $_mess;

  public function notEmpty($text, $error){
    if($text == NULL){
      $this->_mess[] = $error;
    }
  }

  public function notMatches($text1, $text2, $error){
    if($text1 != $text2){
      $this->_mess[] = $error;
    }
  }

  public function isValid(){
    if($this->_mess){
      return FALSE;
    }else{
      return TRUE;
    }
  }

  public function getMessage(){
    return $this->_mess;
  }
}
