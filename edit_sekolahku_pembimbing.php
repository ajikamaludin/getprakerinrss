<?php
include 'view/header.php';
session_cek();

$sekolah = tampil_sekolah($_SESSION['user']);
$pesan = '';

if(isset($_POST['submit'])){
    if(cek_password($_SESSION['user'],$_POST['password'])){
        $email = $_SESSION['user'];
        $nama_pembimbing = trim($_POST['nama_pembimbing']);
        $no_pembimbing = trim($_POST['no_pembimbing']);
        $tahun_ajaran  = trim($_POST['tahun_ajaran']);
        $result = update_data_pembimbing($email,$nama_pembimbing,$no_pembimbing);
        if($result){
            header('Location: sekolahku.php');
        }else{
            $pesan = "terjadi kesalahan dalam penginputan data";
        }
    }else{
        $pesan = "password salah";
    }
}

?>


    <div class="row">

    <!--sidenav-->
<?php
include 'view/sidenav.php';
?>
    <!--main content-->
      <div class="col s12 m8 l9"> 
            <div class="row">
                <h4>Data Sekolah dan Pembimbing</h4>
            </div>

            <div class="row">
                <?= "<h3>".$pesan.'</h3>'?>
            </div>
            <div class="row">
                <form class="col s12" method="post" action="" >

                    <div class="row">
                        <div class="input-field col s12">
                        <input value="<?= $sekolah['nama_pembimbing'] ?>" name="nama_pembimbing" type="text" class="validate" required>
                        <label for="disabled">Nama Pembimbing</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                        <input value="<?= $sekolah['no_pembimbing'] ?>" name="no_pembimbing" type="text" class="validate" required>
                        <label for="disabled">No.Telp Pembimbing</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                        <input value="" name="password"  type="password" class="validate" required>
                        <label  >Confirm Password</label>
                        </div>
                    </div>
                    <div class="fixed-action-btn">
                            <button type="submit" name="submit" class="btn-floating btn-large red">
                                <i class="large material-icons">send</i>
                            </button>
                    </div>

                </form>

            </div>
      </div>


    </div>
<?php
    include 'view/footer.php';
?>