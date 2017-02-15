<?php
include 'view/header.php';

if(isset($_SESSION['user'])){
    header('Location: index.php');
}else{

$pesan = "";
if(isset($_POST['submit'])){
    $capta = $_POST['g-recaptcha-response'];
    if(!$capta){
        $pesan = "Perhatikan Captcha";
    }else{
        $nisn = trim($_POST['nisn']);
        $nama = trim($_POST['nama']);
        $asal_sekolah = trim($_POST['asal_sekolah']);
        $jurusan = trim($_POST['jurusan']);
        $url_blog = trim($_POST['url_blog']);
        $no_telp = trim($_POST['no_telp']);
        $alamat = trim($_POST['alamat']);
        $tempat_lahir = trim($_POST['tempat_lahir']);
        $tgl_lahir = trim($_POST['tgl_lahir']);
        $masa_prakerin = trim($_POST['masa_prakerin']);
        $tgl_masuk = trim($_POST['tanggal_masuk']);
        $tgl_keluar = trim($_POST['tanggal_keluar']);
        $link_fb = trim($_POST['link_fb']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $repassword = trim($_POST['repassword']);
        if($password == $repassword){
             $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Ldo9fkSAAAAAEmeYapWRYsjGicHUQ46mYys7TAf&response=".$capta."&remoteip=".$_SERVER['REMOTE_ADDR']);
            $response = json_decode($response);
            if($response->success == false){
                $pesan = "Captcha Salah";
            }else{
                $reg = register_user($nisn,$nama,$asal_sekolah,$jurusan,$url_blog,$no_telp,$alamat,$tempat_lahir,$tgl_lahir,$masa_prakerin,$tgl_masuk,$tgl_keluar,$link_fb,$email,$password);
                if($reg == 'true'){
                    $pesan = "Registrasi Berhasil Silahkan Log In";
                }elseif($reg == 'gagal'){
                    $pesan = "Registrasi Berhasil, Namun Ada Masalah Dengan Blog/URL Anda Silahkan Log In Untuk Melalukan Sync Blog";
                }elseif($reg == 'ada'){
                    $pesan = "Email Anda Telah Terdaftar";
                }else{
                    $pesan = "Terjadi Kesalahan Saat Registrasi";
                }
            }
        }else{
            $pesan = "Password Tidak Sama";
        }
    }
}

?>

<div class="container">
    <div class="row">
      <div class="col m12">
        <div class="row">
            <h3>Daftar Prakerin LUA</h3><p style="margin-top: -25px;margin-left: 5px;margin-bottom: 30px;">Version <?= VERSION_APP ?></p> 
        </div>
            <?php
            if($pesan == ''){
                echo $pesan;
            }else{
                echo $pesan;
                echo "<p> Sudah punya akun ? <a href='login.php'>Log In</a></p>";
            }
            ?>
        <div class="row">
            <form class="col s12" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="nisn" placeholder="9972267631" type="text" class="validate" name="nisn" required>
                        <label for="nisn" data-error="wrong" data-success="right">NISN</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="nama" placeholder="Aji Kamaludin" type="text" class="validate" name="nama" required>
                        <label for="nama" data-error="wrong" data-success="right">Nama</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select name="asal_sekolah" required>
                            <option name="asal_sekolah" value="" disabled selected>Pilih Sekolah Asal</option>
                            <?php
                            $data = pilih_sekolah();
                            while( $sekolah = mysqli_fetch_assoc($data)):
                            ?>
                            <option name="asal_sekolah" value="<?= $sekolah['id_sekolah']; ?>"> <?= $sekolah['nama_sekolah'];?> </option>
                            <?php
                            endwhile;
                            ?>
                            <option name="asal_sekolah" value="1"> Sekolah Belum Terdata </option>
                        </select>
                    <label>Sekolah</label>
                    </div>
                </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="jurusan" required>
                            <option name="jurusan" value="TKJ" disabled selected>Pilih Jurusan</option>
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
                        <input id="no_telp" placeholder="+6283840745543" type="text" class="validate" name="no_telp" required>
                        <label for="no_telp" data-error="wrong" data-success="right">No. Telp</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea class="materialize-textarea" name="alamat" placeholder="Jl. Srigading No.7, Tonggalan, Klaten"></textarea>
                        <label for="textarea1">Alamat</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <input id="tempat_lahir" placeholder="Klaten" type="text" class="validate" name="tempat_lahir" required>
                        <label for="tempat_lahir" data-error="wrong" data-success="right">Tempat</label>
                    </div>
                    <div class="input-field col s8">
                        <input id="tgl_lahir" placeholder="1997-07-07" type="text" class="validate" name="tgl_lahir" required>
                        <label for="tgl_lahir" data-error="wrong" data-success="right">Tanggal Lahir</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <label>Masa Prakerin</label><br>
                    <p class="range-field">
                        <input name="masa_prakerin" value="3" type="range" min="1" max="7" />
                    </p>
                    
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                    <input placeholder="2017-01-30" name="tanggal_masuk" type="text" class="validate">
                    <label> Tanggal Masuk </label>
                    </div>
                    <div class="input-field col s6">
                    <input placeholder="2017-03-30" name="tanggal_keluar" type="text" class="validate">
                    <label> Tanggal Keluar </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input placeholder="" name="link_fb" type="text" class="validate">
                    <label> Facebook </label>
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
                <div class="row" style="margin-left: 1px;">
                    <div class="g-recaptcha" data-sitekey="6Ldo9fkSAAAAAG32L-gdfjN7zDpzaShdtEcpTthh"></div>
                </div>
                <div class="row" style="margin-left: 1px;">
                    <a href="tentang.php">Syarat dan Ketentuan</a> 
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="submit">Daftar</button>

            </form>
        </div>
      </div>
    </div>
</div>

<?php
include 'view/footer.php';
}
?>