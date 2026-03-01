<? 
    $a = 52;
    $g = "52";
    var_dump($a, $g);
?>
<br>
<br>
<? 
    echo 2024 % 7;
?>
<br>
<br>
<? 
    $a = "adsd a sda sd";       
    echo ucfirst($a);
?>
<br>
<br>
<? 
    $name = 232;
    echo "Привет, " . $name;
?>
<br>
<br>
<? 
    $name =  "123";
    $name1 =  "25.5";
    $name = (int)$name;
    $name1 = (double)$name1;
    echo $name1 + $name;
    var_dump($name, $name1);
?>
<br>
<br>
<? 
    $colors = ['red', 'green', 'blue'];
    $colors[] = '32';
    var_dump($colors);
?>
<br>
<br>
<? 
    $y = 14;
    if ($y >= 18) {
        echo 'Ты совершенно летний';
    } else {
        echo 'Ты лох';
    }
?>
<br>
<br>
<? 
    $hasCar = true;
    $hasLicense = true;
    if ($hasCar == true && $hasLicense == true) {
        echo 'Ты можешь ездить по дорогам';
    } else {
        echo 'Ты не можешь';
    }
?>
<br>
<br>
<? 
    $y = 18;
    echo ($y >= 18) ? 'Ты совершенно летний' : 'Ты не можешь';
?>
<br>
<br>
<? 
    for ($i = 1; $i < 21; $i++) {
        echo ($i % 2 == 0) ? $i . '<br>' : '';
    }
?>
<br>
<? 
    $a = 'Hello, World!';
    echo strlen($a);
?>
<br>
<br>
<? 
    $a = 4.75;
    echo ceil($a);
    echo floor($a);
?>
<br>
<br>
<? 
    $nums = [12, 5, 8, 21, 3];
    echo count($nums) . '<br>';
    echo array_sum($nums);
?>
<br>
<br>
<?  
    greet('Михаил');
    function greet($name) {
        echo "Привет $name !";
    }
?>
<form accept="" method="GET">
    <input name="name">
    <button type="submit"></button>
</form>
<? 
    if (!empty($_GET['name'])) {
        echo $_GET['name'];
    }
?>
<br>
<br>
<? 
    $user = '';
    $user1 = '';
    echo (isset($user)) ? 'Существует $user' . '<br>' : 'Ну существует $user';
    echo (!empty($user)) ? 'Не пустая $user' : '$user пустая';
?>
<br>
<br>
<? 
    $isRaining = true;
    $isSunny = !$isRaining;
    echo $isRaining . '<br>';
    echo $isSunny;
?>
<br>
<br>
<? 
    $a = 1;
    $b = '1';
    echo ($a == $b) ? 'Они равны' : 'Они не равны';
?>
<br>
<br>
<? 
    $student = ['name' => 'Иван', 'surname' => 'Петров', 'grade' => 5];
    echo $student['surname'];
?>
<br>
<br>
<?  
    $f = false;
    $numbers = [3, 7, 9, 2, 5];
    foreach ($numbers as $i) {
        if($i > 8) {
            $f = true;
            break;
        }
    }
    echo $f;
?>
<br>
<br>
<?  
    for ($i = 1; $i < 11; $i++) {
        if ($i % 2 == 0) {
            continue;
        }
        echo $i . '<br>';
    }
?>
<br>
<br>
<?  
    $name = ['Веном', 'Я'];
    $email = ['Веном@gmail.com', 'Я@gmail.com'];
    $a = [$name, $email];
    echo $a[1][1];
?>
<br>
<br>
<?  
    $name = 'The quick brown fox jumps over the lazy dog';
    echo strpos($name, 'fox');
?>
<br>
<br>
<?  
    $a = random_int(1, 100);
    echo round(sqrt($a), 2);
?>
<br>
<br>
<?  
    function makeCoffee($type = 'эспрессо') {
        echo "Готовлю $type";
    }
    makeCoffee();
    makeCoffee('латте');
?>
<br>
<br>
<?  
    $fruits = ["banana", "apple", "cherry"];
    sort($fruits);
    print_r($fruits);
?>
<br>
<br>
<?  
    function getSum($arr) {
        $b = 0;
        foreach ($arr as $i) {
            $b += $i;
        }
        echo $b;
    }
    $a = [3, 4, 5, 1];
    getSum($a);
?>
<br>
<br>
<form method="POST">
    <input name="comment">
    <button type="submit"></button>
</form>
<?  
    if (!empty($_POST['comment'])) {
        echo htmlspecialchars($_POST['comment']);
    }
?>
<br>
<br>
<?  
    $color = 'белый';
    echo (isset($color)) ? $color : 'черный';
?>
<br>
<br>
<?  
    $a = 5;
    $b = 10;
    if ($a > $b) {
        echo $a;
    } else {
        echo ($b > $a) ? $b : 'числа равны';
    }
?>
<br>
<br>
<?  
    $name = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'site';
    $link = mysqli_connect($name, $user, $password, $db) or die;
    $a = mysqli_query($link, 'SELECT * FROM news');
    $b = mysqli_fetch_all($a, MYSQLI_ASSOC);
    print_r($b);
?>
<br>
<br>
<?  
    $name = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'site';
    $link = mysqli_connect($name, $user, $password, $db) or die;
    $a = mysqli_query($link, 'SELECT * FROM news');
    $b = [];
    while ($f = mysqli_fetch_assoc($a)) {
        $b[] = $f;
    }
?>
<pre><? var_dump($b) ?></pre>
<br>
<br>
<?  
    $name = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'site';
    $link = mysqli_connect($name, $user, $password, $db) or die;
    $a = 'Веном';
    //mysqli_query($link, "INSERT INTO `news`(`title`, `description_news`, `cropped_description_index`) VALUES ('value-1','value-2','value-3')");
?>
<br>
<br>
<?  
    function divide($a, $b) {
        if ($b == 0) { return 'На 0 делить нельзя'; }
        $res = $a / $b;
        return $res;
    } 
    echo divide(8, 4);
?>
<br>
<br>
<?  
    echo pow(5, 3) . '<br>';
    echo abs(-15);
?>
<br>
<br>
<?  
    $a = 'apple,banana,grape';
    $b = explode(',', $a);
    print_r($b);
    echo '<br>' . implode('|', $b);
?>
<br>
<br>
<?  
    $a = [1, 2];
    $b = [3, 4];
    print_r(array_merge($a, $b))
?>
<br>
<br>
<?  
    $bread = ['title' => 'Хлеб', 'price' => 30];
    $orange = ['title' => 'Апельсин', 'price' => 40];
    $product = [$bread, $orange];
    foreach ($product as $i) {
        echo $i['title'] . ' ' . $i['price'];
        echo '<br>';
    }
?>
<br>
<br>
<?  
    function getAdults(&$users) {
        foreach ($users[1] as $i => $f) {
            if ($f < 18) {
                unset($users[0][$i]);
                unset($users[1][$i]);
            }
        }
        $users[0] = array_values($users[0]);
        $users[1] = array_values($users[1]);
    }

    $name = ['Ваня', 'Миша'];
    $age = ['21', '17'];
    $users = [$name, $age];
    getAdults($users);
    print_r($users);
?>
<br>
<br>
<?  
    while (true) {
        $a = random_int(1, 10);
        echo $a . '<br>';
        if ($a == 7) {
            break;
        }
    }
?>
<br>
<br>
<?  
    $passwords = ['123', 'qwerty', 'admin', 'pass'];
    foreach ($passwords as $i) {
        $b = strlen($i);
        if ($b < 4) {
            echo 'Есть пароль который короче 4-х символов';
        }
    }
?>
<br>
<br>
<?  
    function cleanAndUpper($str) {
        $str = trim($str);
        return mb_strtoupper($str);
    }

    echo cleanAndUpper(' привет ')
?>
<br>
<br>
<?  
    $cart = [];
    $item = 'мышь';
    $cart[] = $item;
    print_r($cart)
?>
<br>
<br>
<form method="POST">
    <input name="email">
    <button type="submit"></button>
</form>
<?  
    if (!empty($_POST['email'])) {
        $res = $_POST['email'];

        $name = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'site';
        $link = mysqli_connect($name, $user, $password, $db) or die;

        mysqli_query($link, "INSERT INTO `news`(`title`, `description_news`, `cropped_description_index`) VALUES ('$res', '$res', '$res')");
    }
?>
<br>
<br>