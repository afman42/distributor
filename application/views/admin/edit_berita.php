<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Data Berita
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Berita</h3>

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
                <form action="<?= site_url('admin/update_berita');?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id_berita" value="<?= $berita->id_berita_acara ?>">
                  <div class="form-group">
                    <input type="text" name="judul" class="form-control" placeholder="Masukan Judul" value="<?= $berita->judul ?>" required>
                  </div>
                  <div class="form-group">
                    <input type="text" name="tempat" class="form-control" placeholder="Masukan Tempat" value="<?= $berita->tempat ?>" required>
                  </div>
                  <div class="form-group">
                    <textarea name="berita" class="form-control" required placeholder="Masukan Berita"><?= $berita->berita ?></textarea>
                  </div>
                  <div class="form-group">
                    <select name="jenis_bencana" class="form-control" required>
                      <option value="">-- Pilih Jenis Bencana --</option>
                      <?php foreach ($bencana as $k) {?>
                        <option value="<?= $k->id_jenis_bencana ?>" <?php if($berita->jenis_bencana == $k->id_jenis_bencana) echo " selected" ?>><?= $k->nama_bencana ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="file" name="foto" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                  </div>
                </form>
              </div>
              <div class="col-md-6">
                <?php if(isset($berita)) {?>
                  <img src="<?= base_url().$berita->foto ?>" width="100" height="100">
                <?php } ?>
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