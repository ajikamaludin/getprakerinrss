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
      <h4 style="margin-bottom: 50px;">Kehadiran dan Kegiatan Prakerin</h4>
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
          <a class="btn-floating btn-large red" href=".">
            <i class="material-icons">replay</i>
          </a>
        </div>
        <table class="responsive-table highlight">
        <thead>
          <tr>
              <th>Hari/Tanggal Masuk</th>
              <th>Nama Kegiatan</th>
              <th>Penulis</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td> Senin , 30 Januari 2017</td>
            <td>Mengenal Linux Dasar</td>
            <td> Aji Kamaludin </td>
          </tr>
          <tr>
            <td> Selasa , 31 Januari 2017</td>
            <td>Mengistall Linux Mint 18.1</td>
            <td> Aji Kamaludin </td>
          </tr>
          <tr>
            <td> Rabu , 1 Februari 2017</td>
            <td>Mengistall LAMP Server di Linux Mint 18.1</td>
            <td> Aji Kamaludin </td>
          </tr>
        </tbody>
      </table>
      </div>


    </div>
<?php
include 'view/footer.php';
?>