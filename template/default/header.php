<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/template/default/db.php'; 
    session_start();

    $login = $_SESSION['temp_login'] ?? '';
    $pass = $_SESSION['temp_pass'] ?? '';
    $current_id = $_POST['id'] ?? $_GET['id'] ?? '';
    $current_img = $_POST['img'] ?? $_GET['img'] ?? '';
    
    $query_params = "";
    if ($current_id !== '' && $current_img !== '') {
        $query_params = "?id=" . urlencode($current_id) . "&img=" . urlencode($current_img);
    }

    function update_error($name_error) {
        global $query_params;
        $_SESSION['error'] = $name_error;
        header("Location: " . $_SERVER['PHP_SELF'] . $query_params);
        exit();
    }

    if (isset($_SESSION['error'])) {
        $err = $_SESSION['error'];

        if (strpos($err, 'Логин') !== false || strpos($err, 'Пароли') !== false || strpos($err, 'Заполните все поля!  ') !== false) {
            $reg_error = $err;
        } 

        elseif (strpos($err, 'Заполните все поля! ') !== false) { 
            $of_error = $err;
        } 

        elseif (strpos($err, 'Заполните все поля!') !== false || strpos($err, 'Неверный') !== false) {
            $login_error = $err;
        }

        unset($_SESSION['error']);
    }
    unset($_SESSION['temp_login']);
    unset($_SESSION['temp_pass']);


    // Добавление данных пользователя при регистрации в бд с безопасностью от SQL инъекций 
    if (isset($_POST['modal2'])) {
        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            $new_login = $_POST['login'];
            $new_pass = $_POST['password'];
            $_SESSION['temp_login'] = $new_login; 
            $_SESSION['temp_pass'] = $new_pass; 

            $check_query = "SELECT id FROM users WHERE login = ? LIMIT 1";
            $check_stmt = mysqli_prepare($link, $check_query);
            mysqli_stmt_bind_param($check_stmt, "s", $new_login);
            mysqli_stmt_execute($check_stmt);
            mysqli_stmt_store_result($check_stmt);
            $user_exists = mysqli_stmt_num_rows($check_stmt) > 0;
            mysqli_stmt_close($check_stmt);

            if ($user_exists > 0) {
                update_error("Логин '$new_login' уже занят");
            }

            if ($new_pass !== $_POST['password_repeat']) {
                update_error("Пароли не совпадают");
            }

            $query = "INSERT INTO users (login, password) VALUES (?, ?)";
            $stmt = mysqli_prepare($link, $query);
            
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ss", $_POST['login'], $_POST['password']);
                
                if (mysqli_stmt_execute($stmt)) {
                    header("Location: " . $_SERVER['PHP_SELF'] . $query_params . "&success=1");
                    exit(); 
                }
                mysqli_stmt_close($stmt);
            }
        } else {
            update_error("Заполните все поля!  ");
        }
    }


    // Добавление данных заявки в бд с безопасностью от SQL инъекций 
    if (isset($_POST['modal'])) {
        if (!empty($_POST['fio']) && !empty($_POST['phone']) && !empty($_POST['email'])) {
            $query1 = "INSERT INTO offers (fio, phone, email) VALUES (?, ?, ?)";
            $stmt1 = mysqli_prepare($link, $query1);
            
            if ($stmt1) {
                mysqli_stmt_bind_param($stmt1, "sss", $_POST['fio'], $_POST['phone'], $_POST['email']);
                
                if (mysqli_stmt_execute($stmt1)) {
                    header("Location: " . $_SERVER['PHP_SELF'] . $query_params . "&success=1");
                    exit(); 
                }
                mysqli_stmt_close($stmt1);
            }
        } else {
            update_error("Заполните все поля! ");
        }
    }


    // Проверка данных для входа в лк
    if (isset($_POST['from1_button'])) {
        $user_login = $_POST['login1'];
        $user_pass = $_POST['password1'];

        if (!empty($user_login) && !empty($user_pass)) {
            $login_clean = mysqli_real_escape_string($link, $user_login);
            $query = "SELECT * FROM users WHERE login = '$login_clean' LIMIT 1";
            $result = mysqli_query($link, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);

                if ($user_pass === $user['password']) { 
                    $_SESSION['user_name'] = $user['login'];
                    $_SESSION['auth_success'] = true;
                    
                    header('Location: login.php') . $query_params;
                    exit;
                } else {
                    $_SESSION['error'] = "Неверный пароль или логин!";
                }
            } else {
                $_SESSION['error'] = "Неверный пароль или логин!";
            }
        } else {
            $_SESSION['error'] = "Заполните все поля!";
        }
        header("Location: " . $_SERVER['PHP_SELF'] . $query_params); 
        exit;
    }
?>
<!-- modal -->
<div class="modal-bg <?= isset($login_error) || isset($reg_error) || isset($of_error) ? 'active' : '' ?>" onclick="closing()"></div>
<div class="modal-bg-catalog" onclick="closing_catalog()"></div>

<div class="modal <?= isset($of_error) ? 'active' : '' ?>">
    <form action="" method="POST" id="contact" class="card1" style="background: rgb(144, 144, 144, 0.9);">
        <input type="hidden" name="id" value="<?= $current_id ?>">
        <input type="hidden" name="img" value="<?= $current_img ?>">
        <input name="fio" placeholder="ФИО" style="padding-top: 20px;">
        <input name="phone" placeholder="Телефон" type="tel">
        <input name="email" placeholder="Почта" type="email">
        <?php if(isset($of_error)) echo "<p class='error' style='color:red; text-align:center;'>$of_error</p>"; ?>
        <button name="modal">Получить консультацию</button>
    </form>
</div>

<div class="modal1 <?= isset($login_error) ? 'active' : '' ?>">
    <form action="" method="POST" id="contact" class="card1" style="background: rgb(144, 144, 144, 0.9);">
        <input type="hidden" name="id" value="<?= $current_id ?>">
        <input type="hidden" name="img" value="<?= $current_img ?>">
        <input name="login1" placeholder="Логин" style="padding-top: 20px;">
        <input name="password1" placeholder="Пароль" type="password">
        <?php if(isset($login_error)) echo "<p class='error' style='color:red; text-align:center;'>$login_error</p>"; ?>
        <button style="padding: 10px 20px;" name="from1_button">Войти</button>
        <a class="hover" style="margin-bottom: 20px;" onclick="regist()">Зарегистрироваться</a>
    </form>
</div>

<div class="modal2 <?= isset($reg_error) ? 'active' : '' ?>">
    <form action="" method="POST" id="contact" class="card1" style="background: rgb(144, 144, 144, 0.9);">
        <input type="hidden" name="id" value="<?= $current_id ?>">
        <input type="hidden" name="img" value="<?= $current_img ?>">
        <a class="hover" style="margin-top: 20px; font-size: 30px">Регистрация</a>
        <input name="login" placeholder="Логин" style="padding-top: 20px;" value="<?= htmlspecialchars($login) ?>">
        <input id="pass" name="password" placeholder="Пароль" type="password" value="<?= htmlspecialchars($pass) ?>">
        <input name="password_repeat" placeholder="Повторите пароль" type="password">
        <?php if(isset($reg_error)) echo "<p class='error' style='color:red; text-align:center;'>$reg_error</p>"; ?>
        <button style="padding: 10px 20px;" name="modal2">Подтвердить</button>
    </form>
</div>

<?php
    $current_page = basename($_SERVER['SCRIPT_NAME']);
?>

<header>
    <div class="wrapper">
        <div style="display: flex; flex-direction: row; align-items: center;">
            <img src="./template/default/img/icons8-education-50.png" class="logo" alt="">
            <p class="logo-p">Образование.ру</p>
        </div>
        
        <div class="wrapper-aboutus">
            <?php 
                $about_pages = ['speciality.php', 'partners.php', 'contacts.php'];
                $is_about_active = in_array($current_page, $about_pages);
            ?>
            <a class="header-block <?= $is_about_active ? 'active' : '' ?>" onclick="open_catalog()" style="display: flex; align-items: center;">
                О нас <img src="./template/default/img/icons8-sort-down-30.png" alt="" class="aboutus-img">
            </a>
            
            <div class="dropdown-content">
                <a href="./speciality.php" class="<?= $current_page == 'speciality.php' ? 'active' : '' ?>">Специальности</a>
                <a href="./partners.php" class="<?= $current_page == 'partners.php' ? 'active' : '' ?>">Партнёры</a>
                <a href="./contacts.php" class="<?= $current_page == 'contacts.php' ? 'active' : '' ?>">Контакты</a>
            </div>
        </div>
        
        <a href="./aboutus.php" class="header-block <?= $current_page == 'aboutus.php' ? 'active' : '' ?>">История</a>
        <a href="./news.php" class="header-block <?= $current_page == 'news.php' ? 'active' : '' ?>">Новости</a>
        
        <?= $current_page != 'index.php' ? '<a href="./index.php"><img src="./template/default/img/icons8-castle-64.png" class="home"></a>' : '' ?>

        <a href="./reviews.php" class="header-block <?= $current_page == 'reviews.php' ? 'active' : '' ?>">Отзывы</a>
        <a class="header-block" onclick="modal()">Поступить</a>
        <a class="header-block <?= $current_page == 'login.php' ? 'active' : '' ?>" onclick="login()">Войти</a>
        
        <div class="social-network">
            <a target="_blank" href="https://telegram.org/"><img src="./template/default/img/icons8-telegram-app-48.png" class="l-img effect" alt=""></a>
            <a target="_blank" href="https://www.youtube.com/"><img src="./template/default/img/icons8-youtube-50.png" class="r-img effect" alt=""></a>
        </div>
    </div>
</header>
