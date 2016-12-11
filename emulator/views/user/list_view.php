<style type="text/css">
  tr:hover {
    background: #ddd;
  }
</style>
<script type="text/javascript">
  function check(){
    if(!window.confirm("Are you serious?")){
      return false;
    }
  }
</script>

<a href="<?php echo BASEURL; ?>/user/add">Add user</a>
<table width="400" border="1" align="center" cellspacing="0">
  <tr>
    <th>STT</th>
    <th>Username</th>
    <th>Level</th>
    <th>Edit</th>
    <th>Del</th>
  </tr>
  <?php
  if (empty($data)) {
    echo "<tr>";
      echo "<td colspan='5' align='center'>no data</td>";
    echo "</tr>";
  } else {
    $i = 1;
    foreach($data as $value){
      echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>$value[username]</td>";
        if($value['level'] == 2){
          echo "<td style='color: red; font-weight:bold;'>Admin</td>";
        } else {
          echo "<td>Member</td>";
        }
        // echo "<td><a href='index.php?controller=user&action=edit&uid=$value[id]'>Edit</a></td>";
        // echo "<td><a href='index.php?controller=user&action=del&uid=$value[id]' onclick='return check();'>Del</a></td>";

        echo "<td><a href='".BASEURL."/user/edit/uid/$value[id]'>Edit</a></td>";
        echo "<td><a href='".BASEURL."/user/del/uid/$value[id]' onclick='return check();'>Del</a></td>";
      echo "</tr>";

      $i++;
    }
  }
  ?>
</table>
