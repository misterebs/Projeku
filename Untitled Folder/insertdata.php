<?php 
include_once('config.php');

// terima data dari halaman index.php
$id_ktp 	= mysql_real_escape_string($_POST['id_ktp']);
$namalengkap 	= mysql_real_escape_string($_POST['namalengkap']);
$alamat		= mysql_real_escape_string($_POST['alamat']);
$jeniskelamin	= mysql_real_escape_string($_POST['jeniskelamin']);
$agama		= mysql_real_escape_string($_POST['agama']);
$domisili	= mysql_real_escape_string($_POST['domisili']);
$role		= 'member'; // variabel untuk settingan default level yang mendaftar

// simpan data ke database
$query = mysql_query("insert into inputdata values('', '$id_ktp', '$namalengkap' $alamat', '$jeniskelamin', '$agama', '$domisili', '$role')");

if ($query) {
	// jika berhasil menyimpan
	header('location: index.php?msg=success');
} else {
	// jika gagal menyimpan
	header('location: index.php?msg=failed');
}
?>