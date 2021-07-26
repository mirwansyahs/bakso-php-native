<div class="row justify-content-md-center">
    <div class="col-md-8 ">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">General</h3>
                    
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <p class="card-text">Pastikan Anda Telah Melakukan pembayaran untuk mengupload bukti pembayaran</p>
            </div>
            <div class="card-body">
                <form action="<?=base_url?>admin/produk.php?aksi=tambah&proses=add" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group row">
                                <label for="inputGambar" class="col-md-4">Upload Gambar</label>
                                <input type="file" id="inputGambar" class="form-control col-md-7" name="produk_image" required>
                            </div>
                            <div class="form-group row">
                                <label for="inputNproduk" class="col-md-4">Nama Pengirim di Rekening bank</label>
                                <input type="text" id="inputNproduk" class="form-control col-md-7" name="produk_nama" required>
                            </div>
                            <div class="form-group row">
                                <label for="rupiah" class="col-md-4">Transfer Dari Bank</label>
                                <select class="custom-select form-control-border col-md-7" id="exampleSelectBorder">
                                        <option>Pilih</option>
                                        <option>BRI</option>
                                        <option>BNI</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="inputStok" class="col-md-4">Masukan Nomor Rekening Anda</label>
                                <input type="number" id="inputStok" class="form-control col-md-7" name="produk_stok" required>
                            </div>
                            <div class="form-group row">
                                <label for="rupiah" class="col-md-4">Transfer Ke Bank</label>
                                <select class="custom-select form-control-border col-md-7" id="exampleSelectBorder">
                                        <option>Pilih</option>
                                        <option>BRI</option>
                                        <option>BNI</option>
                                </select>
                            </div>
                           
                        </div>

                       
                    </div>

                    <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a onclick="(function(){history.back()})()" class="btn btn-secondary">Cancel</a>
                <input type="submit" name="simpan" value="Entry Data" class="btn btn-success float-right">
            </div>
        </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#rupiah').on('keyup', function(){
            this.value = formatRupiah(this.value, '');
        })
    });
    function formatRupiah(angka, prefix){

        var number_string = angka.replace(/[^,\d]/g, '').toString(),

        split       = number_string.split(','),

        sisa        = split[0].length % 3,

        rupiah        = split[0].substr(0, sisa),

        ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan){

            separator = sisa ? '.' : '';

            rupiah += separator + ribuan.join('.');

        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');

    }
</script>