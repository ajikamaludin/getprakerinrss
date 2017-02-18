<?php
include 'view/header.php';
session_cek();
?>
    <div class="row">

    <!--sidenav-->
<?php
include 'view/sidenav.php';
?>
    <!--main content-->
      <div class="col s12 m8 l9"> 
      <div class="col m12">
      <h4>Forum</h4>
      </div>
      <div class="row"></div>
        <div class="row">
          <h5>Pemberitahuan</h5>
          <hr>
          <button class="btn waves-effect waves-light" type="submit" name="action">Telah dibaca Semua
          </button>
          <button class="btn waves-effect waves-light" type="submit" name="action">Hapus Pemberitahuan
          </button>
          <div class="collection">
            <a href="#!" class="collection-item active">Alvin</a>
            <a href="#!" class="collection-item">Alvin</a>
            <a href="#!" class="collection-item">Alvin</a>
            <a href="#!" class="collection-item">Alvin</a>
          </div>

          <div class="fixed-action-btn horizontal">
            <a class="btn-floating btn-large red">
              <i class="large material-icons">reorder</i>
            </a>
            <ul>
              <li><a href="forum_notif.php" class="btn-floating blue tooltipped" data-position="top" data-delay="50" data-tooltip=" Pemberitahuan "><i class="material-icons">message</i></a></li>
              <li><a href="forum_tambah.php" class="btn-floating red tooltipped" data-position="top" data-delay="50" data-tooltip=" Tambah Issue Baru "><i class="material-icons">mode_edit</i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
<?php
include 'view/footer.php';
?>