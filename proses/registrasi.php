<?php
require '../core/koneksi.php';
    if( isset($_POST["register"]) ) {
        if(registrasi($_POST)> 0) {
            echo "<script>
                    alert('user baru berhasil di tambahkan!');
                  </script>";
        }  else{
            echo mysqli_errno($conn);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    
    <h1>Regis dulu lek</h1>

        <form action="" method="post">

        <ul>
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
            <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
            <label for="password2">Konfirmasi bener ga lek :</label>
                <input type="password" name="password2" id="password">
            </li>
            <li>
            <label for="email">email :</label>
                <input type="text" name="email" id="email">
            </li>
            <button type="submit" name="register">Regis sini</button>
        </ul>
        </form>
</body>
</html>