<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="form-data" class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php if ($data['url'] == "user"){ ?>
                    <th>Point</th>
                    <?php } ?>
                    <th>Alamat Surel</th>
                    <th>Akses</th>
                    <th>
                        <a href="<?=base_url?>admin/<?=$data['url']?>.php?aksi=tambah">
                            <button class="btn btn-primary"> <i class="fas fa-plus-circle"></i></button>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php while ($key = $data['value']->fetch_object()){ ?>
                <tr>
                    <td><?=$key->users_nama?></td>
                    <?php if ($data['url'] == "user"){ ?>
                    <td><?=number_format($key->points, 0, ',', '.')?></td>
                    <?php } ?>
                    <td><?=$key->email?></td>
                    <td><?=($key->role_id == "0")?'Admin':(($key->role_id == "1")?'Pemilik':'User')?></td>
                    <td>
                        <a href="<?=base_url?>admin/<?=$data['url']?>.php?aksi=edit&id=<?=$key->users_id?>">
                            <button class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <?php if ($key->users_id != $_SESSION['users_id']){ ?>
                        <button class="btn btn-danger" onclick="deleted('<?=$key->users_id?>')">
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
          $.post('<?=base_url?>admin/<?=$data['url']?>.php?aksi=hapus&id='+ID, 'id='+ID, function(data){
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