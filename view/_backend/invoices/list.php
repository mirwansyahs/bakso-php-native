<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="form-data" class="table">
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
                <?php while ($key = $data['value']->fetch_object()){ ?>
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
    <!-- /.card-body -->
</div>
<!-- /.card -->
<!-- DataTables  & Plugins -->
<script src="<?=base_url?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?=base_url?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
  $(function () {
    $("#form-data").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#form-data_wrapper .col-md-6:eq(0)');
  });
</script>