<?php
include 'view/header.php';
session_cek();

$pesan = '';

if(isset($_POST['submit'])){
  $password = $_POST['password'];
  $password_baru = $_POST['password_baru'];
  $password_baru_re = $_POST['password_baru_re'];
  if( $password_baru == $password_baru_re ){
    if(cek_password($_SESSION['user'],$_POST['password'])){
      $result = ubah_password($_SESSION['user'],$_POST['password']);
      if($result){
        header('Location: profile.php');
      }
    }else{
      $pesan = 'password salah gagal diubah';
    }
  }else{
    $pesan = 'password tidak sama';
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
    <h4>Password</h4>
        <div class="row">
            <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                <input  value="" name="$password" type="password" class="validate">
                <label>Password Lama</label>
                </div>
                <div class="row">
                <div class="input-field col s12">
                <input  value="" name="password_baru" type="password" class="validate">
                <label>Password Baru</label>
                </div>
                <div class="row">
                <div class="input-field col s12">
                <input  value="" name="password_baru_re" type="password" class="validate">
                <label>Ulang Password Baru</label>
                </div>
            </div>
            </form>
        </div>
      </div>


    </div>
<?php
include 'view/footer.php';
?>