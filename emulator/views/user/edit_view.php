<a href="<?php echo BASEURL; ?>/user/list">Go back</a>
<form action="<?php echo BASEURL."/user/edit/uid/".$data['output']['id']; ?>" method="POST">
  <table>
    <tr>
      <td>Level</td>
      <td>
        <select name='level'>
          <option value = '1' <?php if($data['output']['level'] == 1) echo "selected='selected'"; ?>>Member</option>
          <option value = '2' <?php if($data['output']['level'] == 2) echo "selected='selected'"; ?>>Admin</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Username</td>
      <td><input type="text" name="txtuser" value="<?php echo $data['output']['username']; ?>"></td>
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
      <td><input type="submit" name="ok" value="Sửa thành viên"></td>
    </tr>
  </table>
</form>

<div>
  <?php
  if(isset($data['err'])){
    foreach($data['err'] as $err){
      echo "$err<br />";
    }
  }
  ?>
</div>
