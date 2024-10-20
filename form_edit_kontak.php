<!DOCTYPE html>
<html>
<head>
	<title>Edit Kontak</title>
</head>
<body align="center">
	<?php 
		require_once 'connection.php';  // Pastikan connection.php sudah disesuaikan

		// Mengambil ID kontak dari URL
		$id_kontak = $_GET['idKontak'];

		// Membuat objek kontak dan koneksi ke database
		$kontak = new kontak();
		$kontak->connect(); 
		$kontak->detailDataKontak($id_kontak);  // Mengambil data detail kontak

		// Mendapatkan dataset kontak
		$dataKontak = $kontak->get_dataset();
	 ?>
	<form action="proses/edit_kontak.php?idKontak=<?php echo $id_kontak; ?>" method="post">
		<h2>FORM EDIT KONTAK</h2>
		<table align="center">
			<tr>
				<th>Nama</th>
				<td><input type="text" name="nama" value="<?php echo $dataKontak[0][1];?>" required=""></td>
			</tr>
			<tr>
				<th>Kontak</th>
				<td><input type="number" name="kontak" value="<?php echo $dataKontak[0][2];?>" required=""></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><input type="email" name="email" value="<?php echo $dataKontak[0][3];?>" required=""></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<button type="submit" name="update">Ubah</button>
				</td>
			</tr>
		</table>
	</form>
	<nav>
    <p>&copy;Satrio - 2024</p>
    <p>Created by : Satrio Wisnu Adi Pratama</p>
</body>
</html>
