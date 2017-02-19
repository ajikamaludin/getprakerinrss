<?php
include 'view/header.php';
session_cek();

$pesan ='';

if(isset($_POST['submit'])){
  $judul_issue = $_POST['judul_issue'];
  $isi_issue = $_POST['isi_issue'];
  $gambar_issue = $_FILES['gambar_issue'];
  $email = $_SESSION['user'];
  if(!empty($judul_issue) && !empty($isi_issue) ){
      $tambah = tambah_issue($email,$judul_issue,$isi_issue,$gambar_issue);
      if($tambah){
        header('Location: forum.php');
      }else{
        $pesan = "gagal menambahkan issue";
      }
  }else{
    $pesan = " Judul Dan Isi Issue Tidak Boleh Kosong ";
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
        <h4>Forum | Tambah Issue</h4>
        </div>
        <h5 style="text-indent: 20px" ><?= $pesan ?></h5>
          <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="input-field col s12">
                  <input type="text" name="judul_issue">
                  <label >Judul Issue</label>
                  <textarea id="textarea1" name="isi_issue"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Gambar Issue</span>
                      <input type="file" name="gambar_issue" >
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                  </div>
                  <p>Syarat Gambar : Format PNG/JPEG/JPG Bukan 3gp , Ukuran Max: 2Mb</p>
                </div>

              </div>

               <input class="btn waves-effect waves-light" type="submit" name="submit" value="Tambah Issue">
          </form>
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