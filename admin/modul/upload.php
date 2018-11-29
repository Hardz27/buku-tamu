<?php
// Connect to Database
$host = mysqli_connect("localhost", "root", "", "coba_db");

$id=$_POST['id'];
$nama=$_POST['nm_galeri'];

if(isset($_POST['simpan'])){
    if(!isset($_FILES['image'])){
        echo 'Pilih file gambar';
    }
    else
    {
 $image   = addslashes(file_get_contents($_FILES['image']['tmp_name']));
     $image_name = addslashes($_FILES['image']['name']);
        $image_size = getimagesize($_FILES['image']['tmp_name']);
    if($image_size == false){
   echo"<script>alert('Isi data yang sesuai dan jangan dikosongkan!');history.go(-1);</script>";
   // header('Location: index.php');


        }
        else
        {
          if(!$insert = mysqli_query($host, "INSERT INTO galeri(id_galeri, nm_galeri, gambar) VALUES('$id', '$nama', '$image') "))
            {
                mysqli_query($host, "UPDATE galeri SET nm_galeri=$nama gambar=$image WHERE id_galeri='$id'");
                echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
                header('Location: index.php');
     }

            else
            {
        // Informasi berhasil dan kembali ke inputan
  echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
  header('Location: index.php');

     }

     }
    }
}

?>