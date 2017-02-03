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
           <h4>Data Sekolah dan Pembimbing</h4>
        <div class="row">
            <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="SMK Muhammadiyah 1 Klaten Utara" name="nama_sekolah" id="disabled" type="text" class="validate">
                <label for="disabled">Nama Sekolah</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="Purnadi M.Kom" name="nama_pembimbing" id="disabled" type="text" class="validate">
                <label for="disabled">Nama Pembimbing</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="083040745543" name="no_pembimbing" id="disabled" type="text" class="validate">
                <label for="disabled">No.Telp Pembimbing</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="2016/2017" name="tahun_ajaran" id="disabled" type="password" class="validate">
                <label for="disabled">Tahun Pelajaran</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="K13/KTSP" name="kurikulum" id="disabled" type="text" class="validate">
                <label for="disabled">Kurikulum</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="2017" name="tahun_prakerin" id="disabled" type="text" class="validate">
                <label for="disabled">Tahun Prakerin</label>
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