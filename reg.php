<?php
require_once 'password.php';

if (isset($_POST['pwd']) && $_POST['pwd'] == PASSWD)
{
	$exp=60*60*2;
	if (isset($_POST['expire']))
	{
		$exp=(int)$_POST['expire'];
		$exp *= 24*60*60;
                $exp += time();
	}
        
        if (isset($_POST['GenUrl']) && $_POST['GenUrl'])
        {
            $code=rand(10000,99999);
            echo "http://192.168.1.86/blink.php?s=f&c=$code";
            $arr=array(
                'expire' => $exp,
                'code' => $code 
            );
            file_put_contents("code.txt", serialize($arr));
        }
        else
        {
            setcookie('UNLOCK',COOKIE_VALUE,$exp);
        }
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
<tr>
    <td>Generate access url</td>
    <td><input name="GenUrl" type=checkbox value="1" /></td>
</tr>
</table>
    
<input type="submit" value="ok" />
</form>


