<?php
$conn = new mysqli("localhost", "j99952nx_aliboba", "ALIBOBa123", "j99952nx_aliboba");
if (isset($_POST['sub'])) {
    $name = $_POST['name'];
    $purpose = $_POST['purpose'];
    $send = "INSERT INTO Frame (name, purpose) VALUES ('$name','$purpose')";
    $result = mysqli_query($conn, $send);
}
if (isset($_POST["id"])) {
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    $userid = $conn->real_escape_string($_POST["id"]);
    $sql = "DELETE FROM Frame WHERE id = '$userid'";
    if ($conn->query($sql)) {

        header("Location: change_frame.php");
    } else {
        echo "Ошибка: " . $conn->error;
    }
}
$list = mysqli_query($conn, "SELECT * FROM Frame");
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
                <li><a href="./change_bike.php">Велосипеды</a></li>
                <li><a class="usedlink" href="./change_frame.php">Рамы</a></li>
                <li><a href="./change_switchers.php">Переключатели</a></li>
                <li><a href="./change_tire.php">Покрышки</a></li>
            </ul>
        </header>
        <div>Редактирование таблицы "Рамы"</div>
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
                purpose <input type="text" name="purpose"><br><br>
                <input name="sub" type="submit" value="Создать">
            </form>
        </div>

        <footer>
            <p>Выполнил Писаренко Артём</p>
            <P>32928/2</P>
        </footer>
    </div>
</body>

</html>