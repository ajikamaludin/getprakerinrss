<?php
function pilih_sekolah(){
    $sql = "SELECT nama_sekolah FROM `sekolah`";
    $result = result($sql);
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
    $url = $url_blog.'/feeds/posts/default?max-results=300';
    $xml = simplexml_load_file($url);
    $data = $xml->entry;
    foreach( $data as $blog ){
	    $tgl_post = substr($blog->published,0,10);
	    $judul_post = $blog->title;
	    $isi_post = $blog->content;
	    $isi_post = mysqli_real_escape_string($koneksi,$isi_post);
        //cek ketersediaan
	    if(cek_adapost($judul,$tgl_post,$id_user)){
	    	//$sql = "INSERT INTO `post` (`judul_post`, `konten_post`, `tgl_post`) VALUES ('$judul', '$kontent2', '$pub')";
	    	$exec = mysqli_query($koneksi,$sql);
	    	if($exec){
	    		echo "sukses <br>";
	    	}else{
	    		echo "gagal <br>";
	    	}
	    }else{
	    	echo "post sudah ada <br>";
    	}
    }
}

function cek_adapos($judul,$tgl_post,$id_user){
    $sql = "SELECT judul_post,tgl_post,id_pengguna FROM `all_blog` WHERE judul_post='$judul' AND tgl_post='$tgl_post' AND id_pengguna='$id_user' ";
    $result = mysqli_num_rows(result($sql));
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