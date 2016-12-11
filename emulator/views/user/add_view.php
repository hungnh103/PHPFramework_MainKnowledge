<a href="<?php echo BASEURL; ?>/user/list">Go back</a>
<form action="<?php echo BASEURL; ?>/user/add" method="POST">
  <table>
    <tr>
      <td>Level</td>
      <td>
        <select name='level'>
          <option value = '1'>Member</option>
          <option value = '2'>Admin</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Username</td>
      <td><input type="text" name="txtuser"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="txtpass"></td>
    </tr>
    <tr>
      <td>Re-Password</td>
      <td><input type="password" name="txtpass2"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="ok" value="Thêm thành viên"></td>
    </tr>
  </table>
</form>

<div>
  <?php
  if(isset($data['error']) && $data['error'] != ""){
    foreach($data['error'] as $err){
      echo "$err<br />";
    }
  }
  ?>
</div>
