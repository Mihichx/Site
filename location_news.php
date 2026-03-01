<?
    $id_res = mysqli_query($link, "SELECT COUNT(id) AS cnt FROM `news` WHERE 1");
    $row_count = mysqli_fetch_assoc($id_res);
    $count_id = $row_count['cnt'];

    $norm_count = 6;
    $page = isset($_GET['p']) ? (int)$_GET['p'] : 1; 
    if ($page < 1) $page = 1;

    $pageCount = ceil($count_id / $norm_count);
    $limit = 'LIMIT ' . (($page - 1) * $norm_count) . ',' . $norm_count;
    $pageList = '';

    for ($i = 1; $i <= $pageCount; $i++) {
        $pageLink = ($page == $i) ? 
            '<b>' . $i .'</b> ' :
            '<a style="color: #c4c4c4;" href="/news.php?p='. $i .'">' . $i .'</a> ';
        $pageList .= $pageLink;
    }

    $pagerView = 'Страницы: ' . $pageList . ' Всего элементов: ' . $count_id;

    $query = "SELECT * FROM `news` WHERE 1 ORDER BY id DESC " . $limit; 
    $res = mysqli_query($link, $query) or die(mysqli_error($link));

    $list = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $list[] = $row;
    }
?>
