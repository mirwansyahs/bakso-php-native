<div class="card-body">
    <form action="<?=base_url?>admin/keranjang.php?aksi=checkout" method="POST">

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Note:</h5>
                            Periksa kembali barang yang akan anda beli sebelum melakukan pembayaran
                        </div>


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
                                        <strong><?=$data['dataUsers']->users_nama?></strong><br>
                                        <?=$data['dataUsers']->alamat?><br>
                                        Phone: <?=$data['dataUsers']->nomortelp?><br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Invoice #</b><br>
                                    <br>
                                    <b>Order ID:</b> #<br>
                                    <b>Payment Due:</b> <?=date('d/m/Y')?><br>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table id="form-data" class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Produk</th>
                                                <th>Harga </th>
                                                <th>Gambar </th>
                                                <th>Qty </th>
                                                <th>Total </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                // var_dump($_SESSION['cart']);
                                                for ($i =0; $i < count(@$_SESSION['cart']); $i++){ 
                                                    $dataProduk = $this->con->query("SELECT * FROM tb_produk WHERE produk_id='".$_SESSION['cart'][$i]['produk_id']."'")->fetch_object();
                                                    
                                            ?>
                                            <tr>
                                                <td><?=$i+1?> </td>
                                                <td><?=$dataProduk->produk_nama?></td>
                                                <td><?=number_format($dataProduk->produk_harga, 0, ',', '.')?></td>
                                                <?php if ($dataProduk->produk_image != ""){ ?>
                                                <td><img src="<?=base_url?>assets/back/img/<?=$dataProduk->produk_image?>"
                                                        class="img-size-50 img-circle mr-3"></td>
                                                <?php } ?>
                                                <td><?=$_SESSION['cart'][$i]['kuantitas']?></td>
                                                <td><?=number_format($_SESSION['cart'][$i]['total'], 0, ',', '.')?></td>
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
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="tipe_pembayaran">Metode Pembayaran</label>
                                        </div>

                                        <div class="col-md-6">
                                            <select name="tipe_pembayaran" class="form-control" id="tipe_pembayaran">
                                                <?php $arr = array('transfer', 'cod');?>
                                                <?php for ($i = 0; $i < count($arr); $i++){ ?>
                                                    <option value="<?=$arr[$i]?>"><?=strtoupper($arr[$i])?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="inputVoucher">Kode Voucher</label>
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="voucher_kode" id="inputVoucher" onblur="getVoucher()" onkeyup="getVoucher()">
                                        </div>
                                    </div>

                                </div>
                                <!-- /.col -->
                                <div class="col-6">

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td><?=number_format($_SESSION['cartAll']['totalBiaya'], 0, ',', '.')?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Potongan :</th>
                                                <td id="potonganBiaya">0</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td class="totalBiaya"><?=number_format($_SESSION['cartAll']['totalBiaya'], 0, ',', '.')?>
                                                </td>
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
                                    <button type="submit" class="btn btn-primary float-right">
                                        <i class="far fa-credit-card"></i> 
                                            Checkout
                                            <span class="totalBiaya"><?=number_format($_SESSION['cartAll']['totalBiaya'], 0, ',', '.')?></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
</div>
</form>
<script>
    function getVoucher(){
        // alert($('#inputVoucher').val());
        $.post("<?=base_url?>admin/keranjang.php?aksi=getVoucher&id="+$('#inputVoucher').val(), 'time=<?=time()?>', function(data){
            data = JSON.parse(data);
            if (data.succ == 1){
                $('#potonganBiaya').html(data.voucher_nominal);
                $('.totalBiaya').html(data.totalBiaya);
            }else{
                $('#potonganBiaya').html(data.voucher_nominal);
                $('.totalBiaya').html(data.totalBiaya);
            }
        });
    };
</script>