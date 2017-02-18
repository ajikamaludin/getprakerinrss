<?php
include 'view/header.php';
session_cek();
$profiles = tampil_profile($_SESSION['user']);
$pesan = '';
if(isset($_POST['submit'])){
    if(cek_password($_SESSION['user'],$_POST['password'])){
        $valid = $profiles['id_pengguna'];
        $nisn = trim($_POST['nisn']);
        $nama = trim($_POST['nama']);
        $email = trim($_POST['email']);
        $alamat = trim($_POST['alamat']);
        $tempat_lahir = trim($_POST['tempat_lahir']);
        $tgl_lahir = trim($_POST['tanggal_lahir']);
        $masa_prakerin = trim($_POST['masa_prakerin']);
        $tgl_masuk = trim($_POST['tanggal_masuk']);
        $tgl_keluar = trim($_POST['tanggal_keluar']);
        $jurusan = trim($_POST['jurusan']);
        $url_blog = trim($_POST['url_blog']);
        $link_fb = trim($_POST['link_fb']);
        $no_hp = trim($_POST['no_hp']);
        $result = input_data_profile($nisn,$nama,$email,$alamat,$tempat_lahir,$tgl_lahir,$masa_prakerin,$tgl_masuk,$tgl_keluar,$jurusan,$url_blog,$link_fb,$no_hp,$valid);
        if($result){
            header('Location: profile.php');
        }else{
            $pesan = "perubahan mengalami kesalahan";
        }
    }else{
        $pesan = "password salah";
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
      <h4>Bio Data</h4>
        <div class="row">
            <form class="col s12" method="post" >
            <div class="row">
                <?= "<h5>".$pesan.'</h5>'?>
                <div class="input-field col s12">
                <input value="<?= $profiles['nisn'] ?>" name="nisn" type="text" class="validate">
                <label  >NISN</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="<?= $profiles['nama'] ?>" name="nama" type="text" class="validate">
                <label  >Nama</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="<?= $profiles['email'] ?>" name="email" type="text" class="validate">
                <label>Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="jurusan">
                            <option value="<?= $profiles['jurusan'] ?>" name="jurusan" selected><?= $profiles['jurusan'] ?></option>
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
                <input value="<?= $profiles['no_hp'] ?>" name="no_hp" type="text" class="validate">
                <label  >No.Telp</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="<?= $profiles['url_blog'] ?>" name="url_blog" type="text" class="validate">
                <label  >URL Blog</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <textarea class="materialize-textarea" name="alamat"><?= $profiles['alamat'] ?></textarea>
                <label for="textarea1">Alamat</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="<?= $profiles['kota_lahir'] ?>" name="tempat_lahir" type="text" class="validate">
                <label  >Tempat Lahir</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="<?= $profiles['tgl_lahir'] ?>" name="tanggal_lahir" type="text" class="validate">
                <label  >Tanggal Lahir</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <label>Masa Prakerin</label><br>
                <p class="range-field">
                    <input name="masa_prakerin" value="<?= $profiles['masa_prakerin'] ?>" type="range" min="1" max="7" />
                </p>
                
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                <input value="<?= $profiles['tgl_masuk'] ?>" name="tanggal_masuk" type="text" class="validate">
                <label  >Tanggal Masuk</label>
                </div>
                <div class="input-field col s6">
                <input  value="<?= $profiles['tgl_keluar'] ?>" name="tanggal_keluar" type="text" class="validate">
                <label  >Tanggal Keluar</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="<?= $profiles['link_fb'] ?>" name="link_fb" type="text" class="validate">
                <label  >Facebook</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="" name="password"  type="password" class="validate" required>
                <label  >Confirm Password</label>
                </div>
            </div>
            <div class="fixed-action-btn">
                    <button type="submit" name="submit" class="btn-floating btn-large red">
                        <i class="large material-icons">send</i>
                    </button>
            </div>
            </form>
        </div>
      </div>
    </div>
<?php
include 'view/footer.php';
?>