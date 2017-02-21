<?php
function tampil_hits_issue(){
		$sql = "SELECT id_forum,id_pengguna,judul_issue,isi_issue,gambar_issue,waktu_issue,status_issue	FROM forum WHERE status_issue='hit' LIMIT 1";
	$result = result($sql);
	return $result;
}

function total_masalah(){
	$sql = "SELECT id_forum FROM forum";
	$result = result($sql);
	$jumlah = mysqli_num_rows($result);
	return $jumlah;
}


function tampil_forum($mulai,$perlaman){
	$sql = "SELECT id_forum,id_pengguna,judul_issue,isi_issue,gambar_issue,waktu_issue,status_issue	FROM forum  ORDER BY `forum`.`waktu_issue` DESC LIMIT $mulai,$perlaman";
	$result = result($sql);
	return $result;
}

function tampil_forum_by($id){
	$sql = "SELECT forum.id_forum,forum.id_pengguna,forum.judul_issue,forum.isi_issue,forum.gambar_issue,forum.waktu_issue,forum.status_issue,pengguna.foto_profile,pengguna.email FROM forum JOIN pengguna ON forum.id_pengguna=pengguna.id_pengguna WHERE id_forum = '$id'";
	$result = result($sql);
	$result = mysqli_fetch_assoc($result);
	return $result;
}

function tambah_issue($email,$judul,$isi,$gambar){

	$id = getid_pengguna($email);
	$judul = cek_string($judul);
	$isi = cek_string($isi);
	
	$gambar_nama = $gambar['name'];
	$gambar_ukuran = $gambar['size'];
	$gambar_format = $gambar['type'];
	$gambar_simpan = $gambar['tmp_name'];
	$gambar_error = $gambar['error'];
	$gambar_nama = substr($gambar_nama, 0,5).str_replace("image/", ".", $gambar_format);
	$lokasi_simpan_gambar = "asset/img/forum/".$gambar_nama;

	if($gambar_error == 0 && ($gambar_ukuran >= 0 || $gambar_ukuran < 2000000) ){
		if($gambar_format == 'image/jpeg' || $gambar_format == 'image/jpg' || $gambar_format == 'image/png' ){
			if(file_exists($lokasi_simpan_gambar)){
				$gambar_nama = cek_foto($gambar_nama,$gambar_format,$email);
				$lokasi_simpan_gambar = "asset/img/forum/".$gambar_nama;
				move_uploaded_file($gambar_simpan, $lokasi_simpan_gambar);
				$sql = "INSERT INTO `forum` (`id_pengguna`, `judul_issue`, `isi_issue`, `gambar_issue`, `status_issue`) VALUES ('$id', '$judul', '$isi', '$gambar_nama', 'issue')";
				return run($sql);
			}else{
				move_uploaded_file($gambar_simpan, $lokasi_simpan_gambar);
				$sql = "INSERT INTO `forum` (`id_pengguna`, `judul_issue`, `isi_issue`, `gambar_issue`, `status_issue`) VALUES ('$id', '$judul', '$isi', '$gambar_nama', 'issue')";
				return run($sql);
			}
		}else{
			return false;
		}			
	}else{
			$sql = "INSERT INTO `forum` (`id_pengguna`, `judul_issue`, `isi_issue`, `gambar_issue`, `status_issue`) VALUES ('$id', '$judul', '$isi', 'NULL', 'issue')";
			return run($sql);
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

function komentar_issue($id_forum,$email,$komentar,$gambar){
	$id_pengguna = getid_pengguna($email);
	$komentar = cek_string($komentar);
	
	$gambar_nama = $gambar['name'];
	$gambar_ukuran = $gambar['size'];
	$gambar_format = $gambar['type'];
	$gambar_simpan = $gambar['tmp_name'];
	$gambar_error = $gambar['error'];
	$gambar_nama = substr($gambar_nama, 0,5).str_replace("image/", ".", $gambar_format);
	$lokasi_simpan_gambar = "asset/img/forum/komentar/".$gambar_nama;
	if($gambar_error == 0 && ($gambar_ukuran >= 0 || $gambar_ukuran < 2000000) ){
		if($gambar_format == 'image/jpeg' || $gambar_format == 'image/jpg' || $gambar_format == 'image/png' ){
			if(file_exists($lokasi_simpan_gambar)){
				$gambar_nama = cek_foto($gambar_nama,$gambar_format,$email);
				$lokasi_simpan_gambar = "asset/img/forum/komentar/".$gambar_nama;
				move_uploaded_file($gambar_simpan, $lokasi_simpan_gambar);
				$sql = "INSERT INTO `forum_komentar` (`id_forum`, `id_pengguna`, `isi_komentar`, `gambar_komentar`) VALUES ('$id_forum', '$id_pengguna', '$komentar', '$gambar_nama');";
				return run($sql);
			}else{
				move_uploaded_file($gambar_simpan, $lokasi_simpan_gambar);
				$sql = "INSERT INTO `forum_komentar` (`id_forum`, `id_pengguna`, `isi_komentar`, `gambar_komentar`) VALUES ('$id_forum', '$id_pengguna', '$komentar', '$gambar_nama');";
				return run($sql);
			}
		}else{
			return false;
		}			
	}else{
			$sql = "INSERT INTO `forum_komentar` (`id_forum`, `id_pengguna`, `isi_komentar`, `gambar_komentar`) VALUES ('$id_forum', '$id_pengguna', '$komentar', 'NULL');";
			return run($sql);
	}
}

function tampil_komentar_by($id){
	$sql = "SELECT forum_komentar.id_komentar,forum_komentar.id_pengguna,forum_komentar.isi_komentar,forum_komentar.gambar_komentar,forum_komentar.waktu_komentar,pengguna.foto_profile,pengguna.email FROM forum_komentar JOIN pengguna ON pengguna.id_pengguna=forum_komentar.id_pengguna WHERE id_forum='$id' ORDER BY `forum_komentar`.`waktu_komentar` DESC";
	$result = result($sql);
	return $result;
}

function tampil_hasil_cari($cari){
	$cari = cek_string($cari);
	$sql = "SELECT *  FROM `forum` WHERE `isi_issue` LIKE '%$cari%' OR `judul_issue` LIKE '%$cari%' ORDER BY `waktu_issue` DESC";
	$result = result($sql);
	return $result;
}

function hapus_issue($id){
	$sql = "DELETE FROM forum WHERE id_forum = '$id'";
	$sql2 = "DELETE FROM forum_komentar WHERE id_forum = '$id'";
	if(run($sql)){
		return run($sql2);
	}else{
		return false;
	}
}

function ubah_issue($email,$judul,$isi,$gambar){

	$id = getid_pengguna($email);
	$judul = cek_string($judul);
	$isi = cek_string($isi);
	
	$gambar_nama = $gambar['name'];
	$gambar_ukuran = $gambar['size'];
	$gambar_format = $gambar['type'];
	$gambar_simpan = $gambar['tmp_name'];
	$gambar_error = $gambar['error'];
	$gambar_nama = substr($gambar_nama, 0,5).str_replace("image/", ".", $gambar_format);
	$lokasi_simpan_gambar = "asset/img/forum/".$gambar_nama;

	if($gambar_error == 0 && ($gambar_ukuran >= 0 || $gambar_ukuran < 2000000) ){
		if($gambar_format == 'image/jpeg' || $gambar_format == 'image/jpg' || $gambar_format == 'image/png' ){
			if(file_exists($lokasi_simpan_gambar)){
				$gambar_nama = cek_foto($gambar_nama,$gambar_format,$email);
				$lokasi_simpan_gambar = "asset/img/forum/".$gambar_nama;
				move_uploaded_file($gambar_simpan, $lokasi_simpan_gambar);
				$sql = "UPDATE `forum` SET `judul_issue` = '$judul', `isi_issue` = '$isi', `gambar_issue` = '$gambar_nama' WHERE id_pengguna = '$id'";
				return run($sql);
			}else{
				move_uploaded_file($gambar_simpan, $lokasi_simpan_gambar);
				$sql = "UPDATE `forum` SET `judul_issue` = '$judul', `isi_issue` = '$isi', `gambar_issue` = '$gambar_nama' WHERE id_pengguna = '$id'";
				return run($sql);
			}
		}else{
			return false;
		}			
	}else{
			$sql = "UPDATE `forum` SET `judul_issue` = '$judul',`isi_issue` = '$isi' WHERE id_pengguna = '$id'";
			return run($sql);
	}

}

function hapus_komentar($id){
	$sql = "DELETE FROM forum_komentar WHERE id_komentar = '$id'";
	if(run($sql)){
		return run($sql);
	}else{
		return false;
	}
}

?>