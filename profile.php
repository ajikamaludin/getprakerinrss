<?php
include 'view/header.php';

session_cek();
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
            <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="9972267631" name="nisn" id="disabled" type="text" class="validate">
                <label for="disabled">NISN</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="Aji Kamaludin" name="nama" id="disabled" type="text" class="validate">
                <label for="disabled">Nama</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="aji19kamaludin@gmail.com" name="email" id="disabled" type="text" class="validate">
                <label for="disabled">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="password" name="password" id="disabled" type="password" class="validate">
                <label for="disabled">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="TKJ (Teknik Komputer dan Jaringan)" name="jurusan" id="disabled" type="text" class="validate">
                <label for="disabled">Jurusan</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="SMK Muhammadiyah 1 Klaten Utara" name="asal_sekolah" id="disabled" type="text" class="validate">
                <label for="disabled">Sekolah</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="083840745543" name="no_hp" id="disabled" type="number" class="validate">
                <label for="disabled">No.Telp</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="https://ajikamaludin.blogspot.co.id" name="url_blog" id="disabled" type="text" class="validate">
                <label for="disabled">URL Blog</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <textarea disabled id="disabled" class="materialize-textarea" name="alamat">Gatak Ceper RT02/RW10, Drono, Ngawen, Klaten, Jawa Tengah, Indonesia</textarea>
                <label for="textarea1">Alamat</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="Klaten" name="tempat_lahir" id="disabled" type="text" class="validate">
                <label for="disabled">Tempat Lahir</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="1997-07-14" name="tanggal_lahir" id="disabled" type="text" class="validate">
                <label for="disabled">Tanggal Lahir</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="3 Bulan" name="masa_prakerin" id="disabled" type="text" class="validate">
                <label for="disabled">Masa Prakerin</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                <input disabled value="2017-02-02" name="tanggal_masuk" id="disabled" type="text" class="validate">
                <label for="disabled">Tanggal Masuk</label>
                </div>
                <div class="input-field col s6">
                <input disabled value="2017-05-02" name="tanggal_keluar" id="disabled" type="text" class="validate">
                <label for="disabled">Tanggal Keluar</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="https://fb.me/ajikamaludin" name="link_fb" id="disabled" type="text" class="validate">
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
include 'view/footer.php';
?>