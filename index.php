<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kontak Bullworth</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<div class="container">
		<h1>Kontak Bullworth</h1>
		
		<table style="table-layout: auto; width: 100%;">
			<thead>
				<tr>
					<th style="width: 5%;">No.</th>
					<th style="width: auto; min-width: 200px;">Nama</th>
					<th style="width: 15%;">Telpon</th>
					<th style="width: 25%;">Email</th>
					<th style="width: 15%;">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				require_once 'connection.php';
				$kontak = new kontak();
				$kontak->connect(); 
				$kontak->selectAllKontak();

				$dataKontak = $kontak->get_dataset();
				$no = 1;

				foreach ($dataKontak as $data) { 
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td style="white-space: normal; overflow: visible; text-overflow: clip; word-wrap: break-word;"><a href="form_edit_kontak.php?idKontak=<?php echo $data[0]; ?>"><?php echo $data[1]; ?></a></td>
					<td title="<?php echo htmlspecialchars($data[2]); ?>"><?php echo $data[2]; ?></td>
					<td title="<?php echo htmlspecialchars($data[3]); ?>"><?php echo $data[3]; ?></td>
					<td class="action-column">
						<a href="form_edit_kontak.php?idKontak=<?php echo $data[0]; ?>" class="btn btn-edit">Edit</a>
						<a href="proses/delete_kontak.php?idKontak=<?php echo $data[0]; ?>" class="btn btn-delete">Hapus</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<form action="proses/insert_kontak.php" method="post">
			<h2>Tambah Kontak Baru</h2>
			<input type="text" name="nama" placeholder="Nama" required>
			<input type="number" name="kontak" placeholder="Nomor Telepon" required>
			<input type="email" name="email" placeholder="Email" required>
			<button type="submit" name="insert">Tambah Kontak</button>
		</form>
	</div>

	<footer>
		<p>&copy; 2024 Satrio Wisnu Adi Pratama. All rights reserved.</p>
	</footer>
</body>
</html>
