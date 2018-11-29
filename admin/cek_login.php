<?php
	include "../include/koneksi.php";
	$login=mysqli_query($koneksi,"select * from admin where
	id_user='$_POST[username]' and password='$_POST[pass]'");

	$dapat=mysqli_num_rows($login);
	$r=mysqli_fetch_array($login);
	if($dapat > 0)
	{
		 session_start(); 
		
		
		 $_SESSION['namauser']=$r['id_user'];
		 $_SESSION['passuser']=$r['password'];
		 header('location:server.php?module=home');
	} 
else
{
	 print "<script>
	 alert(\"Periksa Pengisian Form\");
	 location.href = \"index.php\";
	 </script>";
}
?>