<?php
include '../../view/header.php';

session_cek();
?>


    <div class="row">

    <!--sidenav-->
<?php
include '../../view/sidenav.php';
?>
    <!--main content-->
      <div class="col s12 m8 l9"> 
      <h4>Bio Data</h4>
        <div class="row">
            <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                <input value="9972267631" name="nisn" type="text" class="validate">
                <label for="disabled">NISN</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="Aji Kamaludin" name="nama"  type="text" class="validate">
                <label for="disabled">Nama</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="aji19kamaludin@gmail.com" name="email"  type="text" class="validate">
                <label for="disabled">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="password" name="password" type="password" class="validate">
                <label for="disabled">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="TKJ (Teknik Komputer dan Jaringan)" name="jurusan" type="text" class="validate">
                <label for="disabled">Jurusan</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="SMK Muhammadiyah 1 Klaten Utara" name="asal_sekolah" type="text" class="validate">
                <label for="disabled">Sekolah</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="083840745543" name="no_hp" type="number" class="validate">
                <label for="disabled">No.Telp</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="https://ajikamaludin.blogspot.co.id" name="url_blog" type="text" class="validate">
                <label for="disabled">URL Blog</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <textarea class="materialize-textarea" name="alamat">Gatak Ceper RT02/RW10, Drono, Ngawen, Klaten, Jawa Tengah, Indonesia</textarea>
                <label for="textarea1">Alamat</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="Klaten" name="tempat_lahir" type="text" class="validate">
                <label for="disabled">Tempat Lahir</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="1997-07-14" name="tanggal_lahir" type="text" class="validate">
                <label for="disabled">Tanggal Lahir</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="3 Bulan" name="masa_prakerin" type="text" class="validate">
                <label for="disabled">Masa Prakerin</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                <input value="2017-02-02" name="tanggal_masuk" type="text" class="validate">
                <label for="disabled">Tanggal Masuk</label>
                </div>
                <div class="input-field col s6">
                <input value="2017-05-02" name="tanggal_keluar" type="text" class="validate">
                <label for="disabled">Tanggal Keluar</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="https://fb.me/ajikamaludin" name="link_fb" type="text" class="validate">
                <label for="disabled">Facebook</label>
                </div>
            </div>
            </form>
              <div class="fixed-action-btn">
                    <a class="btn-floating btn-large red">
                        <i class="large material-icons">mode_edit</i>
                    </a>
            </div>
        </div>
      </div>


    </div>
<?php
include '../../view/footer.php';
?>