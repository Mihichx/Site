<?php require_once './template/default/head.php' ?> 
<?php require_once './template/default/header.php' ?>
<?php require_once './location_news.php' ?>
<main class="exception2">
        <div class="grid-news">
            <?php
                foreach ($list as $key => $item):
            ?>  
                <a href="./news1.php?id=<?= $item['id'] ?>&img=<?= $item['id'] ?>"><div class="news-card1 animate-on-scroll">
                    <img src="./template/default/img/news<?= $item['id'] ?>.jpg" alt="">
                    <div class="news-wrapper">
                        <h2><?= $item['title'] ?></h2>
                        <h3>
                            <?= $item['cropped_description'] ?>
                        </h3>
                    </div>
                </div></a>
            <?php endforeach; ?>
        </div>
        <div><?= $pageList ?></div>
</main>
<?php require_once './template/default/footer.php' ?>