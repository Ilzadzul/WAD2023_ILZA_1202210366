<!-- File ini berisi koneksi dengan database MySQL -->
<?php 

// (1) Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$connect = mysqli_connect("localhost:3308", "root","", "modul4_ilza");
    
// (2) Buatlah perkondisian untuk menampilkan pesan error ketika database gagal terkoneksi
    if(!$connect){
    die("<p>Belum Connect!!! </p>" . mysqli_connect_error());
}
?>