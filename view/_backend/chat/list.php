<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="form-data" class="table">
            <thead>
                <tr>
                    <th width="15%">Pengirim</th>
                    <th width="35%">Isi Pesan</th>
                    <th width="10%">.
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while ($key = $data['value']->fetch_object()){ 
                ?>
                <tr>
                    <td><?=$key->users_nama?></td>
                    <td>
                        <small class="pull-right">
                            <?php echo date_format(date_create(substr($key->TanggalKirim,0,10)),"d-m-Y")." - ".substr($key->TanggalKirim,10). " WIB"; ?>
                        </small><br/>
									      <?php echo htmlspecialchars_decode($key->IsiPesan); ?>
                    </td>
                    <td>
                        <a href="<?=base_url?>admin/chat.php?aksi=reply&id=<?=$key->users_id?>&pesan_id=<?=$key->IdPesanMasuk?>">
                            <button class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Balas
                            </button>
                        </a>
                        <button class="btn btn-danger" onclick="deleted('<?=$key->IdPesanMasuk?>')">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
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
          $.post('<?=base_url?>admin/chat.php?aksi=hapus&id='+ID, 'chat_id='+ID, function(data){
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
</script>