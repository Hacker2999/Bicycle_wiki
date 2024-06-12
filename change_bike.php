<?php
$conn = new mysqli("localhost", "j99952nx_aliboba", "ALIBOBa123", "j99952nx_aliboba");
$dbh = new PDO('mysql:dbname=j99952nx_aliboba;host=localhost', 'j99952nx_aliboba', 'ALIBOBa123');
if (isset($_POST['sub'])) {
    $name = $_POST['name'];
    $frame = $_POST['frame'];
    $switcher = $_POST['switcher'];
    $tire = $_POST['tire'];
    $send = "INSERT INTO Bicycle (name, frame, switcher, tire) VALUES ('$name','$frame','$switcher','$tire')";
    $result = mysqli_query($conn, $send);
}
if (isset($_POST["id"])) {
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    $userid = $conn->real_escape_string($_POST["id"]);
    $sql = "DELETE FROM Bicycle WHERE id = '$userid'";
    if ($conn->query($sql)) {

        header("Location: change_bike.php");
    } else {
        echo "Ошибка: " . $conn->error;
    }
}
$list = mysqli_query($conn, "SELECT * FROM Bicycle");
mysqli_close($conn);
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
                <li><a href="./index.php">Главная</a></li>
                <li><a class="usedlink" href="./change_bike.php">Велосипеды</a></li>
                <li><a href="./change_frame.php">Рамы</a></li>
                <li><a href="./change_switchers.php">Переключатели</a></li>
                <li><a href="./change_tire.php">Покрышки</a></li>
            </ul>
        </header>
        <div>Редактирование таблицы "Велосипеды"</div>
        <div class="maincontentr">
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
                            <td align='center' valign='center'>
                                <form action='#' method='POST'>
                                    <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                    <input type='submit' value='Удалить'>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form method="POST" action="#">
                name <input type="text" name="name"><br><br>
                frame <select name="frame">
                    <?php
                    $sql = "SELECT name FROM Frame";
                    $result = $dbh->query($sql)->fetchAll(PDO::FETCH_COLUMN);

                    foreach ($result as $value) {
                        echo "<option value='$value'>$value</option>";
                    }
                    ?>
                </select><br><br>
                switcher <select name="switcher">
                    <?php
                    $sql = "SELECT name FROM Switchers";
                    $result = $dbh->query($sql)->fetchAll(PDO::FETCH_COLUMN);

                    foreach ($result as $value) {
                        echo "<option value='$value'>$value</option>";
                    }
                    ?>
                </select><br><br>
                tire
                <select name="tire">
                    <?php
                    $sql = "SELECT name FROM Tire";
                    $result = $dbh->query($sql)->fetchAll(PDO::FETCH_COLUMN);

                    foreach ($result as $value) {
                        echo "<option value='$value'>$value</option>";
                    }
                    ?>
                </select><br><br>
                <input name="sub" type="submit" value="Создать">
            </form>
        </div>

        <footer>
            <p>ООО "Моя мать шлюха"</p>
            <P>2023г.</P>
        </footer>
    </div>
</body>

</html>