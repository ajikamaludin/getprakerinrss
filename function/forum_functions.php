<?php
function tampil_hits_issue(){
		$sql = "SELECT id_forum,id_pengguna,judul_issue,isi_issue,gambar_issue,waktu_issue,status_issue	FROM forum WHERE status_issue='hit' LIMIT 1";
	$result = result($sql);
	return $result;
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
			$notif = kirim_notifikasi($id_forum,$id_pengguna);
			if($notif){
				return run($sql);	
			}else{
				return false;
			}
			
	}
}

function tampil_komentar_by($id,$mulai,$limit){
	$sql = "SELECT forum_komentar.id_komentar,forum_komentar.id_pengguna,forum_komentar.isi_komentar,forum_komentar.gambar_komentar,forum_komentar.waktu_komentar,pengguna.foto_profile,pengguna.email FROM forum_komentar JOIN pengguna ON pengguna.id_pengguna=forum_komentar.id_pengguna WHERE id_forum='$id' ORDER BY `forum_komentar`.`waktu_komentar` DESC LIMIT $mulai,$limit";
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

function total_masalah(){
	$sql = "SELECT id_forum FROM forum";
	$result = result($sql);
	$jumlah = mysqli_num_rows($result);
	return $jumlah;
}

function total_komentar($id){
	$sql = "SELECT id_forum FROM forum_komentar WHERE id_forum='$id'";
	$result = result($sql);
	$jumlah = mysqli_num_rows($result);
	return $jumlah;
}

function kirim_notifikasi($id_forum,$id_pengguna){
	$notif_ke_id = getid_pengguna_forum($id_forum);
	$judul_issue = get_judul_issue($id_forum);
	$pelaku = format_pengguna($id_pengguna);

	if($notif_ke_id == $id_pengguna){
		return true;
	}else{
		$url = ACCESS_FROM."/forum_detail.php?id=".$id_forum;

		$isi_notif = $pelaku." Mengomentari Issue Anda Tentang \"$judul_issue\" ";

		$sql = "INSERT INTO `forum_notifikasi` (`id_pengguna`, `isi_notif`, `url_notif`, `status_notif`) VALUES ('$notif_ke_id', '$isi_notif', '$url', 'belum_dibaca')";
		$result = run($sql);
		return $result;
	}
}

function getid_pengguna_forum($id_forum){
	$sql = "SELECT id_pengguna FROM forum WHERE id_forum = '$id_forum'";
	$result = result($sql);
	$data = mysqli_fetch_assoc($result);
	$id = $data['id_pengguna'];
	return $id;
}

function get_judul_issue($id_forum){
	$sql = "SELECT judul_issue FROM forum WHERE id_forum = '$id_forum'";
	$result = result($sql);
	$data = mysqli_fetch_assoc($result);
	$judul = $data['judul_issue'];
	return $judul;
}

function tampilkan_notif($email){
	$id = getid_pengguna($email);

	$sql = "SELECT id_notifikasi,isi_notif,url_notif,status_notif,waktu_notif FROM forum_notifikasi WHERE id_pengguna='$id' ORDER BY `forum_notifikasi`.`waktu_notif` DESC";
	$result = result($sql);
	return $result;
}

function total_notif_unread($email){
	$id = getid_pengguna($email);
	$sql = "SELECT id_notifikasi FROM forum_notifikasi WHERE id_pengguna='$id' AND status_notif='belum_dibaca' ";
	$result = result($sql);
	$total = mysqli_num_rows($result);
	return $total;
}
function baca_notif($email){
	$id = getid_pengguna($email);
	$sql = "UPDATE `forum_notifikasi` SET `status_notif`= 'dibaca' WHERE id_pengguna='$id'";
	$result = run($sql);
	return $result;
}

function hapus_notif($email){
	$id = getid_pengguna($email);
	$sql = "DELETE FROM `forum_notifikasi` WHERE `forum_notifikasi`.`id_pengguna` = '$id' ";
	$result = run($sql);
	return $result;
}

function baca_notif_id($id_notif){
	$id = $id_notif;
	$sql = "UPDATE `forum_notifikasi` SET `status_notif`= 'dibaca' WHERE id_notifikasi='$id'";
	$result = run($sql);
	return $result;
}

?>