<?php
function pilih_sekolah(){
    $sql = "SELECT nama_sekolah FROM `sekolah`";
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
    $sql = " SELECT * FROM pengguna WHERE email='$email' ";
    $result = result($sql);
    $result = mysqli_fetch_assoc($result);
    return $result;
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
                $sync = 'true';
            }else{
                $sync = 'false';
            }
        }
        //bikin logika untuk hasil akhir foreach
        if($sync){
            return true;
        }else{
            return false;
        }
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
    }else{
        return true;
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