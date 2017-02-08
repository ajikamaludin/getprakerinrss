<?php
include 'view/header.php';

session_cek();
$sekolah = tampil_sekolah($_SESSION['user']);
$logo = tampil_logo();
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
        </div>
        <div class="row">
            <div class="col s2">
                    <img src="./asset/img/sekolah/<?= $logo ?>" alt="" class="">
            </div>
            <form class="col s10">
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $sekolah['nama_sekolah'] ?>" name="nama_sekolah" id="disabled" type="text" class="validate">
                <label for="disabled">Nama Sekolah</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $sekolah['thn_prakerin'] ?>" name="tahun_prakerin" id="disabled" type="text" class="validate">
                <label for="disabled">Tahun Prakerin</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $sekolah['nama_pembimbing'] ?>" name="nama_pembimbing" id="disabled" type="text" class="validate">
                <label for="disabled">Nama Pembimbing</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $sekolah['no_pembimbing'] ?>" name="no_pembimbing" id="disabled" type="text" class="validate">
                <label for="disabled">No.Telp Pembimbing</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $sekolah['tahun_ajaran'] ?>" name="tahun_ajaran" id="disabled" type="text" class="validate">
                <label for="disabled">Tahun Pelajaran</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $sekolah['kurikulum'] ?>" name="kurikulum" id="disabled" type="text" class="validate">
                <label for="disabled">Kurikulum</label>
                </div>
            </div>     
        </form>
              <div class="fixed-action-btn">
                    <a href="./edit_sekolahku_sekolah.php" class="btn-floating btn-large red">
                        <i class="large material-icons">mode_edit</i>
                    </a>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <a href="foto_sekolahku.php" class="btn waves-effect waves-light" type="submit" name="action">Logo Sekolah
                    <i class="material-icons right">send</i>
                </a>
                <a href="edit_sekolahku_sekolah.php" class="btn waves-effect waves-light" type="submit" name="action">Sekolah
                    <i class="material-icons right">send</i>
                </a>
                <a href="edit_sekolahku_pembimbing.php" class="btn waves-effect waves-light" type="submit" name="action">Pembimbing
                    <i class="material-icons right">send</i>
                </a>
            </div>
        </div>
      </div>


    </div>
<?php
include 'view/footer.php';
?>