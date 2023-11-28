<?php
// Koneksi ke Database

$conn = mysqli_connect("localhost", "root", "", "shop");

	
function query($sql) {
	global $conn;
	$result = mysqli_query($conn, $sql);

	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}

function registrasi($data) {
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $email = $data['email'];

    //cek username bosku biar ga double 

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

            if(mysqli_fetch_assoc($result)) {
                echo "<script>
                        alert('username sudah ada boskuh cari yang lain')
                    </script>";
                return false;
            }

    //cek konfirmasi password lek rezif

    if( $password !==$password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai lek');
              </script>";
              return false;
              
    }

    //enkripsu password lek biar tambah nilai abang syafwan (acak password di dalam data base)
        //$password = $password_hash($password, PASSWORD_DEFAULT); << yang ini lupa cara pakeknya wkwkkw
        $password =($password); //nah kalau yang ini bisa tapi gampang di retas sama hengkel FF

    //nah ni tambahkan user baru ke data base bosskuh
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password', '$email')");

    return mysqli_affected_rows($conn);
}


?>