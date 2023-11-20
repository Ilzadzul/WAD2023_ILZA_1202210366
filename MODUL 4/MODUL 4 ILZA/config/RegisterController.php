<?php

require 'connect.php';

// (1) Mulai session
session_start();

// (2) Ambil nilai input dari form registrasi
if (isset($_POST["SubmitformRegistrasi"]))
    if (($_POST["pass"]) == ($_POST["repass"])) {
    // a. Ambil nilai input email
    $email = $_POST["email"];
    // b. Ambil nilai input name
    $nama = $_POST["nama"];
    // c. Ambil nilai input username
    $username = $_POST["username"];
    // d. Ambil nilai input password
    $password = $_POST["password"];
    // e. Ubah nilai input password menjadi hash menggunakan fungsi password_hash()
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }
// (3) Buat dan lakukan query untuk mencari data dengan email yang sama dari nilai input email
    $query1 = "SELECT * FROM  users WHERE email = '$email'";
    $result = mysqli_query($db, $query1);
// (4) Buatlah perkondisian ketika tidak ada data email yang sama ( gunakan mysqli_num_rows == 0 )
    if(mysqli_num_rows($result) == 0) {
    // a. Buatlah query untuk melakukan insert data ke dalam database
        $query2 = "INSERT INTO users (email, nama, username, password) VALUES ('$email', '$nama', '$username', '$password')";
        $insert = mysqli_query($db, $query_2);
    // b. Buat lagi perkondisian atau percabangan ketika query insert berhasil dilakukan
    //    Buat di dalamnya variabel session dengan key message untuk menampilkan pesan penadftaran berhasil
    if($insert) {
        $_SESSION['message'] = 'Pendaftaran berhasil, silahkan login';
        $_SESSION['color'] = 'success';
        header('Location: ../login.php');
    }else{
        $_SESSION['message'] = 'Pendaftaran gagal';
    }
}
    else{
        $_SESSION['message'] = 'Username sudah terdarfar';
        header('Location: ../register.php');
    }
    ?>