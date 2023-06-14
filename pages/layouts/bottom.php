<?php
if (isset($_SESSION['username'])) {
    // code tersebut memeriksa apakah variabel superglobal $_SESSION memiliki indeks ‘username’ atau tidak dengan menggunakan fungsi isset(). Fungsi ini mengembalikan true jika variabel yang diberikan ada dan tidak null atau false jika tidak. Variabel superglobal $_SESSION adalah sebuah array asosiatif yang berisi informasi sesi untuk pengguna saat ini. Sesi adalah cara untuk menyimpan data di server sementara pengguna berinteraksi dengan aplikasi web.


    echo '<script src="../js/profileDrop.js?v=5"></script>';
    // jika variabel $_SESSION memiliki indeks ‘username’, maka code tersebut akan menampilkan sebuah tag script HTML dengan menggunakan fungsi echo(). Fungsi ini akan mengirimkan output ke browser. Tag script HTML digunakan untuk menyisipkan kode JavaScript ke dalam dokumen HTML. Atribut src menentukan URL dari file JavaScript yang ingin dimuat. Atribut v menentukan versi dari file JavaScript yang ingin dimuat. Dengan menambahkan atribut v, code tersebut dapat mencegah browser dari menggunakan cache file JavaScript yang lama.
}
?>

<script src="../js/script.js?v=7"></script>
</body>

</html>