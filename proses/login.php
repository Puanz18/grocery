<?php
require '../core/koneksi.php';

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($result) === 1) {

        //cek password 
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
          header("Location: index.php");
          exit;
        }
    }
    
    $eror = true
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