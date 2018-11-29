<?php 
$tanggal = date("d-m-Y");
?>
<!DOCTYPE html>  
<html>
<head>
	<title></title>
	<script type="text/javascript" src="../tinymce/tinymce/tiny_mce.js">
		
	</script>
	<script type="text/javascript">
		tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		 
		});
	</script>
	<style type="text/css">
		th{
			background-color: #D3D3D3;
		}
		.tamu{
			padding-left: 5px;
		}


	</style>
</head>
<body>
	<?php 
	include "../include/koneksi.php";
	switch($_GET['act']){
	//tampil user
	default:

	echo "<div id=\"container\">
		<h2>Buku Tamu</h2>
		<hr>
		<form method=post action='?module=bukutamu&act=view'>
			<input type=submit value='Lihat Komentar'>
		</form>
		<p>Silahkan isi buku tamu di bawah ini untuk meninggalkan pesan Anda!</p>
		<form action=\"aksi.php?module=bukutamu&act=input\" method=\"post\">
			<p><b>Status/Pekerjaan :</b><br><input type=\"text\" name=\"status_bktamu\" placeholder=\"Ketik status anda\" required /></p>
			<p><b>Nama :</b><br><input type=\"text\" name=\"nama_bktamu\" placeholder=\"Ketik nama anda\" required /></p>
			<p><b>Email :</b><br><input type=\"text\" name=\"email_bktamu\" placeholder=\"Ketik email anda\" required /></p>
			<p><b>Alamat :</b><br><input type=\"text\" name=\"alamat_bktamu\" placeholder=\"Ketik alamat anda\" required /></p>
			<p><b>Tanggal : </b></p><input type=\"text\" name=\"tgl_bktamu\" value='$tanggal' />
			<p><b>Komentar :</b><br><textarea name=\"komentar\"></textarea></p>
			<p><input type=\"submit\" name=\"go\" value=\"Kirim\" /> <input type=\"reset\" name=\"del\" value=\"Hapus\" /></p>
		</form>
	</div>";
	break;

	case "view":
	echo " <div id=\"container\">
	<table cellpadding=\"10px\" border=\"1px\" style=\"border-collapse: collapse;\" >
		   <tr>
			<th>Tanggal</th><th>Status/Pekerjaan</th><th>Nama</th><th>Email</th><th>Alamat</th><th>Komentar</th>
		</tr>";
		$tampil=mysqli_query($koneksi, "SELECT * FROM bukutamu ORDER BY id_bktmu");
		$no=1;
		while ($r=mysqli_fetch_array($tampil)) {
			echo "<tr>
					<td class='tamu'>$r[tgl]</td>
					<td class='tamu'>$r[status]</td>
					<td class='tamu'>$r[nama]</td>
					<td class='tamu'>$r[email]</td>
					<td class='tamu'>$r[alamat]</td>
					<td class='tamu'>$r[pesan]</td>
				  </tr>";
			$no++;
		}
		echo "</table></div>";
		break;
}
?>
<table cellpadding="10px"></table>
</body>
</html>




















