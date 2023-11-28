<?php
session_start();

function connectDB() {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "shop";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Fungsi untuk melakukan login
function login($username, $password) {
    $conn = connectDB();

    // Hindari SQL Injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Enkripsi password dengan MD5
    //$password = md5($password);

    // Tentukan tabel login berdasarkan username
    $tables = ["user"];

    foreach ($tables as $table) {
        $query = "SELECT * FROM $table WHERE username='$username' AND password='$password'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            // Login berhasil
            $_SESSION['user'] = $username;
            $_SESSION['userType'] = $table;
            switch ($table) {
                case 'user':
                    header("Location: index.php?username=".$username);
                    break;
                default:
                    // Tambahkan penanganan kesalahan jika diperlukan
                    break;
            }
            exit();
        }
    }

    // Jika tidak ada kesesuaian, login gagal
    echo "Login failed. Check your username and password.";

    $conn->close();
}


if ( isset($_POST['login']) ) {
    $username = $_POST["username"];
    $password = $_POST["password"];


    login($username, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login boss</title>
</head>
<body>
    <h1> Halaman Login Bosku</h1>
    <form action="" method="post">
        <ul>
            <li>
            <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
            <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <button type="submit" name="login">GASS</button>
        </ul>
    </form>
</body>
</html>