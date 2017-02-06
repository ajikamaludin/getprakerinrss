<?php

function result($query){
    global $link;
    $result = mysqli_query($link,$query);
    return $result;
}

function run($query){
    global $link;
    $result = mysqli_query($link,$query);
    if($result){
        return true;
    }else{
        return false;
    }
}

function input_data_profile($nisn,$nama,$email,$asal_sekolah,$alamat,$tempat_lahir,$tgl_lahir,$masa_prakerin,$tgl_masuk,$tgl_keluar,$jurusan,$url_blog,$link_fb,$no_hp,$valid){
    $nisn = cek_string($nisn);
    $nama = cek_string($nama);
    $email = cek_string($email);
    $asal_sekolah = cek_string($asal_sekolah);
    $url_blog = cek_urlblog($url_blog);
    $no_hp = cek_string(cek_nohp($no_hp));
    $alamat = cek_string($alamat);
    $tempat_lahir = cek_string($tempat_lahir);
    $tgl_lahir = cek_string($tgl_lahir);
    $masa_prakerin = cek_string($masa_prakerin);
    $tgl_masuk = cek_string($tgl_masuk);
    $tgl_keluar = cek_string($tgl_keluar);
    $jurusan = cek_string($jurusan);
    $link_fb = cek_string($link_fb);
    $sql_pengguna = "UPDATE `pengguna` SET `nama` = '$nama', `email` = '$email', `nisn` = '$nisn', `alamat` = '$alamat', `kota_lahir` = '$tempat_lahir', `tgl_lahir` = '$tgl_lahir', `masa_prakerin` = '$masa_prakerin', `tgl_masuk` = '$tgl_masuk', `tgl_keluar` = '$tgl_keluar', `jurusan` = '$jurusan', `url_blog` = '$url_blog', `link_fb` = '$link_fb', `no_hp` = '$no_hp' WHERE `pengguna`.`id_pengguna` = '$valid' ";
    if(run($sql_pengguna)){
        if(cek_sekolah($asal_sekolah)){
            $tahun_ini = date('Y');
            $sql_sekolah = "INSERT INTO `sekolah` (`nama_sekolah`,`thn_prakerin`) VALUES ('$asal_sekolah','$tahun_ini')";
            run($sql_sekolah);
            return true;
        }else{
            return true;
        }
    }else{
        return false;
    }
    
}

function drop_post($id_user){
    $sql = "DELETE FROM `all_blog` WHERE id_pengguna='$id_user'";
    $result = run($sql);
    return $result;
}

function drop_post_by($email){
    $id_user = getid_pengguna($email);
    $sql = "DELETE FROM `all_blog` WHERE id_pengguna='$id_user'";
    $result = run($sql);
    return $result;
}

function format_tgl($tgl){
    $tgl = date_create($tgl);
    $tgl = date_format($tgl,'m/d/Y');
    $tgl = $tgl;
    $tgl = new DateTime("$tgl");
    $tgl =  date_format($tgl, 'l, d-m-Y');
    return $tgl;
}

function simpan_foto_profile($nama,$email){
    $email = cek_string($email);
    $sql = "UPDATE `pengguna` SET `foto_profile` = '$nama' WHERE `pengguna`.`email` = '$email' ";
    $result = run($sql);
    return $result;
}

function simpan_foto_sekolah($nama,$email){
    $id = getid_sekolah($email);
    $email = cek_string($email);
    $sql = "UPDATE `sekolah` SET `logo_sekolah` = '$nama' WHERE `sekolah`.`id_sekolah` = '$id' ";
    $result = run($sql);
    return $result;
}

function update_data_sekolah($email,$asal_sekolah,$tahun_ajaran,$kurikulum,$tahun_prakerin){
    $email = cek_string($email);
    $id_sekolah = cek_string($asal_sekolah);
    $nama_pembimbing = cek_string($nama_pembimbing);
    $no_pembimbing = cek_string($no_pembimbing);
    $tahun_ajaran  = cek_string($tahun_ajaran);
    $kurikulum = cek_string($kurikulum);
    $tahun_prakerin = cek_string($tahun_prakerin);
    if(ganti_sekolah($email,$id_sekolah)){
        $sql = "UPDATE `sekolah` SET `tahun_ajaran` = '$tahun_ajaran', `kurikulum` = '$kurikulum', `thn_prakerin` = '$tahun_prakerin' WHERE `sekolah`.`id_sekolah` = '$id_sekolah'";
        $result = run($sql);
        return $result;
    }else{
        return false;
    }
}

function update_data_pembimbing($email,$nama_pembimbing,$no_pembimbing){
    $id_sekolah = getid_sekolah(cek_string($email));
    $nama_pembimbing = cek_string($nama_pembimbing);
    $no_pembimbing = cek_string($no_pembimbing);
    $sql = "UPDATE `sekolah` SET `nama_pembimbing`='$nama_pembimbing',`no_pembimbing`='$no_pembimbing' WHERE `sekolah`.`id_sekolah` = '$id_sekolah'";
    $result = run($sql);
        return $result;
}

function ganti_sekolah($email,$id){
    $email = cek_string($email);
    $sql = "UPDATE `pengguna` SET `id_sekolah` = '$id' WHERE `pengguna`.`email` = '$email'";
    $result = run($sql);
    return $result;
}

function potong_judul($judul){
    $panjang = strlen($judul);
    if($panjang > 70){
        $judul = substr($judul,0,70);
        return $judul.'...';
    }else{
        return $judul;
    }
}


?>