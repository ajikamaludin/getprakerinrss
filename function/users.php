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

?>