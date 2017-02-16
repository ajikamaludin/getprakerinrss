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
      <div class="col m12">
        <h4>Forum</h4>
          <blockquote>
            <p>Bagikan Masalah Anda Di Sini</p>
          </blockquote>
        </div>
      <div class="row"></div>
        <div class="row">
          <h5>Hit's Issue</h5>
          <hr>
          <table class="striped" >
          <tr>
            <td>
            <a href="forum_detail.php">
              <h6 style="font-weight: bold;font-size: 17px" >
                Ini Masalah 1
              </h6>
            </a>
            <p>
              Ini Diskripsi isi dari disripsi percobaan percobaan in in in in in in 
            </p>
            <p>
              Si Pengguna<br>
              pada: 2017-20-20
            </p>
            </td>
          </tr>
          </table>
          <div class="row" ></div>
        <div class="row">
          <h5> New Issue</h5>
          <hr>
          <table class="striped" >
          <tr>
            <td>
            <a href="forum.php?">
              <h6 style="font-weight: bold;font-size: 17px" >
                Ini Masalah 1
              </h6>
            </a>
            <p>
              Ini Diskripsi isi dari disripsi percobaan percobaan in in in in in in 
            </p>
            <p>
              Si Pengguna<br>
              pada: 2017-20-20
            </p>
            </td>
          </tr>
          <tr>
            <td>
            <a href="forum.php?">
              <h6 style="font-weight: bold;font-size: 17px" >
                Ini Masalah 1
              </h6>
            </a>
            <p>
              Ini Diskripsi isi dari disripsi percobaan percobaan in in in in in in 
            </p>
            <p>
              Si Pengguna<br>
              pada: 2017-20-20
            </p>
            </td>
          </tr>
          <tr>
            <td>
            <a href="forum.php?">
              <h6 style="font-weight: bold;font-size: 17px" >
                Ini Masalah 1
              </h6>
            </a>
            <p>
              Ini Diskripsi isi dari disripsi percobaan percobaan in in in in in in 
            </p>
            <p>
              Si Pengguna<br>
              pada: 2017-20-20
            </p>
            </td>
          </tr>
          </table>


          <div class="fixed-action-btn horizontal">
            <a class="btn-floating btn-large red">
              <i class="large material-icons">reorder</i>
            </a>
            <ul>
              <li><a href="forum_notif.php" class="btn-floating blue tooltipped" data-position="top" data-delay="50" data-tooltip=" Pemberitahuan "><i class="material-icons">message</i></a></li>
              <li><a href="forum_tambah.php" class="btn-floating red tooltipped" data-position="top" data-delay="50" data-tooltip=" Tambah Issue Baru "><i class="material-icons">mode_edit</i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
<?php
include 'view/footer.php';
?>