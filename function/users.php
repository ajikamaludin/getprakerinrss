<?php

function cek_pengguna($email,$password){
    $email = cek_string($email);
    $password = cek_string($password);
    $password = md5($password);

    $sql = "SELECT email, password,status FROM `pengguna` WHERE email='$email' AND password='$password'";
    $result = result($sql);
    if(mysqli_num_rows($result) != 0){
        $status = mysqli_fetch_assoc($result);
        $status = $status['status'];
        if($status == 'selesai'){
            return 'selesai';
        }elseif($status == 'keluar'){
            return 'keluar';
        }else{
            return true;
        }
    }else{
          return false;
    }
}

function register_user($nama,$asal_sekolah,$jurusan,$url_blog,$email,$password){
    global $link;
    $nama = cek_string($nama);
    $id_sekolah = cek_string($asal_sekolah);
    $jurusan = cek_string($jurusan);
    $url_blog = cek_string(cek_urlblog($url_blog));
    $email = cek_string($email);
    $password = cek_string($password);
    $password = md5($password);
    $sql = "INSERT INTO `pengguna` (`nama`,`email`,`password`,`id_sekolah`,`jurusan`,`url_blog`,`status`) VALUES ('$nama', '$email', '$password', '$id_sekolah','$jurusan','$url_blog','aktiv')";
    if(cek_email($email)){
        $register = run($sql);
        if($register){
            $id_user = mysqli_insert_id($link);
            $sync_blog = sync_blog($id_user,$url_blog);
            if($sync_blog){
                return 'true';
            }else{
                return 'gagal';
            }
        }else{
            return 'false';
        }
    }else{
        return 'ada';
    }

}

function cek_email($email){
    $sql = "SELECT email FROM `pengguna` WHERE email='$email'";
    $result = result($sql);
    if(mysqli_num_rows($result) != 0){
        return false;
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

function ubah_password($email,$password){
    $password = md5($password);
    $email = cek_string($email);
    $sql = "UPDATE `pengguna` SET `password` = '$password' WHERE `pengguna`.`email` = '$email' ";
    $result = run($sql);
    if($result){
        return true;
    }else{
        return false;
    }
}


?>