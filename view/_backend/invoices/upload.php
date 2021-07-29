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
                            $statusPengiriman = "Belum dikirim";
                        }elseif ($data['value']->status_pengiriman == "1"){
                            $statusPengiriman = "Sudah dikirim";
                        }elseif ($data['value']->status_pengiriman == "2"){
                            $statusPengiriman = "Sudah diterima";
                        }
                    ?>
                    <b>Status Pengiriman:</b> <?=$statusPengiriman?><br>
                    <br/>
                    
                    <b>Bukti transfer:</b> 
                        <?php if ($data['value']->bukti_transaksi != ""){ ?>
                        <a href="#">Lihat bukti transfer</a>
                        <?php }?>
                    <br>
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
                                <th>Total:</th>
                                <td>Rp <?=number_format($data['value']->orders_totalharga, 0, ',', '.')?></td>
                            </tr>
                        </table>
                    </div>
                    <form action="<?=base_url?>admin/invoices.php?aksi=upload&id=<?=$data['value']->invoices_id?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">Nama Pengirim</div>
                            <div class="col-md-8">
                                <input type="text" name="bukti_nama_pengirim" class="form-control">
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-4">Bukti Transfer</div>
                            <div class="col-md-8">
                                <input type="file" name="bukti_transaksi" class="form-control">
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                
                                <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Upload bukti pembayaran</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.invoice -->
    </div><!-- /.col -->
</div>