<?php
include 'view/header.php';
session_cek();

$sekolah = tampil_sekolah($_SESSION['user']);
$pesan = '';

if(isset($_POST['submit'])){
    if(cek_password($_SESSION['user'],$_POST['password'])){
        $email = $_SESSION['user'];
        $asal_sekolah = trim($_POST['asal_sekolah']);
        $alamat_sekolah = trim($_POST['alamat_sekolah']);
        $tahun_ajaran  = trim($_POST['tahun_ajaran']);
        $kurikulum = trim($_POST['kurikulum']);
        $tahun_prakerin = trim($_POST['tahun_prakerin']);
        $result = update_data_sekolah($email,$asal_sekolah,$alamat_sekolah,$tahun_ajaran,$kurikulum,$tahun_prakerin);
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
                        <select name="asal_sekolah">
                            <option name="asal_sekolah" value="<?= $sekolah['id_sekolah'];?>"> <?= $sekolah['nama_sekolah'];?> </option>
                            <?php
                                $data = pilih_sekolah();
                                while( $all_sekolah = mysqli_fetch_assoc($data) ):
                            ?>
                                <option name="asal_sekolah" value="<?= $all_sekolah['id_sekolah'];?>"> <?= $all_sekolah['nama_sekolah'];?> </option>
                            <?php
                                endwhile;
                            ?>
                        </select>
                    <label>Sekolah</label>
                    </div>
                </div>
            <div class="row">
                <div class="input-field col s12">
                <textarea  class="materialize-textarea" name="alamat_sekolah"><?= $sekolah['alamat_sekolah'] ?></textarea>
                <label for="textarea1">Alamat Sekolah</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="<?= $sekolah['tahun_ajaran'] ?>" name="tahun_ajaran" type="text" class="validate" required>
                <label for="disabled">Tahun Pelajaran</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="kurikulum">
                            <option name="kurikulum" value="<?= $sekolah['kurikulum'] ?>"> <?= $sekolah['kurikulum'] ?> </option>
                            <option name="kurikulum" value="K13/KTSP"> K13/KTSP </option>
                            <option name="kurikulum" value="K13"> K13 </option>
                            <option name="kurikulum" value="KTSP"> KTSP </option>
                        </select>
                <label for="disabled">Kurikulum</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="<?= $sekolah['thn_prakerin'] ?>" name="tahun_prakerin" type="text" class="validate" required>
                <label for="disabled">Tahun Prakerin</label>
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