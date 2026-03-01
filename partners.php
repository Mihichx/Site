<?php require_once './template/default/head.php' ?> 
<?php require_once './template/default/header.php' ?>
    <main class="exception1">
        <h1 class="title animate-on-scroll" style="color: #1F2652;">Наши партнёры</h1>
        <?php 
            for ($i = $quantity_partners - 1; $i >= 0; $i--):
                if ($i%2 == 0) {
                    $reverse = "flex-direction: row-reverse;";
                } 
                else {
                    $reverse = "";
                }
        ?>
            <div class="wrapper12 animate-on-scroll" style="margin-bottom: 80px; <?= $reverse ?>">
                <h2>
                    <?= $partners[$i]['description'] ?>
                </h2><img class="img1" src="./template/default/img/<?= $partners[$i]['name_img'] ?>" alt="">
            </div>
        <? endfor; ?>
    </main>
<?php require_once './template/default/footer.php' ?>