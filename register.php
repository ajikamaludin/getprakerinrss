<?php
include 'view/header.php';
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
                        <input id="nama" placeholder="Nama Lengkap" type="text" class="validate" name="nama">
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
                            <option value="<?= $sekolah['nama_sekolah'];?>"> <?= $sekolah['nama_sekolah'];?> </option>
                            <?php
                            endwhile;
                            ?>
                        </select>
                    <label>Sekolah</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="url_blog" placeholder="https://ajikamaludin.blogspot.co.id" type="text" class="validate" name="url_blog">
                        <label for="url_blog" data-error="wrong" data-success="right">URL Blog</label>
                        </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" placeholder="example@example.com" type="email" class="validate" name="email">
                        <label for="email" data-error="wrong" data-success="right">Email</label>
                        </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate" name="password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="submit">Register</button>
            </form>
        </div>
        <p> Sudah punya akun ? <a href="login.php">Log In</a></p>
      </div>

      <div class="col m3">
      <!--DIV KOSONG-->
      </div>

    </div>
</div>

<?php
include 'view/footer.php';
?>
<script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
  });      
</script>