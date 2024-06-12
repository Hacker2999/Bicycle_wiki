<?php
/* Все варианты сортировки */
$sort_list = array(
	'name_asc'   => '`name`',
	'name_desc'  => '`name` DESC',
	'frame_asc'  => '`frame`',
	'frame_desc' => '`frame` DESC',
	'switcher_asc'   => '`switcher`',
	'switcher_desc'  => '`switcher` DESC',
	'tire_asc'   => '`tire`',
	'tire_desc'  => '`tire` DESC',
);
 
/* Проверка GET-переменной */
$sort = @$_GET['sort'];
if (array_key_exists($sort, $sort_list)) {
	$sort_sql = $sort_list[$sort];
} else {
	$sort_sql = reset($sort_list);
}
 
/* Запрос в БД */
$dbh = new PDO('mysql:dbname=j99952nx_aliboba;host=localhost', 'j99952nx_aliboba', 'ALIBOBa123');
$sth = $dbh->prepare("SELECT * FROM `Bicycle` ORDER BY {$sort_sql}");
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);
 
/* Функция вывода ссылок */
function sort_link_th($title, $a, $b) {
	$sort = @$_GET['sort'];
 
	if ($sort == $a) {
		return '<a class="active" href="?sort=' . $b . '">' . $title . ' <i>▲</i></a>';
	} elseif ($sort == $b) {
		return '<a class="active" href="?sort=' . $a . '">' . $title . ' <i>▼</i></a>';  
	} else {
		return '<a href="?sort=' . $a . '">' . $title . '</a>';  
	}
}
?>

<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style.css" type="text/css" rel="stylesheet" media="all">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Главная</title>
    <link rel="icon" href="./Media/logo1.png" type="image/x-icon">
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="logo">
                <img src="./Media/logo1.png" alt="#">
            </div>
            <ul>
                <li><a class="usedlink" href="./index.php">Велосипеды</a></li>
                <li><a href="./switchers.php">Переключатели</a></li>
                <li><a href="./frame.php">Рамы</a></li>
                <li><a href="./tire.php">Покрышки</a></li>
                <li><a href="./search.php">Поиск</a></li>
                <li><a href="./change_bike.php">Внос данных</a></li>
            </ul>
        </header>
        <div class="maincontent">
    <form action="" method="get">
                <div class="select-sort">
                    <select name="sort" id="js-sort">
                        <option value="name_asc" <?php if (@$_GET['sort'] == 'name_asc')
                            echo 'selected'; ?>>Название(A-Z) </option>
                            <option value="name_desc" <?php if (@$_GET['sort'] == 'name_desc')
                            echo 'selected'; ?>>Название(Z-A)</option>
                        <option value="frame_asc" <?php if (@$_GET['sort'] == 'frame_asc')
                            echo 'selected'; ?>>Рамы(A-Z)</option>
                        <option value="frame_desc" <?php if (@$_GET['sort'] == 'frame_desc')
                            echo 'selected'; ?>>Рамы(Z-A)</option>
                        <option value="switcher_asc" <?php if (@$_GET['sort'] == 'switcher_asc')
                            echo 'selected'; ?>>Переключатели(A-Z)</option>
                        <option value="switcher_desc" <?php if (@$_GET['sort'] == 'switcher_desc')
                            echo 'selected'; ?>>Переключатели(Z-A)</option>
                        <option value="tire_asc" <?php if (@$_GET['sort'] == 'tire_asc')
                            echo 'selected'; ?>>Покрышки(A-Z)</option>
                        <option value="tire_desc" <?php if (@$_GET['sort'] == 'tire_desc')
                            echo 'selected'; ?>>Покрышки(Z-A)</option>
                    </select>
                </div>
            </form>
        <script>
                $('#js-sort').change(function () {
                    $(this).closest('form').submit();
                });
        </script>
        <table>
	<thead>
		<tr>
			
                        <th>Название</th>
                        <th>Рама</th>
                        <th>Переключатель</th>
                        <th>Покрышки</th>
                    
		</tr>
	</thead>
	<tbody>
		<?php foreach ($list as $row): ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['frame']; ?></td>
			<td><?php echo $row['switcher']; ?></td>
			<td><?php echo $row['tire']; ?></td>
		</tr>
		<?php endforeach; ?>    
	</tbody>
</table>
        </div>
        
        <footer>
            <p>Выполнил Писаренко Артём</p>
            <P>32928/2</P>
        </footer>
    </div>
</body>

</html>