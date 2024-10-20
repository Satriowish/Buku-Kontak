<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../connection.php'; // Pastikan ini berisi konfigurasi koneksi yang benar

    // Konfigurasi database
    $serverName = "SATRIOWISNU\SQLEXPRESS";
    $connectionInfo = array("Database" => "form_kontak", "TrustServerCertificate" => true);

    // Koneksi ke database
    $db = sqlsrv_connect($serverName, $connectionInfo);
    if ($db === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Ambil data dari form
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $email = $_POST['email'];

    // Query untuk insert data
    $query = "INSERT INTO tb_kontak (nama, kontak, email) VALUES (?, ?, ?)";
    $params = array($nama, $kontak, $email);

    // Eksekusi query
    $stmt = sqlsrv_query($db, $query, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Tutup koneksi
    sqlsrv_close($db);

    // Setelah insert, arahkan kembali ke halaman index atau tampilkan pesan sukses
    header('Location: ../index.php');
    exit();
}
?>
