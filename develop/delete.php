<?php

require_once 'db.php';
require_once 'user.php';

$id = $_POST["id"];
$user = new User($id);
$user->delete($id);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>完了画面</title>
    <link rel="stylesheet" href="style_new.css">
</head>

<body>
    <div>
        <h1>mini System</h1>
    </div>
    <div>
        <h2>削除完了画面</h2>
    </div>
    <div>
        <h1>削除完了</h1>
        <p>
            削除しました。<br>
        </p>
        <button type="button">TOPに戻る</button>
    </div>
</body>

</html>