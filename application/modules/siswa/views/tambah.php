<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1><?= $judul?></h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                <li class="breadcrumb-item active"><?= $judul?></li>
            </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="<?= base_url()?>" class="btn btn-secondary btn-sm">
                    <i class="fa fa-reply-all"></i> Back
                </a>
            </h3>

            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nik">NIK:</label>
                    <div class="input-group">
                        <input type="number" class="form-control <?= form_error('nik') ? 'is-invalid' : null?>" id="nik" name="nik" placeholder="Masukan NIK" value="<?= $this->input->post('nik')?>">
                    </div>
                    <span class="text-red"><?= form_error('nik')?></span>
                </div>
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <div class="input-group">
                        <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : null?>" id="nama" name="nama" placeholder="Masukan Harga Barang" value="<?= $this->input->post('nama')?>">
                    </div>
                    <span class="text-red"><?= form_error('nama')?></span>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <div class="input-group">
                        <textarea name="alamat" id="alamat" class="form-control <?= form_error('alamat') ? 'is-invalid' : null?>"" placeholder="Masukan Alamat" ><?= $this->input->post('alamat')?></textarea>
                    </div>
                    <span class="text-red"><?= form_error('alamat')?></span>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <div class="input-group">
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control <?= form_error('jenis_kelamin') ? 'is-invalid' : null ?>">
                            <option value="">--Select--</option>
                            <option value="laki-laki" <?= set_value('jenis_kelamin') == 'laki-laki' ? 'selected' : null ?> >Laki-Laki</option>
                            <option value="perempuan" <?= set_value('jenis_kelamin') == 'perempuan' ? 'selected' : null ?>>Perempuan</option>
                        </select>
                    </div>
                    <span class="text-red"><?= form_error('jenis_kelamin')?></span>
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir:</label>
                    <div class="input-group">
                        <input type="date" class="form-control <?= form_error('tgl_lahir') ? 'is-invalid' : null?>" id="tgl_lahir" name="tgl_lahir" placeholder="Masukan Harga Barang" value="<?= $this->input->post('tgl_lahir')?>">
                    </div>
                    <span class="text-red"><?= form_error('tgl_lahir')?></span>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-check"></i> Submit
                </button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->