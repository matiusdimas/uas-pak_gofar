<?php
session_start();
include('../connect.php');


if (isset($_SESSION['username'])) {
    $iduser = $_SESSION['id'];
    $idrumah = $_POST['idRumah'];
    $sqldel = "DELETE from data_favorites where id_user = $iduser and id_data_perumahan = $idrumah";
    $conn->query($sqldel, MYSQLI_ASYNC);
    $conn->reap_async_query();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
