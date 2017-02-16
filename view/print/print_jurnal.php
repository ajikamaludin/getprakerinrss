<?php
include 'print_function.php';

$email =$_GET['email'];
$posts = tampil_post_by_asc($email,'500');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jurnal_prakerin</title>
    <link href="<?= ACCESS_FROM ?>/asset/bootstrap/css/bootstrap.css" rel="stylesheet">

  </head>
  <body>
  <div class="container">
  <div class="row">
  <div class="col-md-10">
  <h3>Jurnal Prakerin</h3>
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Hari/Tanggal</th>
			<th>Kegiatan</th>
			<th>Publikasi</th>
			<th>Pengesahan DU/DI</th>
		</tr>
		<?php
		$i = 1;
          foreach($posts as $post){
        ?>
		<tr>
			<th><?= $i ?></th>
			<th><?= format_tgl($post['tgl_post'])?> </th>
			<th><?= $post['judul_post']?> </th>
			<th><?= $post['url_post']?></th>
			<th></th>
		</tr>
		<?php
		$i++;
          }
        ?>
	</table>
	</div>
	</div>
	</div>
  </body>
</html>