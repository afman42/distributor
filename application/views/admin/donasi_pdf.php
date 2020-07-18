<!DOCTYPE html>
<html>
<head>
  <title>Cetak Donasi</title>
</head>
<body>
	<div id="outtable">
	  <table border="1">
	  	<thead>
	  		<tr>
	  			<th>#</th>
	  			<th>Nama</th>
	  			<th>Nama Barang</th>
	  			<th>Jumlah</th>
	  			<th>Keterangan</th>
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
	  			<td><?php echo $user->nama; ?></td>
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
</body>
</html>