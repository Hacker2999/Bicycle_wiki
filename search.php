<?php
/* Запрос в БД */
$dbh = new PDO('mysql:dbname=j99952nx_aliboba;host=localhost', 'j99952nx_aliboba', 'ALIBOBa123');
$list = $dbh->query($sql);
if (isset($_POST['idq'])) {
    $temp = $_POST['idq'];
    $tmp = $_POST['selector'];
    $sth = $dbh->prepare("SELECT Bicycle.* FROM `Bicycle` JOIN `Frame` ON Bicycle.frame = Frame.name WHERE Bicycle.$tmp=:$tmp");
    $sth->bindParam(":$tmp", $temp);
    $sth->execute();
    $list = $sth->fetchAll(PDO::FETCH_ASSOC);


}
?>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
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
                <li><a href="./index.php">Велосипеды</a></li>
                <li><a href="./switchers.php">Переключатели</a></li>
                <li><a href="./frame.php">Рамы</a></li>
                <li><a href="./tire.php">Покрышки</a></li>
                <li><a class="usedlink" href="./search.php">Поиск</a></li>
                <li><a href="./change_bike.php">Внос данных</a></li>
            </ul>
        </header>
        <div class="maincontent">
            <form method="POST" action="#">
                <select method="POST" name="selector">
                    <option value="name">Название</option>
                    <option value="frame">Рама</option>
                    <option value="switcher">Переключатель</option>
                    <option value="tire">Покрышки</option>
                </select>
                <input type="text" name="idq" value="">
                <input type='submit' value='Найти'>
            </form>
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
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <?php echo $row['frame']; ?>
                            </td>
                            <td>
                                <?php echo $row['switcher']; ?>
                            </td>
                            <td>
                                <?php echo $row['tire']; ?>
                            </td>
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