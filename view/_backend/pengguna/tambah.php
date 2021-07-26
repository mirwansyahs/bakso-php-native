<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">General</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="<?=base_url?>admin/<?=$data['url']?>.php?aksi=tambah&proses=add" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="inputNDepan" class="col-md-4">Nama</label>
                                <input type="text" id="inputNDepan" class="form-control col-md-7" name="users_nama"
                                    required>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-md-4">Alamat Surel</label>
                                <input type="text" id="inputEmail" class="form-control col-md-7" name="email" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-md-4">Katasandi</label>
                                <input type="password" id="inputPassword" class="form-control col-md-7" name="password"
                                    required>
                            </div>
                            <div class="form-group row">
                                <label for="inputAkses" class="col-md-4">Akses</label>
                                <select name="role_id" class="form-control col-md-7">
                                    <?php $arr = ['Admin', 'Pemilik', 'User']; ?>
                                    <?php for ($i = 0; $i < count($arr); $i++){ ?>
                                    <option value="<?=$i?>"><?=$arr[$i]?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                    </div>

                    <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a onclick="(function(){history.back()})()" class="btn btn-secondary">Cancel</a>
                <input type="submit" name="simpan" value="Entry Data" class="btn btn-success float-right">
            </div>
        </div>
        </form>
    </div>
</div>

<?php



?>