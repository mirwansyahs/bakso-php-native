<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="form-data" class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php if ($_SESSION['role_id'] != "2"){ ?>
                    <th>Kode</th>
                    <?php } ?>
                    <th>Nominal</th>
                    <th>Harga</th>
                    <th>Kadaluarsa</th>
                    <th>
                        <?php if ($_SESSION['role_id'] != "2"){ ?>
                        <a href="<?=base_url?>admin/voucher.php?aksi=tambah">
                            <button class="btn btn-primary"> <i class="fas fa-plus-circle"></i></button>
                        </a>
                        <?php } ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php while ($key = $data['value']->fetch_object()){ ?>
                <tr>
                    <td><?=$key->voucher_nama?></td>
                    <?php if ($_SESSION['role_id'] != "2"){ ?>
                    <td><?=$key->voucher_kode?></td>
                    <?php } ?>
                    <td><?=number_format($key->voucher_nominal, 0, ',', '.')?></td>
                    <td><?=number_format($key->voucher_harga, 0, ',', '.')?> Points</td>
                    <td><?=date_format(date_create($key->voucher_expired), "d-m-Y H:i:s")?></td>
                    <td>
                      
                    <?php if ($_SESSION['role_id'] == "2"){ 
                        if ($data['dataUsers']->points >= $key->voucher_harga){  
                    ?>
                        <button class="btn btn-warning" onclick="buyVoc('<?=$key->voucher_id?>')">
                            <i class="fas fa-dollar-sign"></i> Tukar voucher
                        </button>
                      <?php }else{ ?>
                        <a href="#">
                            <button class="btn btn-danger">
                                <i class="fas fa-dollar-sign"></i> Points tidak cukup
                            </button>
                        </a>
                      <?php } ?>
                    <?php }else{ ?>
                        <a href="<?=base_url?>admin/voucher.php?aksi=edit&id=<?=$key->voucher_id?>">
                            <button class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <button class="btn btn-danger" onclick="deleted('<?=$key->voucher_id?>')">
                            <i class="fas fa-trash"></i>
                        </button>
                    <?php } ?>
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


  function deleted(ID = 0){
      Swal.fire({
        title: 'Apakah anda yakin ingin menghapus data ini?',
        text: "Kamu tidak dapat mengembalikan data yang telah dihapus.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, saya yakin!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.post('<?=base_url?>admin/voucher.php?aksi=hapus&id='+ID, 'id='+ID, function(data){
            data = JSON.parse(data);
            if (data.succ == "1"){
              Swal.fire(
                'Sudah terhapus!',
                'Data sudah berhasil dihapus.',
                'success'
              )
              setInterval(function(){ 
                location.reload();
                }, 1000
              );
            }else{
              Swal.fire(
                'Gagal!',
                'Data tidak berhasil dihapus.',
                'error'
              )
            }
          })
          
        }
      })
    }    
    
  function buyVoc(ID = 0){
      Swal.fire({
        title: 'Apakah anda yakin ingin membeli voucher ini?',
        text: "Kamu tidak dapat mengembalikan points yang telah digunakan.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, saya yakin!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.post('<?=base_url?>admin/voucher.php?aksi=buy&id='+ID, 'id='+ID, function(data){
            data = JSON.parse(data);
            if (data.succ == "1"){
              Swal.fire(
                'Sudah terbeli!',
                'Voucher sudah berhasil dibeli.',
                'success'
              )
              setInterval(function(){ 
                location.reload();
                }, 1000
              );
            }else{
              Swal.fire(
                'Gagal!',
                'Voucher tidak berhasil dibeli.',
                'error'
              )
            }
          })
          
        }
      })
    }    
</script>