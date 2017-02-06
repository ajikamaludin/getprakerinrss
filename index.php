<?php
include 'view/header.php';
session_cek();
$posts = tampil_post_by($_SESSION['user']);
if(isset($_POST['sync'])){
  resync_blog($_SESSION['user']);
  header('Refresh:0');
}elseif (isset($_POST['dropall'])) {
  drop_post_by($_SESSION['user']);
  header('Refresh:0');
}
?>


    <div class="row">

    <!--sidenav-->
<?php
include 'view/sidenav.php';
?>
    <!--main content-->
      <div class="col s12 m8 l9">
        <h4 style="margin-bottom: 30px;">Kehadiran dan Kegiatan Prakerin</h4>
        <div style="display: none;" id="loader">
            <div class="preloader-wrapper big active">
              <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                  <div class="circle"></div>
                </div><div class="gap-patch">
                  <div class="circle"></div>
                </div><div class="circle-clipper right">
                  <div class="circle"></div>
                </div>
              </div>

              <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                  <div class="circle"></div>
                </div><div class="gap-patch">
                  <div class="circle"></div>
                </div><div class="circle-clipper right">
                  <div class="circle"></div>
                </div>
              </div>

              <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                  <div class="circle"></div>
                </div><div class="gap-patch">
                  <div class="circle"></div>
                </div><div class="circle-clipper right">
                  <div class="circle"></div>
                </div>
              </div>

              <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                  <div class="circle"></div>
                </div><div class="gap-patch">
                  <div class="circle"></div>
                </div><div class="circle-clipper right">
                  <div class="circle"></div>
                </div>
              </div>
            </div>
        </div>
      <div class="row" id="data-table">
        <div class="row" >
          <table class="responsive-table highlight">
          <thead>
            <tr>
                <th>Hari/Tanggal Masuk</th>
                <th>Nama Kegiatan</th>
                <th>Penulis</th>
                <th>Hapus</th>
            </tr>
          </thead>

          <tbody>
          <?php
          foreach($posts as $post){
          ?> 
            <tr>
              <td> <?= format_tgl($post['tgl_post'])?> </td>
              <td> <?= potong_judul($post['judul_post'])?> </td>
              <td> <?= $post['nama']?> </td>
              <td> <a href="#" class="">Hapus</a> </td>
            </tr>
          <?php
          }
          ?>
          </tbody>
        </table>
        </div>
        <div class="row">
          <form method="post">
            <a class="waves-effect waves-light btn">Tampilkan Lagi</a>
            <a class="waves-effect waves-light btn">Download PDF</a>
            <a class="waves-effect waves-light btn">Download ODT</a>
            <input id="rsync" class="waves-effect waves-light btn" type="submit" name="sync" value="Re-Sync Post" />
            <input class="waves-effect waves-light btn" type="submit" name="dropall" value="Delete All Post" />
          </form>
        </div>
        <div class="fixed-action-btn" style="bottom: 25px; right: 24px;">
            <a class="btn-floating btn-large red" href=".">
              <i class="material-icons">replay</i>
            </a>
          </div>
      </div>

    </div>
<?php
include 'view/footer.php';
?>