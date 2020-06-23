<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Donasi
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Donasi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <a href="<?= base_url('index.php/admin/tambah_donasi');?>" class="btn btn-primary" style="margin-bottom:10px;">Tambah</a>
          <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Deskripsi</th>
                  <th>Tanggal Donasi</th>
                  <th>Edit</th>
                  <th>Hapus</th>
                </tr>
              </thead>
              <tbody>
                  <?php 
                  $no = 1;
                  // var_dump($donasi);
                  foreach ($donasi as $data) {
                  ?>
                <tr>
                  <td><?= $no;?></td>
                  <td><?= $data->judul;?></td>
                  <td><?= $data->deskripsi;?></td>
                  <td><?= $data->tanggal_donasi;?></td>
                  <td><a href="<?= base_url('index.php/admin/edit_donasi/'.$data->id_donasi);?>" class="btn btn-sm btn-warning">Edit</a></td>
                  <td><a href="<?= base_url('index.php/admin/hapus_donasi/'.$data->id_donasi);?>" class="btn btn-sm btn-info">Hapus</a></td>
                  </tr>
                
                  <?php $no++;} ?>
              </tbody>
         </table>
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>