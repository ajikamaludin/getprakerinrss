<?php
include 'view/header.php';

session_cek();
$sekolah = tampil_sekolah($_SESSION['user']);
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
                        <select name="asal_sekolah">
                            <option name="asal_sekolah" value="<?= $sekolah['id_sekolah'];?>"> <?= $sekolah['nama_sekolah'];?> </option>
                            <?php
                            $data = pilih_sekolah();
                           while( $all_sekolah = mysqli_fetch_assoc($data) ):
                            ?>
                            <option name="asal_sekolah" value="<?= $all_sekolah['id_sekolah'];?>"> <?= $all_sekolah['nama_sekolah'];?> </option>
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
                <input value="<?= $sekolah['nama_pembimbing'] ?>" name="nama_pembimbing" type="text" class="validate">
                <label for="disabled">Nama Pembimbing</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="<?= $sekolah['no_pembimbing'] ?>" name="no_pembimbing" type="text" class="validate">
                <label for="disabled">No.Telp Pembimbing</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="<?= $sekolah['tahun_ajaran'] ?>" name="tahun_ajaran" type="text" class="validate">
                <label for="disabled">Tahun Pelajaran</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="<?= $sekolah['kurikulum'] ?>" name="kurikulum" type="text" class="validate">
                <label for="disabled">Kurikulum</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input value="<?= $sekolah['thn_prakerin'] ?>" name="tahun_prakerin" type="text" class="validate">
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