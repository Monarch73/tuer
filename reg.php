<?php
if (isset($_POST['pwd']) && $_POST['pwd'] == 'lidenise')
{
	$exp=60*60*2;
	if (isset($_POST['expire']))
	{
		$exp=(int)$_POST['expire'];
		$exp *= 24*60*60;
	}
	setcookie('UNLOCK','3005',time()+$exp);
}

if (isset($_COOKIE['UNLOCK']) && $_COOKIE['UNLOCK'] == '3005')
{
	echo "Cookie valide<br />";
}
?>
<form method="POST" action="?">
<table border=1>
<tr>
<td>Passwort</td>
<td><input type="text" name="pwd" id="pwd" /></td>
</tr>
<tr>
<td>expire days</td>
<td><input type="text" name="expire" id="expire" /></td>
</tr>
</table>
<input type="submit" value="ok" />
</form>


