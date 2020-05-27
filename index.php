<?php
if(isset($_GET['q'])){
    require 'db.php';
    $p = $c->prepare('SELECT src FROM links where id = ?');
    $p->execute([$_GET['q']]);
    $r = $p->fetch();
    header("Location: ".$r['src']);
}
?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<form action="shorten.php" method="post">
    <input name="src" placeholder="ссылка">
    <input type="submit">
</form>
</body>
</html>