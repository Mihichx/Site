<? 
    session_start();
    if ($_SESSION['auth_success'] !== true) {
        header("Location: index.php");
        exit;
    }
    unset($_SESSION['auth_success']); 
?>
<?php require_once './template/default/head.php' ?> 
<?php require_once './template/default/header.php' ?>
    <main class="exception">
        <h3><?= $_SESSION['user_name'] ?></h3>
        <form action="./leave.php" method="POST">
            <input type="hidden" name="from_button" value="1">
            <button type="submit">Оставить отзыв</button>
        </form>
    </main>
<?php require_once './template/default/footer.php' ?>