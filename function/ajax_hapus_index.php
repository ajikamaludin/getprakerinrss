<?php

include 'db.php';
include 'functions.php';

$aksi = $_POST['aksi'];
if($aksi == 'hapus'){
	$id_pengguna = $_POST['id_pengguna'];
	$id_post = $_POST['id_post'];
	$data = hapus_post_by($id_pengguna,$id_post);
	echo $data;
}else{
	echo 'gagal';
}
?>