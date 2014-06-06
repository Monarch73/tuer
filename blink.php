<?php
if (isset($_GET['c']) && (!isset($_COOKIE['UNLOCK']) || $_COOKIE['UNLOCK'] != COOKIE_VALUE ))
{
    $arr=unserialize(file_get_contents('code.txt'));
    if (isset($arr['code']) && $arr['code'] == $_GET['c'])
    {
        if (time() < $arr['expire'])
        {
            setcookie('UNLOCK',COOKIE_VALUE,$exp);
            header('Location: ' .$_SERVER['PHP_SELF'].'s=f');
            exit(0);
        }
        else
        {
            echo "Code abgelaufen";
        }
    }
    else 
    {
        echo "keinde Daten hinterlegt";
    }
}

if (isset($_GET['s']) && $_GET['s'] == 'f' && isset($_COOKIE['UNLOCK']) && $_COOKIE['UNLOCK'] == COOKIE_VALUE)
{
	 file_put_contents("/sys/class/gpio/gpio18/value", "1\n");
	system('/bin/sleep 0.5');
	 file_put_contents("/sys/class/gpio/gpio18/value", "0\n");
}
?>

<html>
<head>
<title></title>
<style>
body { background: #000000; }

.button {
    display: inline-block;
    position: relative;
    margin: 30px;
    padding: 0 510px;
    text-align: center;
    text-decoration: none;
    font: bold 24px/25px Arial, sans-serif;
}
.green {
    color: #3e5706;
    background: #a5cd4e;
}
 
/* Blue Color */
 
.blue {
    color: #19667d;
    background: #70c9e3;
}
 
/* Gray Color */
 
.gray {
    color: #515151;
    background: #d3d3d3;
}
</style>
</head>
<body>
<a href="?s=f" class="button green">open</a><br />
<?php
if ( isset($_COOKIE['UNLOCK']) && $_COOKIE['UNLOCK'] == '3005')
{
	echo "<div class=\"green\">Cookie ok!</div>";
}
?>
</body>

