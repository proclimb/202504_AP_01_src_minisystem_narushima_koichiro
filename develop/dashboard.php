<?php
require_once 'db.php';
require_once 'user.php';

$user = new User($pdo);

$keyword = isset($_POST["keyword"]) ? trim($_POST["keyword"]) : "";
$keyword = htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8');

$result = $user->search($keyword);
if (!$result) {
    $result = [];
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>mini System</title>
    <link rel="stylesheet" href="style_new.css">
</head>

<body>
    <div>
        <h1>mini System</h1>
    </div>
    <div>
        <h2>ダッシュボード</h2>
    </div>
    <div>
        <!-- 何らかの表があれば検索ボタンを表示 -->
        <?php if (!empty($result)) { ?>
            <form action="dashboard.php" method="post">
                <input type="text" name="keyword" placeholder="名前を入力する" value="<?php echo $_POST['keyword'] ?>">
                <button type="submit">名前で検索する</button>
            </form>
        <?php } ?>

        <!-- 検索が実行された場合のみ「全件表示」ボタンを表示 -->
        <?php if (!empty($keyword)) { ?>
            <a href="dashboard.php">
                <button type="button">全件表示</button>
            </a>
        <?php } ?>
    </div>

    <?php if ($result) { ?>
        <table border="1" width="100%">
            <tr>
                <th></th>
                <th>お名前</th>
                <th>ふりがな</th>
                <th>メールアドレス</th>
                <th>電話番号</th>
                <th>性別</th>
            </tr>
            <?php foreach ($result as $val) { ?>
                <tr>
                    <td><a href="edit.php?id=<?php echo $val['id'] ?>">編集</a></td>
                    <td><?php echo ($val['name']); ?></td>
                    <td><?php echo ($val['kana']); ?></td>
                    <td><?php echo ($val['email']); ?></td>
                    <td><?php echo ($val['tel']); ?></td>
                    <td><?php
                        if ($val['gender'] == 1) {
                            echo '男性';
                        } elseif ($val['gender'] == 2) {
                            echo '女性';
                        } ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
    <div>

        <a href="index.php">
            <button type="button">TOPに戻る</button>
        </a>
    </div>
</body>

</html>