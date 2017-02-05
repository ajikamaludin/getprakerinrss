<?php
include 'view/header.php';
session_cek();
$profiles = tampil_profile($_SESSION['user']);
?>


    <div class="row">

    <!--sidenav-->
<?php
include 'view/sidenav.php';
?>
    <!--main content-->
      <div class="col s12 m8 l9"> 
      <h4>Bio Data</h4>
        <div class="row">
            <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $profiles['nisn'] ?>" name="nisn" id="disabled" type="text" class="validate">
                <label for="disabled">NISN</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $profiles['nama'] ?>" name="nama" id="disabled" type="text" class="validate">
                <label for="disabled">Nama</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $profiles['email'] ?>" name="email" id="disabled" type="text" class="validate">
                <label for="disabled">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="password" name="password" id="disabled" type="password" class="validate">
                <label for="disabled">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $profiles['jurusan'] ?>" name="jurusan" id="disabled" type="text" class="validate">
                <label for="disabled">Jurusan</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $profiles['asl_sklh'] ?>" name="asal_sekolah" id="disabled" type="text" class="validate">
                <label for="disabled">Sekolah</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $profiles['no_hp'] ?>" name="no_hp" id="disabled" type="number" class="validate">
                <label for="disabled">No.Telp</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $profiles['url_blog'] ?>" name="url_blog" id="disabled" type="text" class="validate">
                <label for="disabled">URL Blog</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <textarea disabled id="disabled" class="materialize-textarea" name="alamat"><?= $profiles['alamat'] ?></textarea>
                <label for="textarea1">Alamat</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $profiles['kota_lahir'] ?>" name="tempat_lahir" id="disabled" type="text" class="validate">
                <label for="disabled">Tempat Lahir</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $profiles['tgl_lahir'] ?>" name="tanggal_lahir" id="disabled" type="text" class="validate">
                <label for="disabled">Tanggal Lahir</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $profiles['masa_prakerin'] ?>" name="masa_prakerin" id="disabled" type="text" class="validate">
                <label for="disabled">Masa Prakerin</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                <input disabled value="<?= $profiles['tgl_masuk'] ?>" name="tanggal_masuk" id="disabled" type="text" class="validate">
                <label for="disabled">Tanggal Masuk</label>
                </div>
                <div class="input-field col s6">
                <input disabled value="<?= $profiles['tgl_keluar'] ?>" name="tanggal_keluar" id="disabled" type="text" class="validate">
                <label for="disabled">Tanggal Keluar</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="<?= $profiles['link_fb'] ?>" name="link_fb" id="disabled" type="text" class="validate">
                <label for="disabled">Facebook</label>
                </div>
            </div>
            </form>
              <div class="fixed-action-btn">
                    <a href="./edit_profile.php" class="btn-floating btn-large red">
                        <i class="large material-icons">mode_edit</i>
                    </a>
            </div>
        </div>
      </div>
    </div>
<?php
include 'view/footer.php';
?>