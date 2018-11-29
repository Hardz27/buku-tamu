<?php
include "../include/koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];

	//delete data dalam database
if ($module=='user' AND $act=='hapus') {
	mysqli_query($koneksi,"delete from admin where id_user='$_GET[id]'");
	header('location:server.php?module=user&act=view');
}
	//bagian user
	//input user
elseif ($module=='user' AND $act=='input'){
	$id_login=$_POST['id_user'];
	$id=mysqli_query($koneksi, "select * from admin where id_user='$id_login'");
	$r=mysqli_fetch_array($id);
	$cek=$r['id_user'];
	if($id_login = $cek) {
		echo "<script>alert(\"user dengan nama $id_login sudah
		terdaftar, Silahkan Cek Kembali!!!\");
		location.href = \"server.php?module=user&act=tambahuser\";
	</script>";
}
elseif(empty($_POST['id_user'])){
	echo "<script>alert(\"username tidak boleh kosong!!!\");
	location.href = \"javascript:history.go(-1)\";</script>";
}
elseif(empty($_POST['password'])){
	echo "<script>alert(\"password tidak boleh kosong!!!\");
	location.href = \"javascript:history.go(-1)\";</script>";
}
else{
	$pass=$_POST['password'];
	$id_login = $_POST['id_user'];
	mysqli_query($koneksi, "insert into
		admin(id_user,password)values('$id_login','$pass')");
	echo "<script>alert(\"user dengan nama $id_login sudah
		terdaftar, Silahkan Cek Kembali!!!\");
		location.href = \"server.php?module=home\";
	</script>";
	header('location:server.php?module='.$module.'&act=view');
}
}
	//update user
elseif ($module=='user' and $act=='update') {
	if(empty($_POST['id_user'])){
		print "<script>alert(\"username tidak boleh kosong!!!\");
		location.href = \"javascript:history.go(-1)\";</script>";
	}
	else{
	//apabila password tidak dirubah
		if (empty($_POST[password])) {
			mysqli_query($koneksi, "update admin set id_user='$_POST[id_user]'
				where id_user='$_POST[id]'");
		}
	//apabila password dirubah
		else{
			$pass=$_POST[password];
			mysqli_query($koneksi, "update admin set id_user='$_POST[id_user]',
				password='$pass' where id_user='$_POST[id]'");
		}
		header('location:server.php?module=user&act=view');
	}
}

elseif($module=='bukutamu' and $act=='input'){
	mysqli_query($koneksi, "INSERT INTO bukutamu VALUES ('', '$_POST[tgl_bktamu]', '$_POST[status_bktamu]', '$_POST[nama_bktamu]', '$_POST[email_bktamu]', '$_POST[alamat_bktamu]', '$_POST[komentar]') ");
	print "<script>alert(\"Komentar anda sudah masuk, terimakasih ^_^ \");
		location.href = \"server.php?module=bukutamu&act=\";</script>";
}

elseif($module=='bukutamu' and $act=='view'){
	mysqli_query($koneksi, "SELECT * FROM bukutamu order by id_bktamu");
	
}

// Bagian Upload file
elseif ($module=='galeri' and $act=='input') {
  $lokasi_file = $_FILES['image']['tmp_name'];
  $tipe_file   = $_FILES['image']['type'];
  $nama_file   = $_FILES['image']['name'];
  $date = $_POST['date'];
  $keterangan = $_POST['keterangan'];
  $direktori   = "modul/images/$nama_file";
  // end of code B
   
  if (!empty($lokasi_file)) {
    move_uploaded_file($lokasi_file,$direktori); 
   
    // code C
    $sql = "INSERT INTO galeri VALUES (null,'$keterangan','$date','$nama_file')";
    $aksi = mysqli_query($koneksi,$sql);
    // end of code C
     
    // code D
    if (!$aksi) {
    echo "maaf gagal memasukan gambar";
    }else{
        
    }
    // end of code D
     
  }else{
    echo "terjadi kesalahan";  
  }
}

?>