<?php
include 'view/header.php';
session_cek();
$laporan = tampil_laporan($_SESSION['user']);
?>
    <div class="row">

    <!--sidenav-->
<?php
include 'view/sidenav.php';
?>
    <!--main content-->
      <div class="col s12 m8 l9"> 
      <h4>Laporan</h4>
        <div class="row">
            <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                <textarea name="kata_pengantar" class="materialize-textarea" disabled id="disabled" ><?= $laporan['kata_pengantar'] ?></textarea>
                <label for="disabled">Kata Pengantar</label>
                </div>
            </div>
            </form>
              <div class="fixed-action-btn">
                    <a href="./edit_laporan.php" class="btn-floating btn-large red">
                        <i class="large material-icons">mode_edit</i>
                    </a>
            </div>
        </div>
      </div>
    </div>
<?php
include 'view/footer.php';
?>