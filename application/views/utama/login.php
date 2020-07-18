<?php $this->load->view('utama/header'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="margin-top:20px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Masuk Donasi</h3>
            </div>
            <div class="panel-body">
                <form action="<?= base_url('index.php/welcome/login');?>" method="post">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Masukan Email">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nohp" class="form-control" placeholder="Masukan No Handphone">
                        <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
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