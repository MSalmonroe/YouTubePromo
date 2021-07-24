<?php
require_once '../adconnect.php';
// エラー項目の確認
if (isset($_POST)) {
    if (empty($_POST['name'])) {
        $error['name'] = 'blank';
    }
    if (empty($_POST['title'])) {
        $error['title'] = 'blank';
    }
    if (empty($_POST['url'])) {
        $error['url'] = 'blank';
    }
    if (empty($_POST['iframe'])) {
        $error['iframe'] = 'blank';
    }
    if (empty($_POST['overview'])) {
        $error['overview'] = 'blank';
    }
    if (empty($_POST['password'])) {
        $error['password'] = 'blank';
    }
}

if (empty($error)) {
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
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube動画宣伝</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&family=Yusei+Magic&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <nav id="navber">
        <img class="navimg" src="..\img\yt_logo_rgb_dark.png" alt="youtube-logo">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">投稿する！</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">このサイトについて
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.youtube.com/">YouTube</a>
            </li>
        </ul>
    </nav>
    <section class="bg_img">
        <div class="textposition">
            <h1>YouTube<br>動画宣伝</h1>
            <p>あなたが投稿した動画をみんなに知らせよう！</p>
            <a class="btn btn-primary" href="../index.php" role="button">ホームへ</a>
        </div>
    </section>
    <div id="wrap">
        <div class="container-xxl">
            <h2>『チャンネルを宣伝する』</h2>
        </div>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label ">チャンネル名</label>
                <?php if (isset($error['name'])) : ?><p class="error">※チャンネル名が入力されていません</p> <?php endif; ?>
                <input type="text" class="form-control form-control-lg" id="" name="name" placeholder="〇〇〇チャンネル">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">動画のタイトル</label>
                <?php if (isset($error['title'])) : ?><p class="error">※動画のタイトルが入力されていません</p> <?php endif; ?>
                <input type="text" class="form-control form-control-lg" id="" name="title" placeholder="『例：メントスコーラやってみた！』">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">動画のURL</label>
                <?php if (isset($error['name'])) : ?><p class="error">※URLが入力されていません</p> <?php endif; ?>
                <input type="url" class="form-control form-control-lg" id="" name="url" placeholder="https://www.youtube.com?=〇〇〇〇">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">動画の埋め込み用コード</label>
                <?php if (isset($error['iframe'])) : ?><p class="error">※埋め込みコードが入力されていません</p> <?php endif; ?>
                <input type="text" class="form-control form-control-lg" id="" name="iframe" placeholder="動画の「共有」の欄にある「埋め込み」のコードをコピーしてここにペーストしてください">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">チャンネルの概要欄</label>
                <?php if (isset($error['overview'])) : ?><p class="error">※概要欄が入力されていません</p> <?php endif; ?>
                <textarea class="form-control form-control-lg" id="" name="overview" rows="10" placeholder="ここにチャンネルの概要欄または説明文を記入してください。"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">削除用パスワード(8文字以内)</label>
                <?php if (isset($error['password'])) : ?><p class="error">※パスワードが入力されていません</p> <?php endif; ?>
                <input type="password" class="form-control form-control-lg" id="" name="password" maxlength="8" placeholder="パスワードを忘れると投稿した動画を削除できなくなるので注意してください">
            </div>
            <div class="mb-3 submit2">
                <input type="submit" class="form-control form-control-lg submit" value="投稿する！">
            </div>
        </form>

        <footer class="footer mt-auto py-3 bg-light">
            <div class="container">
                <span class="text-muted">フッターのコンテンツをここに置きます。</span>
            </div>
        </footer>
    </div>
</body>

</html>