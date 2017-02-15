<?php
$foto = tampil_foto();
?>
      <div class="col s12 m4 l3"> 
            <ul id="slide-out" class="side-nav fixed">
                <li><div class="userView">
                        <div class="background">
                        <img src="./asset/img/background.jpg">
                    </div>
                    <a href="./foto_profile.php"><img class="circle" src="./asset/img/profile/<?= $foto ?>"></a>
                    <a href="./profile.php"><span class="white-text name"><?= tampil_nama($_SESSION['user']); ?> </span></a>
                    <a href="./profile.php"><span class="white-text email"><?= $_SESSION['user'];?></span></a>
                    </div>
                </li>
            <li><a class="waves-effect" href="./index.php">Dashboard</a></li>
            <li><a class="waves-effect" href="./profile.php">Profile</a></li>
            <li><a class="waves-effect" href="./laporan.php">Laporan</a></li>
            <li><a class="waves-effect" href="./sekolahku.php">Sekolah & Pembimbing</a></li>
            <li><a class="waves-effect" href="./forum.php">Forum</a></li>
            <li><a class="waves-effect" href="./logout.php">Keluar</a></li>
            </ul>
      </div>