<?php
require_once 'adconnect.php';
$db = getDb();
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
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <nav id="navber">
    <img class="navimg" src="img\yt_logo_rgb_dark.png" alt="youtube-logo">
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="post\post.php">投稿する！</a>
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
      <a class="btn btn-primary" href="post\post.php" role="button">投稿画面へ</a>
    </div>
  </section>
  <component>
    <div id="wrap">
      <div class="container-xxl">
        <h2>『　最新の投稿　』</h2>
        <div class="row row-cols-1 row-cols-sm-2 g-2">
          <?php
          $ytb = $db->prepare('SELECT * FROM posts ORDER BY id DESC');
          $ytb->execute();
          //結果セットの内容を順に出力
          while ($row = $ytb->fetch(PDO::FETCH_ASSOC)) {
          ?>
            <div class="col">
              <div class="card shadow-sm">
                <div class="card-body">
                  <div class="ytbframe"><?php echo $row['iframe'] ?></div>
                  <p class="card-text">チャンネル名：『<?php echo $row['name'] ?>』</p>
                  <p class="card-text overview"><?php echo mb_strimwidth(h($row['overview']), 0, 200, '...', 'UTF-8'); ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" onclick="location.href='<?php echo h($row['url']) ?>'" class="btn btn-sm btn-outline-secondary">チャンネルへ</button>
                      <button type="button" onclick="location.href='#'" class="btn btn-sm btn-outline-secondary">詳細</button>
                      <button type="button" onclick="location.href='#'" class="btn btn-sm btn-outline-secondary">削除</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </component>
  <footer class="footer mt-auto py-3 bg-light">
    <div class="container">
      <span class="text-muted">フッターのコンテンツをここに置きます。</span>
    </div>
  </footer>
</body>

</html>