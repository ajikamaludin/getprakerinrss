<?php
include 'view/header.php';
session_cek();
$perlaman = 10;
$laman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$mulai = ($laman > 1) ? ($laman * $perlaman) - $perlaman : 0;
$total = total_masalah();

$forum = tampil_forum($mulai,$perlaman);
$hitsue = tampil_hits_issue();

$lamans = ceil($total/$perlaman);

$cari_ok = false;
if(isset($_POST['cari'])){
  $cari_ok = true;
  $cari = $_POST['cari'];
  $cari = tampil_hasil_cari($cari);
}


?>
    <div class="row">

    <!--sidenav-->
<?php
include 'view/sidenav.php';
?>
    <!--main content-->
      <div class="col s12 m8 l9"> 
      <div class="col m8">
        <h4>Forum</h4>
          <blockquote>
            <p>Bagikan Masalah Anda Di Sini</p>
          </blockquote>
        </div>
        <div class="col m4">
            <div class="input-field col s12">
               <form method="post" action="">
                  <input id="cari" name="cari" type="text" class="validate">
                  <label for="Cari">Cari</label>
                </form>
            </div>            
        </div>
      <div class="row">
        <?php
        if($cari_ok){
          $hasil = mysqli_num_rows($cari);
          if($hasil <= 0){
          echo "<p>Data Tidak Ditemukan</p>";
          }
             foreach ($cari as $ditemukan) :?>
              <div class="row">
                <div class="col s12">
                  <div class="card red darken-2">
                    <div class="card-content white-text">
                    <a href="forum_detail.php?id=<?= $ditemukan['id_forum']; ?>">
                      <span class="card-title"><?= $ditemukan['judul_issue'];?></span>
                    </a>
                      <p><?= potong_isi($ditemukan['isi_issue']); ?></p>
                    </div> 
                  <div class="card-action white-text">
                    <?= format_pengguna($ditemukan['id_pengguna']); ?>
                  Pada: <?= format_tgl($ditemukan['waktu_issue']); ?>
                  </div>
                  </div>
                </div>
              </div>
          <?php endforeach;
           } ?>
      </div>
        <div class="row">
          <h5>Hit's Issue</h5>
          <hr>
          <?php foreach ($hitsue as $hit) {?>
          <div class="row">
            <div class="col s12">
              <div class="card red darken-2">
                <div class="card-content white-text">
                <a href="forum_detail.php?id=<?= $hit['id_forum']; ?>">
                  <span class="card-title"><?= $hit['judul_issue'];?></span>
                </a>
                  <p><?= potong_isi($hit['isi_issue']); ?></p>
                </div> 
              <div class="card-action white-text">
                <?= format_pengguna($hit['id_pengguna']); ?>
              Pada: <?= format_tgl($hit['waktu_issue']); ?>
              </div>
              </div>
            </div>
          </div>
          <?php } ?>
          </div>
          <div class="row" ></div>
          <h5> New Issue</h5>

          <hr>
          <table class="striped" >
          <?php foreach ($forum as $tampil_forum) {?>
          <tr>
            <td>
            <a href="forum_detail.php?id=<?= $tampil_forum['id_forum']; ?>">
              <h6 style="font-weight: bold;font-size: 17px" >
                <?= $tampil_forum['judul_issue']; ?>
              </h6>
            </a>
            <p>
              <?= potong_isi($tampil_forum['isi_issue']); ?>
            </p>
            <p>
              <?= format_pengguna($tampil_forum['id_pengguna']); ?><br>
              Pada: <?= format_tgl($tampil_forum['waktu_issue']); ?>
            </p>
            </td>
          </tr>
          <?php } ?>
          </table>


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