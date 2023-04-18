<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Nie udało się połączyć z bazą danych: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="">
        <label for="username">Login:</label>
        <input type="text" id="username" name="username">
        <br>
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password">
        <br>
        <input type="submit" value="Zaloguj" name="submit">

        <?php
        if (isset($_POST['submit'])) {
            $sql = "SELECT * FROM users WHERE username='" . $_POST['username'] . "' AND password='" . $_POST['password'] . "'";
            if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {
                echo "tak";
            } else {
                echo "nie";
            }
        }
        ?>
    </form>
</body>

</html>