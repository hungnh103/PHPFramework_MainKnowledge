<?php
$data = "";
$uid = $_GET['uid'];
$muser = new Model_User;

if(isset($_POST['ok'])){
  $valid = new Helper_Validate;
  $valid->notEmpty($_POST['txtuser'], $lang['notempty_user']);

  if(!empty($_POST['txtpass'])){
    $valid->notMatches($_POST['txtpass'], $_POST['txtpass2'], $lang['notmatches_pass']);
  } else {
    $p = "none";
  }

  if ($valid->isValid() == false) {
    $data['err'] = $valid->getMessage();
  } else {
    $u = $_POST['txtuser'];
    if (!isset($p)) $p = $_POST['txtpass'];
    $l = $_POST['level'];
    if($muser->checkUsername($u, $uid) == TRUE){
      if($p == "none"){
        $arr = array("username" => $u, "level" => $l);
      } else {
        $arr = array("username" => $u, "password" => $p, "level" => $l);
      }
      $muser->where("id = '$uid'");
      $muser->updateUser($arr);
      redirect(BASEURL."/user/list");
    } else {
      $data['err'][] = $lang['registered_user'];
    }
  }
}

$data['output'] = $muser->getUserById($uid);
loadview("user/edit_view", $data);
