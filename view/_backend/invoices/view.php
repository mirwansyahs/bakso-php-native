<div class="row">
    <div class="col-12">

        <!-- Main content -->
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-globe"></i> <?=base_name?>
                        <small class="float-right">Date: <?=date('d/m/Y')?></small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong><?=$data['dataCompany']->nama?></strong><br>
                        <?=$data['dataCompany']->alamat?><br>
                        Phone: <?=$data['dataCompany']->notelp?><br>
                        Email: <?=$data['dataCompany']->email?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong><?=$data['value']->orders_nama?></strong><br>
                        <?=$data['value']->orders_alamat?> <?=$data['value']->orders_kodepos?><br>
                        Phone: <?=$data['value']->orders_notelp?><br>
                        Email: <?=@$this->con->query("SELECT * FROM tb_pengguna WHERE users_id='".$data['value']->users_id."'")->fetch_object()->email?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #<?=$data['value']->invoices_id?></b><br>
                    <br>
                    <b>Order ID:</b> <?=$data['value']->orders_id?><br>
                    <b>Payment Due:</b> <?=date_format(date_create($data['value']->orders_date), 'd/M/Y')?><br>
                    <b>Voucher:</b> <?=($data['value']->voucher_kode == "")?'-':$data['value']->voucher_kode?><br>
                    <?php 
                        $statusPembayaran = "";
                        if ($data['value']->status == "unpaid"){
                          $statusPembayaran = "Belum dibayar";
                        }elseif ($data['value']->status == "paid"){
                          $statusPembayaran = "Sudah dibayar";
                        }elseif ($data['value']->status == "canceled"){
                          $statusPembayaran = "Dibatalkan";
                        }elseif ($data['value']->status == "expired"){
                          $statusPembayaran = "Kadaluarsa";
                        }
                    ?>
                    <b>Status Pembayaran:</b> <?=$statusPembayaran?><br>
                    <?php
                        $statusPengiriman = "";
                        if ($data['value']->status_pengiriman == "0"){
                            $statusPengiriman = "Belum dikirim penjual";
                        }elseif ($data['value']->status_pengiriman == "1"){
                            $statusPengiriman = "Sudah dikirim penjual";
                        }elseif ($data['value']->status_pengiriman == "2"){
                            $statusPengiriman = "Sudah diterima pembeli";
                        }
                    ?>
                    <b>Status Pengiriman:</b> <?=$statusPengiriman?><br>
                    <br/>
                    
                    <b>Bukti transfer:</b> 
                        <?php if ($data['value']->bukti_transaksi != ""){ ?>
                        <a href="<?=base_url?>assets/back/img/<?=$data['value']->bukti_transaksi?>" target="_BLANK">Lihat bukti transfer</a>
                        <?php }else{ ?>
                        Belum ada bukti transfer
                        <?php } ?>
                    <br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="10%">Qty</th>
                                <th>Product</th>
                                <th width="10%">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $dataOrder = $this->con->query("SELECT * FROM tb_pembelian_detail, tb_produk WHERE tb_pembelian_detail.orders_id='".$data['value']->orders_id."' AND tb_pembelian_detail.produk_id = tb_produk.produk_id");
                            while($key = $dataOrder->fetch_object()){
                            ?>
                            <tr>
                                <td width="10%"><?=$key->kuantitas?></td>
                                <td><?=$key->produk_nama?></td>
                                <td width="10%">
                                    <?php
                                        $price = $key->produk_harga;
                                        $total = $price * $key->kuantitas;

                                        echo number_format($total, 0, ',', '.');
                                    ?>
                                    
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <p class="lead">Payment Methods:</p>
                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        <?=ucwords($data['value']->tipe_pembayaran)?>
                        <br/>
                        <center>
                        <?=$data['dataCompany']->namabank?>
                        <br/>
                        <?=$data['dataCompany']->norek?>
                        <br/>
                        a/n
                        <br/>
                        <?=$data['dataCompany']->atasnama?>
                        </center>
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Amount Due <?=date_format(date_create($data['value']->orders_duedate), 'd/M/Y')?></p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Ongkos Kirim:</th>
                                <td>Rp 10.000</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>Rp <?=number_format($data['value']->orders_totalharga, 0, ',', '.')?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12">
                    <a onclick="(function(){print();})()" rel="noopener" target="_blank" class="btn btn-default"><i
                            class="fas fa-print"></i> Print</a>
                    
                    <?php if ($_SESSION['role_id'] == "0"){ ?>
                        <?php if ($data['value']->status == "unpaid"){ ?>
                            <a href="<?=base_url?>admin/invoices.php?aksi=pembayaran&status=paid&id=<?=$data['value']->invoices_id?>">
                                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Pembayaran diterima</button>
                            </a>
                        <?php } ?>
                        <?php if ($data['value']->status_pengiriman == "0"){ ?>
                            <a href="<?=base_url?>admin/invoices.php?aksi=pengiriman&status=1&id=<?=$data['value']->invoices_id?>">
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-plane"></i> Barang dikirim
                                </button>
                            </a>
                        <?php } ?>
                    <?php }elseif ($_SESSION['role_id'] == "2"){ ?>
                        <?php if ($data['value']->status == "unpaid"){ ?>
                            <?php if ($data['value']->bukti_nama_pengirim == ""){ ?>
                            <a href="<?=base_url?>admin/invoices.php?aksi=konfirmasi&id=<?=$data['value']->invoices_id?>">
                                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Upload bukti pembayaran</button>
                            </a>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($data['value']->status_pengiriman == "1"){ ?>
                            <a href="<?=base_url?>admin/invoices.php?aksi=pengiriman&status=2&id=<?=$data['value']->invoices_id?>">
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-plane"></i> Barang diterima
                                </button>
                            </a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- /.invoice -->
    </div><!-- /.col -->