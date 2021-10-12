<?=$this->extend('layouts/dashboard/layout')?>

<?=$this->section('custom-css')?>
<!-- DataTables -->
<link rel="stylesheet" href="<?=site_url('themes/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?=site_url('themes/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?=site_url('themes/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')?>">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="<?=site_url('themes/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">
<?=$this->endSection()?>

<?=$this->section('content')?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#modal-add-berita-acara">
                            <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Data
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" id="btn-delete-multiple">
                            <i class="fas fa-trash"></i>&nbsp;&nbsp;Hapus banyak
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="data-berita-acara" class="table table-bordered table-hover table-sm" width="100%">
                            <thead>
                                <tr>
                                    <th><div class="text-center"><input id="checkAll" type="checkbox" name="multi_delete"></div></th>
                                    <th class="text-center">No.</th>
                                    <th>Nomor</th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Pihak 1</th>
                                    <th>Pihak 2</th>
                                    <th>Tanggal Dibuat</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<?php echo view($moduleViewPath.'add') ?>

<?=$this->endSection()?>

<?php echo view($moduleViewPath.'custom_js') ?>