<?php
if($_POST) {
    require 'db.php';
    $src = $_POST['src'];
    if(!(strpos($src,"http://") || strpos($src,"https://"))){
        $src = "http://".$src;
    }
    $hash = md5($src.time());
    $hash = mb_substr($hash,0,5);
    $p = $c->prepare('insert into links (id,src) values (?,?)');
    $p->execute([$hash,$src]);
    $url = "http://".$_SERVER['HTTP_HOST']."/?q=".$hash;
}else{
    header("Location: index.php");
}
?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
Ваша ссылка: <a href="<?=$url?>"><?=$url?></a>
</body>
</html>
