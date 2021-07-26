<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          <!-- <i class="fas fa-user-circle" style="font-size: 68px;"></i> -->
          <!-- ini gambar aslinya -->
          <img class="profile-user-img img-fluid img-circle"
            src="<?=base_url?>assets/back/img/<?=($data['value']->image == "")?'avatar5.png':$data['value']->image?>"
            alt="User profile picture">

        </div>

        <h3 class="profile-username text-center"><?=$data['value']->users_nama?></h3>

        <p class="text-muted text-center"><a href="<?=base_url?>admin/profile.php?aksi=edit" class=""><i
              class="fas fa-user-edit"></i> Edit Profile</p></a>

        <ul class="list-group list-group-unbordered mb-3 text-center ">
          <li class="list-group-item">
            <i class="far fa-list-alt"></i><b> <a href="<?=base_url?>admin/profile.php">Pesanan Saya</a></b>
          </li>
          <li class="list-group-item">
            <i class="fas fa-archive"></i> <b><a class=""
                href="<?=base_url?>admin/profile.php?aksi=voucher">Voucher</a></b>
          </li>

        </ul>


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- About Me Box -->

    <!-- /.card -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="card">
      <div class="card-header p-2 md-9">
        <div class="row">
          <div class="col-md-12">
            <h2>Profile Saya</h2>
            Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun
          </div>
        </div>
      </div><!-- /.card-header -->
      <div class="card-body">
        <form action="<?=base_url?>admin/profile.php?aksi=edit" method="POST" enctype="multipart/form-data">
          <div class="form-group row justify-content-center">
            <div class="text-center">
              <!-- <i class="fas fa-user-circle" style="font-size: 88px;"></i> -->
              <!-- ini gambar aslinya -->
              <img class="profile-user-img img-fluid img-circle"
                src="<?=base_url?>assets/back/img/<?=($data['value']->image == "")?'avatar5.png':$data['value']->image?>"
                alt="User profile picture">

            </div>
          </div>
          <div class="form-group row justify-content-center">
            <div class="custom-file col-sm-3">
              <input type="file" class="custom-file-input" name="image" id="inputGroupFile04"
                aria-describedby="inputGroupFileAddon04">
              <label class="custom-file-label" for="inputGroupFile04">Upload Foto</label>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email"
                value="<?=$data['value']->email?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputNama" placeholder="Name" name="users_nama"
                value="<?=$data['value']->users_nama?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="inputAlamat" placeholder="Alamat"
                name="alamat" required><?=@$data['value']->alamat?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputNotelp" class="col-sm-2 col-form-label">Nomor Telepon</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="inputNotelp" placeholder="Nomor Telepon" name="nomortelp"
                value="<?=@$data['value']->nomortelp?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputTempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputTempatLahir" placeholder="Tempat Lahir"
                name="tempat_lahir" value="<?=@$data['value']->tempat_lahir?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputTanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="inputTanggalLahir" placeholder="dd/mm/yy" name="tanggal_lahir"
                value="<?=$data['value']->tanggal_lahir?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputKodePos" class="col-sm-2 col-form-label">Kode Pos</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputKodePos" placeholder="Kode Pos" name="kode_pos"
                value="<?=@$data['value']->kode_pos?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
            </div>
          </div>

          <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
              <button type="submit" class="btn btn-danger float-right">Submit</button>
            </div>
          </div>

        </form>
        <!-- /.tab-content -->

        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
</div>
</div>
</div>
</div>