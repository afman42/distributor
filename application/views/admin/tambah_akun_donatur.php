<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Data Akun Donatur
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Akun Donatur</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
              <div class="col-md-6">
                <form action="<?= base_url('index.php/admin/tambah_akun_donatur');?>" method="post">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Silakan Email">
                          <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" placeholder="Silakan Isi Nama">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nohp" class="form-control" placeholder="Silakan No Handphone">
                          <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select name="jenis_donatur" class="form-control">
                          <option value="individual">individual</option>
                          <option value="organisasi">organisasi</option>
                        </select>
                        <?= form_error('jenis_donatur', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <textarea name="alamat" class="form-control"></textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
              </div>
          </div>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>