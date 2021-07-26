<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="form-data" class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok </th>
                    <th>Gambar</th>
                    <th>
                        <a href="<?=base_url?>admin/produk.php?aksi=tambah">
                            <button class="btn btn-primary"> <i class="fas fa-plus-circle"></i></button>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php while ($key = $data['value']->fetch_object()){ ?>
                <tr>
                    <td><?=$key->produk_nama?></td>
                    <td><?=number_format($key->produk_harga, 0, ',', '.')?></td>
                    <td><?=$key->produk_stok?></td>
                    <td>
                      <?php if ($key->produk_image != ""){ ?>
                        <img src="<?=base_url?>assets/back/img/<?=$key->produk_image?>" class="img-size-50 img-circle mr-3">
                      <?php } ?>
                    </td>
                    <td>
                        <a href="<?=base_url?>admin/produk.php?aksi=edit&id=<?=$key->produk_id?>">
                            <button class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <!-- <a href="<?=base_url?>admin/produk.php?aksi=hapus&id=<?=$key->produk_id?>"> -->
                        <button class="btn btn-danger" onclick="deleted('<?=$key->produk_id?>')">
                            <i class="fas fa-trash"></i>
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
          $.post('<?=base_url?>admin/produk.php?aksi=hapus&id='+ID, 'personel_id='+ID, function(data){
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