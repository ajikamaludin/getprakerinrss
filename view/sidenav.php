<?php
$foto = tampil_foto();
?>
      <div class="col s12 m4 l3"> 
            <ul id="slide-out" class="side-nav fixed">
                <li><div class="userView">
                        <div class="background">
                        <img src="<?= ACCESS_FROM ?>/asset/img/background.jpg">
                    </div>
                    <a href="./foto_profile.php"><img class="circle" src="<?= ACCESS_FROM ?>/asset/img/profile/<?= $foto ?>"></a>
                    <a href="<?= ACCESS_FROM ?>/profile.php"><span class="white-text name"><?= tampil_nama($_SESSION['user']); ?> </span></a>
                    <a href="<?= ACCESS_FROM ?>/profile.php"><span class="white-text email"><?= $_SESSION['user'];?></span></a>
                    </div>
                </li>
            <li><a class="waves-effect" href="<?= ACCESS_FROM ?>/index.php">Dashboard</a></li>
            <li><a class="waves-effect" href="<?= ACCESS_FROM ?>/profile.php">Profile</a></li>
            <li><a class="waves-effect" href="<?= ACCESS_FROM ?>/sekolahku.php">Sekolah & Pembimbing</a></li>
            <li><a class="waves-effect" href="<?= ACCESS_FROM ?>/laporan.php">Laporan</a></li>
            <li><a class="waves-effect" href="<?= ACCESS_FROM ?>/forum.php">Forum<span class="badge">4 Pemberitahuan</span></a></li>
            <li><a class="waves-effect" href="<?= ACCESS_FROM ?>/logout.php">Keluar</a></li>
            </ul>
      </div>