<?php
include 'view/header.php';

if(isset($_SESSION['user'])){
    header('Location: index.php');
}else{

$pesan = "";
if(isset($_POST['submit'])){
    $nama = trim($_POST['nama']);
    $asal_sekolah = trim($_POST['asal_sekolah']);
    $jurusan = trim($_POST['jurusan']);
    $url_blog = trim($_POST['url_blog']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);
    if($password == $repassword){
        $reg = register_user($nama,$asal_sekolah,$jurusan,$url_blog,$email,$password);
        if($reg == 'true'){
            $pesan = "Registrasi Berhasil Silahkan Log In";
        }elseif($reg == 'fsync_blog'){
            $pesan = "Registrasi Berhasil, Namun Ada Masalah Dengan Blog/URL Anda Silahkan Log In Untuk Melalukan Sync Blog";
        }elseif($reg == 'ada'){
            $pesan = "Email Anda Telah Terdaftar";
        }else{
            $pesan = "Terjadi Kesalahan Saat Registrasi";
        }
    }else{
        $pesan = "Password Tidak Sama";
    }
}

?>

<div class="container">
<div class="row"></div>
    <div class="row">
      <div class="col m3">
      <!--DIV KOSONG-->
      </div>

      <div class="col m6">
      <h3>Daftar Prakerin LUA</h3>
        <div class="row">
            <form class="col s12" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="nama" placeholder="Nama Lengkap" type="text" class="validate" name="nama" required>
                        <label for="nama" data-error="wrong" data-success="right">Nama</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select name="asal_sekolah">
                            <option value="" disabled selected>Pilih Sekolah Asal</option>
                            <?php
                            $data = pilih_sekolah();
                           while( $sekolah = mysqli_fetch_assoc($data) ):
                            ?>
                            <option name="asal_sekolah" value="<?= $sekolah['nama_sekolah'];?>"> <?= $sekolah['nama_sekolah'];?> </option>
                            <?php
                            endwhile;
                            ?>
                            <option name="asal_sekolah" value=""> Sekolah Belum Terdata </option>
                        </select>
                    <label>Sekolah</label>
                    </div>
                </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="jurusan">
                            <option name="jurusan" value="TKJ"> TKJ </option>
                            <option name="jurusan" value="RPL"> RPL </option>
                            <option name="jurusan" value="MM"> MM </option>
                            <option name="jurusan" value="ELEKTRO"> Elektro </option>
                            <option name="jurusan" value="MAHASISWA TI"> Mahasiswa TI </option>
                    </select>
                 <label>Jurusan</label>
                </div>
            </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="url_blog" placeholder="https://ajikamaludin.blogspot.co.id" type="text" class="validate" name="url_blog" required>
                        <label for="url_blog" data-error="wrong" data-success="right">URL Blog</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" placeholder="example@example.com" type="email" class="validate" name="email" required>
                        <label for="email" data-error="wrong" data-success="right">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="password" type="password" class="validate" name="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="password" type="password" class="validate" name="repassword" required>
                        <label for="password">Repeat Password</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="submit">Register</button>
            </form>
        </div>
        <?php
        if($pesan == ''){
            echo $pesan;
        }else{
            echo $pesan;
            echo "<p> Sudah punya akun ? <a href='login.php'>Log In</a></p>";
        }
        ?>
      </div>

      <div class="col m3">
      <!--DIV KOSONG-->
      </div>

    </div>
</div>

<?php
include 'view/footer.php';
}
?>