<?php
include 'view/header.php';
session_cek();

$laporan = tampil_laporan($_SESSION['user']);
$pesan = '';

if(isset($_POST['submit'])){
        $email = $_SESSION['user'];
        $kata_pengantar = trim($_POST['kata_pengantar']);
        $result = update_data_laporan($email,$kata_pengantar);
        if($result){
            header('Location: laporan.php');
        }else{
            $pesan = "terjadi kesalahan dalam penginputan data";
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
                <h4>Ubah Data Laporan</h4>
            </div>

            <div class="row">
                <?= "<h3>".$pesan.'</h3>'?>
            </div>
            <div class="row">
                <form class="col s12" method="post" action="" >

                    <div class="row">
                        <div class="input-field col s12">
                        <textarea name="kata_pengantar" class="materialize-textarea" ><?= $laporan['kata_pengantar'] ?></textarea>
                            <label for="disabled">Kata Pengantar</label>
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