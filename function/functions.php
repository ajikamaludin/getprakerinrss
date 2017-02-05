<?php
function pilih_sekolah(){
    $sql = "SELECT id_sekolah,nama_sekolah FROM `sekolah`";
    $result = result($sql);
    return $result;
}

function tampil_post_by($email){
    $sql = "SELECT all_blog.judul_post,all_blog.tgl_post,pengguna.nama FROM `all_blog`,`pengguna` WHERE pengguna.email='$email' AND pengguna.id_pengguna=all_blog.id_pengguna LIMIT 7";
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

function sync_blog($id_user,$url_blog){
    global $link;
    $url = $url_blog.'/feeds/posts/default?max-results=300';
    $xml = simplexml_load_file($url);
    if($xml){
        $data = $xml->entry;
        foreach( $data as $blog ){
            $tgl_post = substr($blog->published,0,10);
            $judul_post = $blog->title;
            $isi_post = $blog->content;
            $isi_post = mysqli_real_escape_string($link,$isi_post);
            if(cek_adapost($judul_post,$tgl_post,$id_user)){
                $sql ="INSERT INTO `all_blog` (`judul_post`, `tgl_post`, `konten_post`, `id_pengguna`) VALUES ('$judul_post', '$tgl_post', '$isi_post', '$id_user')";
                $exec = mysqli_query($link,$sql);
                $sync = true;
            }else{
                $sync = false;
            }
        }
        return true;
    }elseif($xml == false){
        return false;
    }else{
        return false;
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

function cek_password($email,$password){
    $password = md5($password);
    $sql = "SELECT email,password FROM pengguna WHERE email='$email' AND password='$password' ";
    $result = result($sql);
    $result = mysqli_num_rows($result);
    if($result != 0){
        return true;
    }else{
        return false;
    }
}

function drop_post($id_user){
    $sql = "DELETE * FROM `all_blog` WHERE id_pengguna='$id_user'";
    $result = run($sql);
    return $result;
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



?>