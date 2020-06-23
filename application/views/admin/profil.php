<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Profil
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Akun Profil</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <?= $this->session->flashdata('message');?>

         <form action="<?= base_url('index.php/admin/profil');?>" method="post">
                <div class="form-group">
                  <label >Password</label>
                  <input type="password" name="new_password" class="form-control" placeholder="Masukan Password">
                  <?= form_error('new_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label >Konfirmasi Password</label>
                  <input type="password" name="repeat_password" class="form-control" placeholder="Masukan Konfirmasi Password">
                  <?= form_error('repeat_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>