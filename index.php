<?php
include 'view/header.php';
session_cek();
$posts = tampil_post_by($_SESSION['user'],'7');

if(isset($_POST['sync'])){
  resync_blog($_SESSION['user']);
  header('Refresh:0');
}elseif (isset($_POST['dropall'])) {
  drop_post_by($_SESSION['user']);
  header('Refresh:0');
}elseif(isset($_POST['more'])){
  $posts = tampil_post_by($_SESSION['user'],'255');
}elseif(isset($_POST['print_jurnal_pdf'])){
  $email = $_SESSION['user'];
  $nama = tampil_nama($_SESSION['user']);
  header('Location: view/download/download_jurnal.php?email='.$email.'&nama='.$nama.'');
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
            <tr id="data_<?= $post['id_my_blog']?>">
              <td> <?= format_tgl($post['tgl_post'])?> </td>
              <td> <a href="<?= $post['url_post'] ?>" target="_blank" > <?= potong_judul($post['judul_post'])?> </a> </td>
              <td> <?= $post['nama']?> </td>
              <td> <a href="#" class="hapus_post" data-id="<?= $post['id_pengguna']?>" data-postid="<?= $post['id_my_blog']?>">Hapus</a> </td>
            </tr>
          <?php
          }
          ?>
          </tbody>
        </table>
        </div>
        <div class="row">
          <form method="post">
            <input type="submit" name="more" class="waves-effect waves-light btn" value="Tampilkan Semua" />
            <input type="submit" name="print_jurnal_pdf" class="waves-effect waves-light btn" value="Download PDF">
            <!-- <input type="submit" name="print_jurnal_odt" class="waves-effect waves-light btn" value="Download ODT" disabled id="disabled" /> -->
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