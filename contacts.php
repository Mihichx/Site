<?php require_once './template/default/head.php' ?> 
<?php require_once './template/default/header.php' ?>
    <main class="exception2">
        <div class="grid animate-on-scroll">
            <?php
                for ($i = 0; $i < $quantity_contacts; $i++):
            ?>  
                <div class="card">
                    <h1>
                        <?= $contacts[$i]['description'] ?>
                    </h1>
                    <div class="wrapper1">
                        <h3>Кабинет:</h3>
                        <h3 style="color: #E6DB9D;">
                            <?= $contacts[$i]['cabinet'] ?>
                        </h3>
                    </div>
                    <div class="wrapper1 leveling">
                        <h3>Телефон:</h3>
                        <h3 style="color: #E6DB9D;">
                            <?= $contacts[$i]['telephone'] ?>
                        </h3><img src="./template/default/img/icons8-telegram-app-48.png">
                    </div>
                    <div class="wrapper1">
                        <h3>Почта:</h3>
                        <h3 style="color: #E6DB9D;">
                            <?= $contacts[$i]['email'] ?>
                        </h3>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </main>
<?php require_once './template/default/footer.php' ?>