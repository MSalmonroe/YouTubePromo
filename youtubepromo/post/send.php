<?php
require_once '../adconnect.php';
// エラー項目の確認

if (!empty($_POST)) {
    $db = getDb();
    $stmt = $db->prepare("INSERT INTO posts(name, title, url, iframe, overview, password) VALUES (:name,:title,:url,:iframe,:overview,:password)");
    //INSERT命令に入力データをセット
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':title' => $_POST['title'],
        ':url' => $_POST['url'],
        ':iframe' => $_POST['iframe'],
        ':overview' => $_POST['overview'],
        'password' => $_POST['password']
    ));
    header('Location: http://localhost/youtubepromo/index.php');
    exit();
} else {
    header('Location: http://localhost/youtubepromo/post/post.php');
}
