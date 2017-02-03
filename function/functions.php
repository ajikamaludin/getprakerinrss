<?php

function pilih_sekolah(){
    $sql = "SELECT nama_sekolah FROM `sekolah`";
    $result = result($sql);
    return $result;
    //return mysqli_fetch_assoc($result);
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