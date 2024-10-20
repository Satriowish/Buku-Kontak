<?php
// Aktifkan error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Pastikan semua data yang diperlukan tersedia
if (!isset($_GET["idKontak"]) || !isset($_POST["nama"]) || !isset($_POST["kontak"]) || !isset($_POST["email"])) {
    die("Data tidak lengkap. Silakan kembali ke form edit.");
}

$id_kontak = $_GET["idKontak"];
$nama = $_POST["nama"];
$kontak = $_POST["kontak"];
$email = $_POST["email"];

require_once "../connection.php";
$edit_kontak = new kontak();
$edit_kontak->connect();

$edit_kontak->updateDataKontak($id_kontak, $nama, $kontak, $email);
$edit_kontak->close_connection();

// Gunakan exit setelah header untuk memastikan tidak ada output lain
header('Location: ../index.php');
exit();
?>
