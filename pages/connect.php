<?php
$serverdb = "localhost";
$userdb = "root";
$passdb = "";
$namedb = "tugas_web_pro";
// code tersebut menentukan empat variabel yang berisi informasi untuk koneksi ke database MySQL, yaitu $serverdb yang berisi nama host (localhost), $userdb yang berisi nama pengguna (root), $passdb yang berisi kata sandi (kosong), dan $namedb yang berisi nama database (tugas_web_pro).


$conn = mysqli_connect($serverdb, $userdb, $passdb, $namedb);
// code tersebut membuat koneksi ke database dengan menggunakan fungsi mysqli_connect(), yang menerima empat parameter sesuai dengan variabel yang sudah ditentukan. Fungsi ini akan mengembalikan objek mysqli jika koneksi berhasil atau false jika gagal1. Objek mysqli ini disimpan di variabel $conn.


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// code tersebut memeriksa apakah koneksi berhasil atau tidak dengan menggunakan properti connect_error dari objek $conn. Properti ini akan berisi pesan error jika koneksi gagal atau null jika koneksi berhasil2. Jika properti ini tidak null, maka code tersebut akan menghentikan eksekusi dengan fungsi die() dan menampilkan pesan “Connection failed” beserta pesan errornya.

?>


