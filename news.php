<?php require_once './template/default/head.php' ?> 
<?php require_once './template/default/header.php' ?>
<main class="exception2">
        <div class="grid-news">
            <?php
                for ($i = $quantity_news - 1; $i >= 0; $i--):
            ?>  
                <a href="./news1.php?id=<?= $news[$i]['id'] ?>&img=<?= $i ?>"><div class="news-card1 animate-on-scroll">
                    <img src="./template/default/img/news<?= $i ?>.jpg" alt="">
                    <div class="news-wrapper">
                        <h2><?= $news[$i]['title'] ?></h2>
                        <h3>
                            <?= $news[$i]['cropped_description_index'] ?>
                        </h3>
                    </div>
                </div></a>
            <?php endfor; ?>
        </div>
</main>
<?php require_once './template/default/footer.php' ?>