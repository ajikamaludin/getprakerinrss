<?php
include 'view/header.php';
session_cek();
$pesan = '';

//Aksi Dalam Aksi
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $tampil_forum_by = tampil_forum_by($id);
  //Pagination
  $perlaman = 10;
  $laman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
  $mulai = ($laman > 1) ? ($laman * $perlaman) - $perlaman : 0;
  $total = total_komentar($id);
  $lamans = ceil($total/$perlaman);
  $tampil_komentar_by = tampil_komentar_by($id,$mulai,$perlaman);


  if($tampil_forum_by['email'] == $_SESSION['user']){
    if(isset($_GET['aksi'])){
      $aksi = $_GET['aksi'];
      if($aksi == 'hapus'){
        $result = hapus_issue($id);
        if($result){
          header('Location: forum.php');
        }else{
          $pesan = 'gagal hapus issue';
        }
      }elseif($aksi == 'hapus_komentar'){
        $id_komentar = $_GET['id_komentar'];
        $result = hapus_komentar($id_komentar);
        if($result){
          header('Location: forum_detail.php?id='.$id);
        }else{
          $pesan = 'gagal hapus komentar';
        }
      }elseif($aksi == 'mark_notif'){
        $id_notif = $_GET['id_no'];
        baca_notif_id($id_notif);
      }else{
        $pesan = 'jangan coba coba';
      }
    }
  }
}else{
  $id = 'NULL' ;
}


//Komentar Baru
if(isset($_POST['submit'])){
  $komentar = $_POST['komentar'];
  $gambar = $_FILES['gambar_komentar'];
  $email = $_SESSION['user'];
  if(!empty($komentar) || !empty($gambar)){
    $result = komentar_issue($id,$email,$komentar,$gambar);
    if($result){
      header('Refresh:0');
    }else{
      $pesan = "komentar gagal";
    }
  }else{
    $pesan = 'komentar atau gambar tidak boleh kosong';
  }
}

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
      <div class="row"><?=$pesan?></div>
        <div class="row">
          <h5><?= $tampil_forum_by['judul_issue']; ?></h5>
          <hr>
          <table class="striped" >
          <tr>
            <td>
              <div class="row">
                <div class="col s2">
                  <img class="responsive-img circle" src="<?= ACCESS_FROM ?>/asset/img/profile/<?= $tampil_forum_by['foto_profile']; ?>">
                  <p>
                    <?= format_pengguna($tampil_forum_by['id_pengguna']); ?><br>
                    <?= format_tgl($tampil_forum_by['waktu_issue']); ?>
                    <?php
                      if($tampil_forum_by['email'] == $_SESSION['user']){
                        echo "<a href='forum_edit_issue.php?id_issue=".$id."' > Edit </a>";
                        echo " | ";
                        echo "<a href='forum_detail.php?id=".$id."&aksi=hapus'> Hapus </a>";
                      }
                    ?>
                  </p>
                </div>
                <div class="col s10">
                  <p>
                    <?= $tampil_forum_by['isi_issue']; ?>
                  </p>
                  <?php
                  if($tampil_forum_by['gambar_issue'] != 'NULL'){
                    echo "<img  class='materialboxed responsive-img' width='650' src=".ACCESS_FROM."/asset/img/forum/".$tampil_forum_by['gambar_issue']." type='image' />";
                  }
                  ?>
                  <div class="card-action white-text">
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <!-- Bagian Komentar -->
          <?php foreach ($tampil_komentar_by as $tampil_komentar) { ?>
          <tr>
            <td>
              <div class="row">
                <div class="col s2 offset-s1">
                  <img class="circle" style="max-width: 40%;" src="<?= ACCESS_FROM ?>/asset/img/profile/<?= $tampil_komentar['foto_profile'] ?>">
                  <p>
                    <?= format_pengguna($tampil_komentar['id_pengguna']); ?><br>
                    <?= format_tgl($tampil_komentar['waktu_komentar']); ?>
                    <?php
                      if($tampil_komentar['email'] == $_SESSION['user']){
                        echo "<a href='forum_detail.php?id=".$id."&id_komentar=".$tampil_komentar['id_komentar']."&aksi=hapus_komentar'> Hapus </a>";
                      }
                    ?>
                  </p>
                </div>
                <div class="col s9">
                  <p>
                    <?= $tampil_komentar['isi_komentar']; ?>
                  </p>
                  <?php
                  if($tampil_komentar['gambar_komentar'] != 'NULL'){
                    echo "<img  class='materialboxed' style='max-width:75%;' src=".ACCESS_FROM."/asset/img/forum/komentar/".$tampil_komentar['gambar_komentar']." type='image' />";
                  }
                  ?>
                </div>
              </div>
            </td>
          </tr>
          <?php } ?>
          </table>
          <div class="row">
            <div class="col s3 offset-s9" >
            <ul class="pagination">
              <li class="waves-effect"><a href="?id=<?=$id?>&halaman=1"><i class="material-icons">chevron_left</i></a></li>
              <?php 
              for($i=1;$i<=$lamans;$i++) {
                if($i == $laman){
                  $actived = "active";
                }else{
                  $actived = "";
                }
              ?>
              <li class="<?= $actived ?>"><a href="?id=<?=$id?>&halaman=<?= $i ?>"><?= $i ?></a></li>
              <?php } ?>

              <li class="waves-effect"><a href="?id=<?=$id?>&halaman=<?= $i ?>"><i class="material-icons">chevron_right</i></a></li>
            
            </ul>
            </div>
          </div>
          <div class="row">
            <form class="col s11 offset-s1" method="post" action="" enctype="multipart/form-data">
              <div class="row">
                <div class="input-field col s12">
                  <textarea id="textarea1" name="komentar"></textarea>
                      <div class="file-field input-field">
                  <div class="btn">
                      <span>Gambar</span>
                      <input type="file" name="gambar_komentar">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div>
                  </div>
                  <input class="btn" type="submit" name="submit" value="Komentar">
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