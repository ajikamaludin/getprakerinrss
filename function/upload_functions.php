<?php

function upload_foto($file,$email,$dir){
    //die(var_dump($file));
    $nama_foto = $file['name'];
    $ukuran_foto = $file['size'];
    $format_foto = $file['type'];
    $tmp_foto = $file['tmp_name'];
    $error_foto = $file['error'];
    $simpan = "asset/img/".$dir.'/'.$nama_foto;

    if( $error_foto == 0 ){
        if($ukuran_foto < 1024000){
            if($format_foto == 'image/jpeg' || $format_foto == 'image/jpg' || $format_foto == 'image/png' ){
                if(file_exists($simpan)){
                    $nama_foto = cek_foto($nama_foto,$format_foto,$email);
                    $simpan = "asset/img/".$dir.'/'.$nama_foto;
                    if($dir == 'profile'){
                        if(simpan_foto_profile($nama_foto,$email)){
                            move_uploaded_file($tmp_foto, $simpan);
                            return true; 
                        }else{
                            die();
                        }
                    }elseif($dir == 'sekolah'){
                        if(simpan_foto_sekolah($nama_foto,$email)){
                            move_uploaded_file($tmp_foto, $simpan);
                            return true; 
                        }else{
                            die();
                        }
                    }else{
                        die();
                    }
                }else{
                    $nama_foto = cek_foto($nama_foto,$format_foto,$email);
                    $simpan = "asset/img/".$dir.'/'.$nama_foto;
                    if($dir == 'profile'){
                        if(simpan_foto_profile($nama_foto,$email)){
                            move_uploaded_file($tmp_foto, $simpan);
                            return true; 
                        }
                    }elseif($dir == 'sekolah'){
                        if(simpan_foto_sekolah($nama_foto,$email)){
                            move_uploaded_file($tmp_foto, $simpan);
                            return true; 
                        }
                    }else{
                        die();
                    }
                }
            }else{
                return false;//format salah
            }

        }else{
            return false;//ukuran salah
        }
    }else{
        return false;//ada error
    }

}

?>