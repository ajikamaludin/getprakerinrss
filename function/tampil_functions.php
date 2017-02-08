<?php

function pilih_sekolah(){
    $sql = "SELECT id_sekolah,nama_sekolah,logo_sekolah FROM `sekolah`";
    $result = result($sql);
    return $result;
}

function tampil_post_by($email,$lim){
    $sql = "SELECT all_blog.judul_post,all_blog.tgl_post,all_blog.id_my_blog,all_blog.id_pengguna,pengguna.nama FROM `all_blog`,`pengguna` WHERE pengguna.email='$email' AND pengguna.id_pengguna=all_blog.id_pengguna ORDER BY `all_blog`.`tgl_post` DESC
 LIMIT $lim";
    $result = result($sql);
    return $result;
}

function tampil_nama($email){
    $sql = " SELECT nama FROM pengguna WHERE email='$email' ";
    $result = result($sql);
    $result = mysqli_fetch_assoc($result);
    $result = $result['nama'];
    return $result;
}

function tampil_profile($email){
    $sql = " SELECT pengguna.id_pengguna,pengguna.nama,pengguna.email,pengguna.password,pengguna.id_sekolah,pengguna.nisn,pengguna.alamat,pengguna.kota_lahir,pengguna.tgl_lahir,pengguna.masa_prakerin,pengguna.tgl_masuk,pengguna.tgl_keluar,pengguna.jurusan,pengguna.url_blog,pengguna.link_fb,pengguna.no_hp,pengguna.status,pengguna.foto_profile,sekolah.nama_sekolah FROM pengguna JOIN sekolah ON pengguna.id_sekolah=sekolah.id_sekolah WHERE email='$email' ";
    $result = result($sql);
    $result = mysqli_fetch_assoc($result);
    return $result;
}

function tampil_sekolah($email){
    $sql = " SELECT * FROM sekolah JOIN pengguna ON pengguna.id_sekolah=sekolah.id_sekolah WHERE pengguna.email='$email' ";
    $result = result($sql);
    $result = mysqli_fetch_assoc($result);
    return $result;
}

function tampil_foto(){
    $profiles = tampil_profile($_SESSION['user']);
    $foto = $profiles['foto_profile'];
    if ($foto == NULL) {
        return 'empty-profile.png';
    }else{
        return $foto;
    }
}

function tampil_logo(){
    $sekolah = tampil_sekolah($_SESSION['user']);
    $foto = $sekolah['logo_sekolah'];
    //die(print_r($foto));
    if ($foto == NULL) {
        return 'NULL';
    }else{
        return $foto;
    }
}

?>