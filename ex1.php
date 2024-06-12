<?php
$dbh = new PDO('mysql:dbname=j99952nx_aliboba;host=localhost', 'j99952nx_aliboba', 'ALIBOBa123');
$sth = $dbh->prepare("SELECT * FROM `Bicycle`");
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);

?>

<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style.css" type="text/css" rel="stylesheet" media="all">
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
            </ul>
        </header>
        <div class="maincontent">
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