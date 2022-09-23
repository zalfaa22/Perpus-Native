<?php 
include 'koneksi.php';
$nama_buku = $_POST['nama_buku'];
$deskripsi = $_POST['deskripsi'];
$pengarang = $_POST['pengarang'];
$ekstensi =  array('png','jpg','jpeg','gif','JPG');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("location:tambah_buku.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx =$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'foto/'.''.$filename);
		mysqli_query($conn, "INSERT INTO buku VALUES(NULL,'$nama_buku','$deskripsi','$pengarang','$xx')");
		echo "<script>alert('Sukses menambahkan buku');location.href='tambah_buku.php';</script>";
	}else{
		echo "<script>alert('File melebihi kapasitas yang ditentukan');location.href='tambah_buku.php';</script>";
	}
}
?>