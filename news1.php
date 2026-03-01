<?php require_once './template/default/head.php' ?> 
<?php require_once './template/default/header.php';
    $id = (int)$_GET['id'];
    $query = 'SELECT * FROM news WHERE id=' . $id;
    $res = mysqli_query($link, $query);
    $data = mysqli_fetch_assoc($res);
?>
    <main class="exception2">
        <div class="news-card2 animate-on-scroll">
            <div>
                <img src="./template/default/img/news<?= $_GET['img'] ?>.jpg" alt="">
                <h2><?= $data['title'] ?></h2>
                <h3>
                    <?= $data['description_news'] ?>
                </h3>
            </div>
        </div>
    </main>

<?php require_once './template/default/footer.php' ?>