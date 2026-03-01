<?php require_once './template/default/head.php' ?> 
<?php require_once './template/default/header.php' ?>
<?php $selected_val = $_GET['stars'] ?? 'all'; // Запоминаем выбор ?>
<main class="exception2">
        <div class="row">
            <h3>Отсортировать по звёздам</h3>
            <form method="GET">
                <select name="stars" style="height: 25px; margin-left: 10px;" onchange="this.form.submit()">
                    <option value="all" <?= $selected_val == 'all' ? 'selected' : '' ?>>Все</option>
                    <option value="1"   <?= $selected_val == '1' ? 'selected' : '' ?>>1</option>
                    <option value="2"   <?= $selected_val == '2' ? 'selected' : '' ?>>2</option>
                    <option value="3"   <?= $selected_val == '3' ? 'selected' : '' ?>>3</option>
                    <option value="4"   <?= $selected_val == '4' ? 'selected' : '' ?>>4</option>
                    <option value="5"   <?= $selected_val == '5' ? 'selected' : '' ?>>5</option>
                </select>
            </form>
        </div>
        <div class="grid-news">
            <?php
                // 1. Подготавливаем шаблон запроса с плейсхолдером (?)
                if ($selected_val === 'all') {
                    $sql = "SELECT * FROM reviews";
                    $result_reviews = mysqli_query($link, $sql);
                } else {
                    $sql = "SELECT id, name, description, stars FROM reviews WHERE stars = ?";
                    $stmt = mysqli_prepare($link, $sql);
                    mysqli_stmt_bind_param($stmt, "i", $selected_val);
                    mysqli_stmt_execute($stmt);
                    $result_reviews = mysqli_stmt_get_result($stmt);
                }

                $reviews = mysqli_fetch_all($result_reviews, MYSQLI_ASSOC);
                $quantity_reviews = count($reviews);
                for ($i = $quantity_reviews - 1; $i >= 0; $i--):
            ?>
            
                <div class="news-card1 animate-on-scroll" style="max-width: 600px;">
                    <div class="news-wrapper">
                        <h2><?= $reviews[$i]['name'] ?></h2>
                        <h3>
                            <?= $reviews[$i]['description'] ?>
                        </h3>
						<h3 style="margin: 20px 0;">
							<?php 
								for ($o = 0; $o < $reviews[$i]['stars']; $o++):
							?>
                            	<span>★</span>
							<?php endfor; ?>
                        </h3>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
</main>
<?php require_once './template/default/footer.php' ?>