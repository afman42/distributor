<!DOCTYPE html>
<html>
<head>
  <title>Cetak Donasi</title>
</head>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<body>
	<div style="margin-left:150px;">
		<h1>Dinsos Berdonasi</h1>
		<p>Jl. Sultan Syahrir No.3 (0561)732523 Pontianak 73116</p>
	</div>
	<hr>
	<p>Pada hari ini <?= date('d F Y'); ?> menyerahkan bantuan sosial</p>
	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?= $donatur->nama;?></td>
		</tr>
		<tr>
			<td>Jenis Donatur</td>
			<td>:</td>
			<td><?= $donatur->jenis_donatur;?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?= $donatur->alamat;?></td>
		</tr>
		<tr>
			<td>No Telepon</td>
			<td>:</td>
			<td><?= $donatur->nohp;?></td>
		</tr>
	</table>
	<p>Dengan ini yang bersangkutan diatas telah menyerahkan bantuan bencana alam kepada pihak dinsos berdonasi untuk penanggulangan bencan berupa</p>
	<div>
	  <table class="tg">
	  	<thead>
	  		<tr>
	  			<th class="tg-0lax">#</th>
	  			<th class="tg-0lax">Nama Barang</th>
	  			<th class="tg-0lax">Jumlah</th>
	  			<th class="tg-0lax">Keterangan</th>
	  		</tr>
	  	</thead>
	  	<tbody>
        <?php 
        $no=1; 
        if (!empty($masukan)) {
        ?>
	  		<?php foreach($masukan as $user){ ?>
	  		  <tr>
	  			<td><?php echo $no; ?></td>
	  			<td><?php echo $user->nama_barang; ?></td>
	  			<td><?php echo $user->jumlah; ?></td>
	  			<td><?php echo $user->keterangan; ?></td>
	  		  </tr>
	  		<?php $no++; ?>
        <?php }} else {?>
          <tr>
            <td colspan="5">Data Kosong</td>
          </tr>
        <?php } ?>
	  	</tbody>
	  </table>
	 </div>
	 <p>Demikian serah terima barang ini dibuat dengan sebenar - benarny</p>
</body>
</html>