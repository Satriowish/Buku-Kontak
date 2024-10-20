<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Kontak</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/edit.css">
</head>
<body>
	<div class="container">
		<h2>Edit Kontak</h2>
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
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" id="nama" name="nama" value="<?php echo $dataKontak[0][1];?>" required>
			</div>
			<div class="form-group">
				<label for="kontak">Kontak</label>
				<input type="number" id="kontak" name="kontak" value="<?php echo $dataKontak[0][2];?>" required>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" id="email" name="email" value="<?php echo $dataKontak[0][3];?>" required>
			</div>
			<button type="submit" name="update">Ubah</button>
		</form>
	</div>
	<nav>
		<p>&copy; 2024 Satrio Wisnu Adi Pratama. All rights reserved.</p>
	</nav>
</body>
</html>
