<?php
include 'view/header.php';

if(isset($_SESSION['user'])){
    header('Location: index.php');
}else{

$error = '';
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(!empty(trim($email)) && !empty(trim($password))){
        if(cek_pengguna($email,$password) == 'true'){
            $_SESSION['user'] = $email;
            header('Location: index.php');
        }elseif(cek_pengguna($email,$password) == 'selesai'){
            header('Location: view/selamat.php');
        }elseif(cek_pengguna($email,$password) == 'keluar'){
            header('Location: view/mohon-maaf.php');
        }else{
            $error = 'Anda Punya Masalah Hidup Saat LogIn';
        }
    }else{
        $error = 'E-mail dan Password Tidak Valid';
    }
}

?>

<div class="container">
<div class="row"></div>
    <div class="row">
      <div class="col m2">
      <!--DIV KOSONG-->
      </div>

      <div class="col m6">
      <div>
        <h2>Prakerin LUA</h2><p style="margin-top: -25px;margin-left: 5px;margin-bottom: 30px;">Version <?= VERSION_APP ?></p>
      </div>
        <div class="row">
            <form class="col s12" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate" name="email">
                        <label for="email" data-error="wrong" data-success="right">Email</label>
                        </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate" name="password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="submit">Log In</button>
            </form>
        </div>
        <?php
            echo "".$error."";
        ?>
        <p> Belum punya akun ? <a href="register.php">Register</a></p>
      </div>

      <div class="col m4">
      <!--DIV KOSONG-->
      </div>

    </div>
</div>

<?php
}//end of if cek session
include 'view/footer.php';
?>