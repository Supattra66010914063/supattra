<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุพัตรา หาญกุดเลาะ(ปริม)</title>
</head>

<body>
<h1>a.php<h1>
<?php

    $_SESSION['name']="สุพัตรา หาญกุดเลาะ";
    $_SESSION['nickname']="ปริม";
    echo $_SESSION['name']."<br>"; 
    echo $_SESSION['nickname']."<br>";  
?>
</body>
</html>