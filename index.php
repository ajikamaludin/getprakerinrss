<?php
include 'view/header.php';
session_cek();
$posts = tampil_post_by($_SESSION['user']);
?>


    <div class="row">

    <!--sidenav-->
<?php
include 'view/sidenav.php';
?>
    <!--main content-->
      <div class="col s12 m8 l9"> 
      <h4 style="margin-bottom: 50px;">Kehadiran dan Kegiatan Prakerin</h4>
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
          <a class="btn-floating btn-large red" href=".">
            <i class="material-icons">replay</i>
          </a>
        </div>
        <table class="responsive-table highlight">
        <thead>
          <tr>
              <th>Hari/Tanggal Masuk</th>
              <th>Nama Kegiatan</th>
              <th>Penulis</th>
          </tr>
        </thead>

        <tbody>
        <?php
        foreach($posts as $post){
        ?> 
          <tr>
            <td> <?= $post['tgl_post']?> </td>
            <td> <?= $post['judul_post']?> </td>
            <td> <?= $post['nama']?> </td>
          </tr>
        <?php
        }
        ?>
        </tbody>
      </table>
      </div>


    </div>
<?php
include 'view/footer.php';
?>