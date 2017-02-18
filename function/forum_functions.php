<?php

function tampil_forum(){
	$sql = "SELECT id_forum,id_pengguna,judul_issue,isi_issue,gambar_issue,waktu_issue,status_issue	FROM forum LIMIT 10";
	$result = result($sql);
	return $result;
}

function tampil_forum_by($id){
	$sql = "SELECT forum.id_forum,forum.id_pengguna,forum.judul_issue,forum.isi_issue,forum.gambar_issue,forum.waktu_issue,forum.status_issue,pengguna.foto_profile FROM forum JOIN pengguna ON forum.id_pengguna=pengguna.id_pengguna WHERE id_forum = '$id'";
	$result = result($sql);
	$result = mysqli_fetch_assoc($result);
	return $result;
}

function tambah_issue($email,$judul,$isi,$gambar){
	$id = getid_pengguna($email);
	$isi = cek_string($isi);
	$judul = cek_string($judul);

	$simpan_gambar = tambah_issue_simpan_gambar($gambar);

	$sql = "INSERT INTO `forum` (`id_pengguna`, `judul_issue`, `isi_issue`, `gambar_issue`, `status_issue`) VALUES ('$id', '$judul', '$isi', '$simpan_gambar', 'issue')";
	$result = run($sql);
	return $result;

}

function tambah_issue_simpan_gambar($gambar){

	$gambar_nama = $gambar['name'];
	$gambar_nama = substr($gambar_nama, 0,5);
	$gambar_ukuran = $gambar['size'];
	$gambar_format = $gambar['type'];
	$gambar_simpan = $gambar['tmp_name'];
	$gambar_error = $gambar['error'];
	$lokasi_simpan_gambar = "asset/img/forum/".$gambar_nama;
	
	if($gambar_ukuran <= 0 || $gambar_ukuran > 2000000){
		return 'NULL';
	}else{
		move_uploaded_file($gambar_simpan, $lokasi_simpan_gambar);
		return $gambar_nama;
	}
}

function format_pengguna($id){
	$sql = "SELECT nama,jurusan FROM pengguna WHERE id_pengguna = '$id'";
	$result = result($sql);
	$result = mysqli_fetch_assoc($result);
	$nama = $result['nama'];
	$jurusan = $result['jurusan'];
	return $nama.' ('.$jurusan.')';
}
?>