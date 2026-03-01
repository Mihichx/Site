<?php
    // Доступ к станице только через кнопку "Оставить отзыв"
    if (!isset($_POST['from_button']) && !isset($_GET['success'])) {
        header("Location: index.php");
        exit;
    }

    require_once './template/default/db.php';

    // Добавление данных в бд с безопасностью от SQL инъекций 
    if (!empty($_POST['name']) && !empty($_POST['description']) && isset($_POST['radio'])) {

        $query = "INSERT INTO reviews (name, description, stars) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($link, $query);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $_POST['name'], $_POST['description'], $_POST['radio']);
            
            if (mysqli_stmt_execute($stmt)) {
                header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
                exit(); 
            }
            mysqli_stmt_close($stmt);
        }
    }
?>

<?php require_once './template/default/head.php' ?> 
<?php require_once './template/default/header.php' ?>

<main class="exception">
    <?php if (isset($_GET['success'])): ?>
        <p style="color: green;">Отзыв успешно добавлен!</p>
    <?php endif; ?>
    
    <?php if (empty($_GET)): ?>
    <form action="" method="POST">
        <input type="hidden" name="from_button" value="1">
        <div class="column form">
            <h3>Имя</h3>
            <input required name="name" value="<?= $_SESSION['user_name'] ?>">
            <h3>Текст</h3>
            <input required name="description" class="description-forms">
            <h3>Звёзды</h3>
            <div>
                <input required type="radio" name="radio" value="1">
                <input type="radio" name="radio" value="2">
                <input type="radio" name="radio" value="3">
                <input type="radio" name="radio" value="4">
                <input type="radio" name="radio" value="5">
            </div>
            <button type="submit">Отправить</button>
        </div>
    </form>
    <? endif; ?>
</main>

<?php require_once './template/default/footer.php' ?>