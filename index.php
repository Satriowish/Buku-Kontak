<!DOCTYPE html>
<html>
<head>
	<title>Form_kontak</title>
</head>
<body align="center" style="font-family: arial;">

	<h1>APLIKASI FORM KONTAK</h1>
	<table align="center" border="1">
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Telpon</th>
			<th>Email</th>
			<th>Aksi</th>
		</tr>
		<?php 
			require_once 'connection.php'; // Pastikan connection.php menggunakan sqlsrv
			$kontak = new kontak();
			$kontak->connect(); 
			$kontak->selectAllKontak();

			$dataKontak = $kontak->get_dataset();
			$no = 1;  // Mulai nomor dari 1

			for ($i = 0; $i < count($dataKontak); $i++) { 
		 ?>
		<tr>
			  <td align="center"><?php echo $no; ?></td>
		      <td>
		      	<a href="form_edit_kontak.php?idKontak=<?php echo $dataKontak[$i][0]; ?>"><?php echo $dataKontak[$i][1]; ?></a>
		      </td>
		      <td align="center"><?php echo $dataKontak[$i][2]; ?></td>
		      <td><?php echo $dataKontak[$i][3]; ?></td>
		      <td align="center">
		      	<a style="text-decoration:none;color:orange;" href="form_edit_kontak.php?idKontak=<?php echo $dataKontak[$i][0]; ?>"><b>Edit</b></a> | 
		        <a style="text-decoration:none;color:red;" href="proses/delete_kontak.php?idKontak=<?php echo $dataKontak[$i][0]; ?>"><b>Delete</b></a>
		      </td>
		</tr>
		<?php $no++; } ?>
	</table>
	<hr>
	<form action="proses/insert_kontak.php" method="post">
		<h2>FORM INPUT KONTAK</h2>
		<table align="center">
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" required=""></td>
			</tr>
			<tr>
				<td>Kontak</td>
				<td><input type="number" name="kontak" required=""></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" required=""></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<button type="submit" name="insert" 
					style="
					background-color: #123566;
					color: #fff;
					padding: 5px 15px;
					border: none;
					border-radius: 5px;
					">Kirim</button>
				</td>
			</tr>
		</table>
	</form>
	<nav>
	<p>&copy;Satrio - 2024</p
    <p>Created by : Satrio Wisnu Adi Pratama</p>
	</nav>
</body>
</html>
