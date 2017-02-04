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

function register_user($nama,$asal_sekolah,$url_blog,$email,$password){
    global $link;
    $nama = cek_string($nama);
    $asal_sekolah = cek_string($asal_sekolah);
    $url_blog = cek_string(cek_urlblog($url_blog));
    $email = cek_string($email);
    $password = cek_string($password);
    $password = md5($password);
    $sql = "INSERT INTO `pengguna` (`nama`,`email`,`password`,`asl_sklh`,`url_blog`,`status`) VALUES ('$nama', '$email', '$password', '$asal_sekolah','$url_blog','aktiv')";
    if(cek_email($email)){
        $register = run($sql);
        if($register){
            $id_user = mysqli_insert_id($link);
            $sync_blog = sync_blog($id_user,$url_blog);
            if($sync_blog){
                return true;
            }else{
                $result = drop_post($id_user);
                if($result){
                    return 'fsync_blog';
                }
            }
        }else{
            return false;
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

?>