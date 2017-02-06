<?php

function sync_blog($id_user,$url_blog){
    global $link;
    $url_blog = cek_urlblog($url_blog);
    $url = $url_blog.'/feeds/posts/default?max-results=300';
    $xml = simplexml_load_file($url);
    if($xml){
        $data = $xml->entry;
        foreach( $data as $blog ){
            $tgl_post = substr($blog->published,0,10);
            $judul_post = $blog->title;
            $judul_post = cek_string($judul_post);
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

function resync_blog($email){
    $sql = "SELECT url_blog,id_pengguna FROM pengguna WHERE email='$email'";
    $data = result($sql);
    $data = mysqli_fetch_assoc($data);
    $id = $data['id_pengguna'];
    $url_blog = $data['url_blog'];
    sync_blog($id,$url_blog);
}

?>