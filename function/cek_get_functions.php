<?php

function cek_sekolah($sekolah){
    $sql = "SELECT nama_sekolah FROM sekolah WHERE nama_sekolah='$sekolah' ";
    $result = result($sql);
    $result = mysqli_num_rows($result);
    if($result != 0){
        return false;
    }else{
        return true;
    }
}

function cek_urlblog($url){
    $cek1 = substr($url,0,3);
    if($cek1 == 'htt'){
        return $url;
    }else{
        $url_new = 'http://'.$url;
        return $url_new;
    }
}

function cek_nohp($no_hp){
    $cek = substr($no_hp,0,3);
    if($cek == '+62'){
        return $no_hp;
    }else{
        $no_hp_new = '+62'.$no_hp;
        return $no_hp_new;
    }
}

function cek_adapost($judul,$tgl_post,$id_user){
    $sql = "SELECT judul_post,tgl_post,id_pengguna FROM `all_blog` WHERE judul_post='$judul' AND tgl_post='$tgl_post' AND id_pengguna='$id_user' ";
    $result = result($sql);
    $result = mysqli_num_rows($result);
    if($result != 0){
        return false;
    }elseif(!$result){
        return true;
    }else{
        return true;
    }
}

function getid_pengguna($email){
    $sql = " SELECT id_pengguna FROM pengguna WHERE email = '$email'";
    $result = result($sql);
    $result = mysqli_fetch_assoc($result);
    $id = $result['id_pengguna'];
    if(!$id){
        die();
    }else{
        return $id;
    }
}

function cek_string($data){
    global $link;
    $data = mysqli_real_escape_string($link,$data);
    return $data;
}

function session_cek(){
    if(!$_SESSION['user']){
    header('Location: login.php');
    }
}

function cek_foto($nama,$ekstensi,$email){
    $acak = time();
    $ekstensi = str_replace('image/','.', $ekstensi);
    $nama_foto = str_replace($ekstensi, "", $nama);
    $nama_foto = $nama_foto.'_'.$acak.'_'.$email.$ekstensi;
    return $nama_foto;
}

function getid_sekolah($email){
    $sql = " SELECT id_sekolah FROM pengguna WHERE email = '$email'";
    $result = result($sql);
    $result = mysqli_fetch_assoc($result);
    $id = $result['id_sekolah'];
    if(!$id){
        die();
    }else{
        return $id;
    }
}

?>