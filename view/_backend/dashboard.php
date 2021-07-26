<!-- Default box -->
<div class="card">
  <div class="card-header">
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
        <div class="row">
          <div class="col-12 col-sm-4">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-muted">Total Point</span>
                <span class="info-box-number text-center text-muted mb-0"><?=number_format($data['dataUsers']->points, 0, ",", ".")?></span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-muted">Total Transaksi</span>
                <span class="info-box-number text-center text-muted mb-0"><?=$data['dataInvoices']->num_rows?></span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-muted">Jumlah Transaksi Berhasil</span>
                <span class="info-box-number text-center text-muted mb-0"><?=$data['dataInvoicesBerhasil']->num_rows?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h4>Aktifitas Terbaru</h4>
            <?php
            while ($key = $data['dataInvoicesBerhasil']->fetch_object()){
              $dataProduk = $this->con->query("SELECT * FROM tb_pembelian_detail, tb_produk WHERE tb_pembelian_detail.produk_id = tb_produk.produk_id AND tb_pembelian_detail.orders_id = '".$key->orders_id."'");
              while ($value = $dataProduk->fetch_object()){
            ?>
            <div class="post">
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="<?=base_url?>assets/back/img/<?=$value->produk_image?>" alt="user image">
                <span class="username">
                  <a href="#"><?=($key->users_id == $data['dataUsers']->users_id)?'Anda':'User '.$this->con->query("SELECT * FROM tb_pengguna WHERE users_id='".$key->users_id."'")->fetch_object()->users_nama?> Membeli <?=$value->produk_nama?>.</a>
                </span>
                <span class="description">Shared publicly - <?=date_format(date_create($key->orders_date), "d/m/Y")?></span>
              </div>
              <!-- /.user-block -->
              <p>
                <?=$value->produk_nama?> dengan jumlah <?=$value->kuantitas?>
              </p>

              <p>
                <a href="<?=base_url?>admin/grid.php" class="link-black text-sm"><i class="fas fa-link mr-1"></i>Beli Lagi</a>
              </p>
            </div>
            <?php } 
            }?>
          </div>

        </div>
      </div>

    </div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->