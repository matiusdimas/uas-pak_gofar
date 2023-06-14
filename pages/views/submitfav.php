<?php
session_start();
include('../connect.php');


if (isset($_SESSION['username'])) {
    if (isset($_POST['submit'])) {
        $iduser = $_SESSION['id'];
        $idRumahInsert = $_POST['idRumah'];
        $sqlInsert = "INSERT INTO data_favorites (id_user, id_data_perumahan) VALUES ($iduser, $idRumahInsert)";
        $resultInsert = mysqli_query($conn, $sqlInsert);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
        // code header tersebut bertujuan untuk mengarahkan pengguna kembali ke halaman sebelumnya dan menghentikan eksekusi kode selanjutnya.
    }
}
