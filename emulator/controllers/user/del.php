<?php
$uid = $_GET['uid'];
$muser = new Model_User;
$muser->deleteUser($uid);
redirect(BASEURL."/user/list");
