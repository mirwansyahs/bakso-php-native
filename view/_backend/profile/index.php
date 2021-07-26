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
              class="fas fa-user-edit"></i>Edit Profile</p></a>

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
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#semua" data-toggle="tab">Semua</a></li>
          <li class="nav-item"><a class="nav-link" href="#belum" data-toggle="tab">Belum Bayar</a></li>
          <li class="nav-item"><a class="nav-link" href="#dikemas" data-toggle="tab">Dikemas</a></li>
          <li class="nav-item"><a class="nav-link" href="#dikirim" data-toggle="tab">Dikirim</a></li>
          <li class="nav-item"><a class="nav-link" href="#selesai" data-toggle="tab">Selesai</a></li>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">

        <div class="tab-content">
          <div class="active tab-pane" id="semua">

            <table class="table">
              <thead>
                <tr>
                  <th>Invoice</th>
                  <th>Nama</th>
                  <th>Nominal</th>
                  <th>Kadaluarsa</th>
                  <th>Bukti Transfer</th>
                  <th>Status Pembayaran</th>
                  <th>Status Pengiriman</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($key = $data['invoiceSemua']->fetch_object()){ ?>
                <tr>
                  <td><?=$key->invoices_id?></td>
                  <td><?=$key->orders_nama?></td>
                  <td><?=number_format($key->orders_totalharga, 0, ',', '.')?></td>
                  <td><?=date_format(date_create($key->orders_duedate), "d-m-Y H:i:s")?></td>
                  <td>
                    <?php
                          if ($key->bukti_nama_pengirim == ""){
                            echo "Belum ada";
                          }else{
                            echo "Sudah ada";
                          }
                        ?>
                  </td>
                  <td>
                    <?php
                          $statusPembayaran = "";
                          if ($key->status == "unpaid"){
                            $statusPembayaran = "Belum dibayar";
                          }elseif ($key->status == "paid"){
                            $statusPembayaran = "Sudah dibayar";
                          }elseif ($key->status == "canceled"){
                            $statusPembayaran = "Dibatalkan";
                          }elseif ($key->status == "expired"){
                            $statusPembayaran = "Kadaluarsa";
                          }

                          echo $statusPembayaran;
                        ?>
                  </td>
                  <td>
                    <?php
                          $statusPengiriman = "";
                          if ($key->status_pengiriman == "0"){
                            $statusPengiriman = "Belum dikirim penjual";
                          }elseif ($key->status_pengiriman == "1"){
                            $statusPengiriman = "Sudah dikirim penjual";
                          }elseif ($key->status_pengiriman == "2"){
                            $statusPengiriman = "Sudah diterima pembeli";
                          }

                          echo $statusPengiriman;
                        ?>
                  </td>
                  <td>
                    <a href="<?=base_url?>admin/invoices.php?aksi=view&id=<?=$key->invoices_id?>">
                      <button class="btn btn-primary">
                        <i class="fas fa-eye"></i>
                      </button>
                    </a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="belum">
            <table class="table">
              <thead>
                <tr>
                  <th>Invoice</th>
                  <th>Nama</th>
                  <th>Nominal</th>
                  <th>Kadaluarsa</th>
                  <th>Bukti Transfer</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($value = $data['invoiceBelumBayar']->fetch_object()){ ?>
                <tr>
                  <td><?=$value->invoices_id?></td>
                  <td><?=$value->orders_nama?></td>
                  <td><?=number_format($value->orders_totalharga, 0, ',', '.')?></td>
                  <td><?=date_format(date_create($value->orders_duedate), "d-m-Y H:i:s")?></td>
                  <td>
                    <?php
                          if ($value->bukti_nama_pengirim == ""){
                            echo "Belum ada";
                          }else{
                            echo "Sudah ada";
                          }
                        ?>
                  </td>
                  <td>
                    <a href="<?=base_url?>admin/invoices.php?aksi=view&id=<?=$value->invoices_id?>">
                      <button class="btn btn-primary">
                        <i class="fas fa-eye"></i>
                      </button>
                    </a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="dikemas">
            <table class="table">
              <thead>
                <tr>
                  <th>Invoice</th>
                  <th>Nama</th>
                  <th>Nominal</th>
                  <th>Kadaluarsa</th>
                  <th>Bukti Transfer</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($value = $data['invoiceDikemas']->fetch_object()){ ?>
                <tr>
                  <td><?=$value->invoices_id?></td>
                  <td><?=$value->orders_nama?></td>
                  <td><?=number_format($value->orders_totalharga, 0, ',', '.')?></td>
                  <td><?=date_format(date_create($value->orders_duedate), "d-m-Y H:i:s")?></td>
                  <td>
                    <?php
                          if ($value->bukti_nama_pengirim == ""){
                            echo "Belum ada";
                          }else{
                            echo "Sudah ada";
                          }
                        ?>
                  </td>
                  <td>
                    <a href="<?=base_url?>admin/invoices.php?aksi=view&id=<?=$value->invoices_id?>">
                      <button class="btn btn-primary">
                        <i class="fas fa-eye"></i>
                      </button>
                    </a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="tab-pane" id="dikirim">
            <table class="table">
              <thead>
                <tr>
                  <th>Invoice</th>
                  <th>Nama</th>
                  <th>Nominal</th>
                  <th>Kadaluarsa</th>
                  <th>Bukti Transfer</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($value = $data['invoiceDikirim']->fetch_object()){ ?>
                <tr>
                  <td><?=$value->invoices_id?></td>
                  <td><?=$value->orders_nama?></td>
                  <td><?=number_format($value->orders_totalharga, 0, ',', '.')?></td>
                  <td><?=date_format(date_create($value->orders_duedate), "d-m-Y H:i:s")?></td>
                  <td>
                    <?php
                          if ($value->bukti_nama_pengirim == ""){
                            echo "Belum ada";
                          }else{
                            echo "Sudah ada";
                          }
                        ?>
                  </td>
                  <td>
                    <a href="<?=base_url?>admin/invoices.php?aksi=view&id=<?=$value->invoices_id?>">
                      <button class="btn btn-primary">
                        <i class="fas fa-eye"></i>
                      </button>
                    </a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="tab-pane" id="selesai">
            <table class="table">
              <thead>
                <tr>
                  <th>Invoice</th>
                  <th>Nama</th>
                  <th>Nominal</th>
                  <th>Kadaluarsa</th>
                  <th>Bukti Transfer</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($value = $data['invoiceSelesai']->fetch_object()){ ?>
                <tr>
                  <td><?=$value->invoices_id?></td>
                  <td><?=$value->orders_nama?></td>
                  <td><?=number_format($value->orders_totalharga, 0, ',', '.')?></td>
                  <td><?=date_format(date_create($value->orders_duedate), "d-m-Y H:i:s")?></td>
                  <td>
                    <?php
                          if ($value->bukti_nama_pengirim == ""){
                            echo "Belum ada";
                          }else{
                            echo "Sudah ada";
                          }
                        ?>
                  </td>
                  <td>
                    <a href="<?=base_url?>admin/invoices.php?aksi=view&id=<?=$value->invoices_id?>">
                      <button class="btn btn-primary">
                        <i class="fas fa-eye"></i>
                      </button>
                    </a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
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