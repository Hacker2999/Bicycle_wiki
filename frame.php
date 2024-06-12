<?php
/* Запрос в БД */
$dbh = new PDO('mysql:dbname=j99952nx_aliboba;host=localhost', 'j99952nx_aliboba', 'ALIBOBa123');
$sth = $dbh->prepare("SELECT * FROM `Frame`");
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);
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
                <li><a class="usedlink" href="./frame.php">Рамы</a></li>
                <li><a href="./tire.php">Покрышки</a></li>
                <li><a href="./search.php">Поиск</a></li>
                <li><a href="./change_bike.php">Внос данных</a></li>
            </ul>
        </header>
        <div class="maincontent">

            <table>
                <thead>
                    <tr>

                        <th>Название</th>
                        <th>Назначение</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $row): ?>
                        <tr>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <?php echo $row['purpose']; ?>
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