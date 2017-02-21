<?php
include 'view/header.php';
session_cek();
$u_email = $_SESSION['user'];
$notifs = tampilkan_notif($u_email);

if(isset($_GET['q'])){
  $aksi = $_GET['q'].'_notif';
  if($aksi == "hapus_notif"){
    $p = hapus_notif($u_email);
    if($p){
      header('Location: forum_notif.php?q=');
    }else{
      die();
    }
  }elseif($aksi == "baca_notif"){
    $p = baca_notif($u_email);
    if($p){
      header('Location: forum_notif.php?q=');
    }else{
      die();
    }
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
      </div>
      <div class="row"></div>
        <div class="row">
          <h5><?= $unread_notif ?> Pemberitahuan</h5>
          <hr>
          <a href="forum_notif.php?q=baca" >Tandai Telah dibaca Semua </a> | 
          <a href="forum_notif.php?q=hapus">Hapus Semua Pemberitahuan</a>
          </button>
          <div class="collection">
          <!-- <a href="#!" class="collection-item active">Alvin</a> -->
          <?php foreach($notifs as $notif) {
                if($notif['status_notif'] == 'dibaca'){
                  $status = 'active';
                }else{
                  $status ='';
                }
          ?>
            <a href="<?=$notif['url_notif'].'&aksi=mark_notif&id_no='.$notif['id_notifikasi']?>" class="collection-item <?= $status ?> "><?= $notif['isi_notif']."<br> Pada:".$notif['waktu_notif']; ?></a>
          <?php } ?>
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