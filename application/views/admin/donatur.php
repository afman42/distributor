<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Akun Donatur
        
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Akun Donatur</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <a href="<?= base_url('index.php/admin/tambah_akun_donatur') ?>" style="margin-bottom:10px;" class="btn btn-primary">Tambah</a>
          <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Edit</th>
                  <th>Hapus</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php $no = 1; 
                  foreach ($akun as $data) {
                  ?>
                  <td><?= $no; ?></td>
                  <td><?= $data->nama; ?></td>
                  <td><?= $data->email; ?></td>
                  <td><a href="<?= base_url('index.php/admin/edit_donatur/'.$data->id_donatur);?>" class="btn btn-sm btn-warning">Edit</a></td>
                  <td><a href="<?= base_url('index.php/admin/hapus_donatur/'.$data->id_donatur);?>" class="btn btn-sm btn-info">Hapus</a></td>
                  <?php } ?>
                </tr>
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