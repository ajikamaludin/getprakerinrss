<?php
include 'view/header.php';
session_cek();
$posts = tampil_post_by($_SESSION['user']);

$pesan = '';

if(isset($_POST['submit'])){
  //die(var_dump($pesan = $_FILES['foto_profile']));

  $file = $_FILES['foto_profile'];
  
  upload_foto($file,$_SESSION['user']);

}

?>

    <div class="row">

    <!--sidenav-->
<?php
include 'view/sidenav.php';
?>
    <!--main content-->
      <div class="col s12 m8 l9"> 
        <div class="row"></div>
        <div class="row ">
        <?= $pesan ?>
           <div class="col m4">
             <img src="./asset/img/profile/empty-profile.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
           </div>
        </div>
        <div class="row">
          <div class="col m10">
            <div class="row">
             <form method="post" enctype="multipart/form-data">
              <div class="file-field input-field">
                <div class="btn">
                  <span>File</span>
                  <input type="file" name="foto_profile">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
                  <input type="submit" name="submit" class="btn waves-effect waves-light"  value="Upload">
              </div>            
            </form>
            </div>
          <div class="row" ><p>Syarat Gambar : Format PNG/JPEG/JPG , Bukan 3gp , Ukuran Max: 1Mb</p></div>
        </div>
      </div>

        </div>


    </div>
<?php
include 'view/footer.php';
?>