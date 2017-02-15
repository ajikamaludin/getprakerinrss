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
            </form>
              <div class="fixed-action-btn">
                    <a href="./edit_profile.php" class="btn-floating btn-large red">
                        <i class="large material-icons">mode_edit</i>
                    </a>
            </div>
        <a href="ganti_password.php" class="btn waves-effect waves-light" type="submit" name="action">Ganti Password
            <i class="material-icons right">send</i>
        </a>
        <a href="foto_profile.php" class="btn waves-effect waves-light" type="submit" name="action">Ganti Foto Profile
            <i class="material-icons right">send</i>
        </a>
        </div>
      </div>
    </div>
<?php
include 'view/footer.php';
?>