<?php

function sync_blog($id_user,$url_blog,$date){
    global $link;
    $url_blog = cek_urlblog($url_blog);
    $url = $url_blog.'/feeds/posts/default?max-results=300&published-min='.$date.'T00:00:00';
    $xml = simplexml_load_file($url);
    if($xml){
        $data = $xml->entry;
        foreach( $data as $blog ){
            $tgl_post = substr($blog->published,0,10);
            $judul_post = $blog->title;
            $judul_post = cek_string($judul_post);
            $isi_post = $blog->content;
            $isi_post = cek_string($isi_post);
            $url_post = $blog->link[4]['href'];
            if(cek_adapost($judul_post,$tgl_post,$id_user)){
                $sql = "INSERT INTO `all_blog` (`judul_post`, `tgl_post`, `konten_post`, `url_post`, `id_pengguna`) VALUES ('$judul_post', '$tgl_post', '$isi_post', '$url_post', '$id_user')";
                $exec = mysqli_query($link,$sql);
                $sync = true;
            }else{
                $sync = 'gagal';
            }
        }
        return $sync;
    }elseif($xml == false){
        return false;
    }else{
        return false;
    }
}

function resync_blog($email){
    $sql = "SELECT url_blog,id_pengguna,tgl_masuk FROM pengguna WHERE email='$email'";
    $data = result($sql);
    $data = mysqli_fetch_assoc($data);
    $id = $data['id_pengguna'];
    $url_blog = $data['url_blog'];
    $date = $data['tgl_masuk'];
    $date = cek_date($date);
    sync_blog($id,$url_blog,$date);
}

?>