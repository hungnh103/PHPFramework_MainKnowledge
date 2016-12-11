<?php
$data = "";
if(isset($_POST["ok"])){
  $valid = new Helper_Validate;
  $valid->notEmpty($_POST['txtuser'], $lang['notempty_user']);
  $valid->notEmpty($_POST['txtpass'], $lang['notempty_pass']);
  $valid->notMatches($_POST['txtpass'], $_POST['txtpass2'], $lang['notmatches_pass']);

  if($valid->isValid() == FALSE){
    $data['error'] = $valid->getMessage();
  }else{
    $u = $_POST['txtuser'];
    $p = $_POST['txtpass'];
    $l = $_POST['level'];
    $muser = new Model_User;
    if($muser->checkUsername($u) == true){
      $arr = array("username" => $u, "password" => $p, "level" => $l);
      $muser->addUser($arr);
      redirect(BASEURL."/user/list");
    } else {
      $data['error'][] = $lang['registered_user'];
    }
  }
}

loadview("user/add_view", $data);
