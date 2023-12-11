<?php
require_once('../controllers/UserController.php');
$userCtr=new UserController();
$res=$userCtr->getUser($_GET['id']);
?>
<form name = 'f1' method='post' action='modification.php'>
<table border='1'>
	<tr>
<td>username</td>
<td><input type = "text" name = "username" value = "<?php echo $res['username'] ?>"/></td></tr>
<tr>
<td>password</td>
<td><input type = "text" name = "password" value = "<?php echo $res['password'] ?>"/></td></tr>

</table></form>