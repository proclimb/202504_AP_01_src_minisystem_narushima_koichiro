<?php

// dd.phpとuser.phpを読み込む
require_once 'db.php';
require_once 'user.php';

//confirm.phpから送られてきたデータを$dataに格納
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'name'      => $_POST['name'],
        'kana'      => $_POST['kana'],
        'tel'       => $_POST['tel'],
        'email'     => $_POST['email'],
        'birthday'  => $_POST['birthday'],
        'gender'    => $_POST['gender']
    ];
}

//$pdoから作った新しいインスタンスを$userに代入
$user = new User($pdo);

// SQLを実行
$user->create($data);

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
        <h2>完了画面</h2>
    </div>
    <div>
        <div>
            <h1>登録完了</h1>
            <p>登録ありがとうございました。</p>
            <a href="index.php"><button type="button">TOPに戻る</button></a>
        </div>
    </div>
</body>

</html>