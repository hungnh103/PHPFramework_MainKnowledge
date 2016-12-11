<?php
$data = "";
$muser = new Model_User;
$muser->order("id", "desc");
$data = $muser->listAll();
loadview("user/list_view", $data);
