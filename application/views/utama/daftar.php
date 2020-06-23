<?php $this->load->view('utama/header'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="margin-top:20px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar Donasi</h3>
            </div>
            <div class="panel-body">
                <form action="<?= base_url('index.php/welcome/daftar');?>" method="post">
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
                      <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                      <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Masukan password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Masuk" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<?php $this->load->view('utama/footer'); ?>