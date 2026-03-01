<?php require_once './template/default/head.php' ?> 
<?php require_once './template/default/header.php' ?>
    <main>
        <img src="./template/default/img/bg.jpg" class="main-img">
        <h1 class="title animate-on-scroll">Открываем таланты, раскрываем потенциал.</h1>
        <div class="wrapper animate-on-scroll" style="margin-bottom: 80px;">
            <div class="info">
                <div class="wrapper1">
                    <h1>40 000</h1>
                    <p>Обучающихся</p>
                </div>
                <img src="./template/default/img/icons8-schoolboy-at-a-desk-100.png" alt="">
            </div>
            <div class="info">
                <div class="wrapper1">
                    <h1>100</h1>
                    <p>Преподователей</p>
                </div>
                <img src="./template/default/img/icons8-training-100.png" alt="">
            </div>
            <div class="info">
                <div class="wrapper1">
                    <h1>2 000</h1>
                    <p>Классов</p>
                </div>
                <img src="./template/default/img/icons8-classroom-100.png" alt="">
            </div>
        </div>
        <div class="separator"></div>
        <h1 class="title animate-on-scroll">Наши специальности</h1>
        <div class="wrapper animate-on-scroll" style="margin-bottom: 120px; justify-content: center;">
            <div class="grid-spec">
                <a href="./speciality.php" style="color: white;"><div class="block-spec speciality">
                    <div class="blur"><h3>Стань успешным IT специалистом</h3></div>
                    <h1 class="spec">Программирование</h1>
                </div></a>
                <a href="./speciality.php" style="color: white;"><div class="block-spec speciality1">
                    <div class="blur"><h3>Стань успешным графическим художником </h3></div>
                    <h1 class="spec">Граф. дизайн</h1>
                </div></a>
                <a href="./speciality.php" style="color: white;"><div class="block-spec speciality2">
                    <div class="blur"><h3>Стань успешным специалистом в ИБ</h3></div>
                    <h1 class="spec">Инф. безопасность</h1>
                </div></a>
            </div>
        </div>
        <div class="separator"></div>
        <h1 class="title animate-on-scroll">Наши партнёры</h1>
        <div class="wrapper animate-on-scroll" style="margin-bottom: 80px;">
            <div class="info">
                <img src="./template/default/img/icons8-it-100.png" alt="">
                <h1>ITProject</h1>
            </div>
            <div class="info">
                <img src="./template/default/img/icons8-bank-building-100.png" alt="">
                <h1>Bank</h1>
            </div>
        </div>
        <div class="separator"></div>
        <h1 class="title animate-on-scroll">Новости</h1>
        <div class="news-section animate-on-scroll">
            <div class="news-carousel">
                <button class="carousel-btn prev" onclick="scrollNews(-1)">‹</button>
                    <div class="news-track" id="newsTrack">
                        <?php
                            foreach ($news as $key => $news):
                        ?>  
                            <a href="./news1.php?id=<?= $news['id'] ?>&img=<?= $news['id'] ?>" class="news-card" style="min-width: 280px;">
                                <img src="./template/default/img/news<?= $news['id'] ?>.jpg" class="news-img" alt="">
                                <div class="news-text">
                                    <h3><?= $news['title'] ?></h3>
                                        <p><?= $news['cropped_description'] ?></p>
                                        <span class="read-more">Подробнее...</span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <button class="carousel-btn next" onclick="scrollNews(1)">›</button>
            </div>
            <div class="news-counter" id="newsCounter">1 / 6</div>
        </div>
    </main>
<?php require_once './template/default/footer.php' ?>