<?php require_once './template/default/head.php' ?> 
<?php require_once './template/default/header.php' ?>
    <main class="exception1">
        <h1 class="title animate-on-scroll" style="color: #1F2652;">Наши специальности</h1>
        <?php 
            for ($i = $quantity_speciality - 1; $i >= 0; $i--):
                if ($i%2 != 0) {
                    $reverse = "flex-direction: row-reverse;";
                } 
                else {
                    $reverse = "";
                }
        ?>
            <div class="wrapper12 animate-on-scroll" style="margin-bottom: 80px; <?= $reverse ?>">
                <h2>
                    <?= $speciality[$i]['description'] ?>
                </h2><img src="./template/default/img/prof<?= $i ?>.jpg" alt="">
            </div>
        <? endfor; ?>
    </main>
<?php require_once './template/default/footer.php' ?>