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

function register_user($nisn,$nama,$asal_sekolah,$jurusan,$url_blog,$no_telp,$alamat,$tempat_lahir,$tgl_lahir,$masa_prakerin,$tgl_masuk,$tgl_keluar,$link_fb,$email,$password){
    global $link;
    $nisn = cek_string($nisn);
    $nama = cek_string($nama);
    $id_sekolah = cek_string($asal_sekolah);
    $jurusan = cek_string($jurusan);
    $url_blog = cek_string($url_blog);
    $no_telp = cek_string($no_telp);
    $alamat = cek_string($alamat);
    $tempat_lahir = cek_string($tempat_lahir);
    $tgl_lahir = cek_string($tgl_lahir);
    $masa_prakerin = cek_string($masa_prakerin);
    $tgl_masuk = cek_string($tgl_masuk);
    $tgl_keluar = cek_string($tgl_keluar);
    $link_fb = cek_string($link_fb);
    $email1 = cek_string($email);
    $password = cek_string($password);
    $password = md5($password);

    $sql = "INSERT INTO `pengguna` (`nama`, `email`, `password`, `id_sekolah`, `nisn`, `alamat`, `kota_lahir`, `tgl_lahir`, `masa_prakerin`, `tgl_masuk`, `tgl_keluar`, `jurusan`, `url_blog`, `link_fb`, `no_hp`, `status`) VALUES ('$nama', '$email1', '$password', '$id_sekolah', '$nisn', '$alamat', '$tempat_lahir', '$tgl_lahir', '$masa_prakerin', '$tgl_masuk', '$tgl_keluar', '$jurusan', '$url_blog', '$link_fb', '$no_telp', 'aktiv')";

    if(cek_email($email)){
        $register = run($sql);
        if($register){
            $id_user = mysqli_insert_id($link);
            $date = get_date_pengguna($email);
            $sync_blog = sync_blog($id_user,$url_blog,$date);
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