<?php
include 'view/header.php';
session_cek();

if(isset($_GET['id'])){
  $id = $_GET['id'];
}else{
  $id = 'NULL' ;
}

$tampil_forum_by = tampil_forum_by($id);

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
        <blockquote>
          <p>Bagikan Masalah Anda Di Sini</p>
        </blockquote>
      </div>
      <div class="row"></div>
        <div class="row">
          <h5><?= $tampil_forum_by['judul_issue']; ?></h5>
          <hr>
          <table class="striped" >
          <tr>
            <td>
              <div class="row">
                <div class="col s1">
                  <img class="responsive-img circle" src="<?= ACCESS_FROM ?>/asset/img/profile/<?= $tampil_forum_by['foto_profile']; ?>">
                  <p>
                    <?= format_pengguna($tampil_forum_by['id_pengguna']); ?><br>
                    <?= format_tgl($tampil_forum_by['waktu_issue']); ?>
                  </p>
                </div>
                <div class="col s11">
                  <p>
                    <?= $tampil_forum_by['isi_issue']; ?>
                  </p>
                </div>
              </div>
            </td>
          </tr>
          <!-- Bagian Komentar -->
          <tr>
            <td>
              <div class="row">
                <div class="col s1 offset-s1">
                  <img class="responsive-img circle" src="<?= ACCESS_FROM ?>/asset/img/profile/<?= $foto ?>">
                  <p>
                    User - Pengguna<br>
                    2017-20-20
                  </p>
                </div>
                <div class="col s10">
                  <p>
                    masalah Ini Diskripsi isi dari disripsi percobaan percobaan in in in in in in masalah Ini Diskripsi isi dari disripsi percobaan percobaan in in in in in in masalah Ini Diskripsi isi dari disripsi percobaan percobaan in in in in in in masalah Ini Diskripsi isi dari disripsi percobaan percobaan in in in in in in masalah Ini Diskripsi isi dari disripsi percobaan percobaan in in in
                  </p>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="row">
                <div class="col s1 offset-s1">
                  <img class="responsive-img circle" src="<?= ACCESS_FROM ?>/asset/img/profile/<?= $foto ?>">
                  <p>
                    Aji Kamlaudin<br>
                    2017-20-20
                  </p>
                </div>
                <div class="col s10">
                  <p>
                    masalah Ini Diskripsi isi dari disripsi percobaan percobaan in in in in in in masalah Ini Diskripsi isi dari disripsi percobaan percobaan in in in in in in masalah Ini Diskripsi isi dari disripsi percobaan percobaan in in in in in in masalah Ini Diskripsi isi dari disripsi percobaan percobaan in in in in in in masalah Ini Diskripsi isi dari disripsi percobaan percobaan in in in
                  </p>
                </div>
              </div>
            </td>
          </tr>
          </table>

          <div class="row">
            <form class="col s11 offset-s1" method="post" action="">
              <div class="row">
                <div class="input-field col s12">
                  <textarea id="textarea1"></textarea>
                      <div class="file-field input-field">
                  <div class="btn">
                      <span>Gambar</span>
                      <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div>
                  </div>
                  <input class="btn" type="submit" name="submit" value="Kirim Komentar">
                </div>
              </div>
            </form>
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