<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">General</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="<?=base_url?>admin/voucher.php?aksi=edit&proses=update&id=<?=$data['value']->voucher_id?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group row">
                                <label for="inputNDepan" class="col-md-4">Nama</label>
                                <input type="text" id="inputNDepan" class="form-control col-md-7" name="voucher_nama"
                                    required value="<?=$data['value']->voucher_nama?>">
                            </div>
                            <div class="form-group row">
                                <label for="rupiah" class="col-md-4">Nominal</label>
                                <input type="text" id="rupiah" class="form-control col-md-7" name="voucher_nominal"
                                    required value="<?=number_format($data['value']->voucher_nominal, 0, ',', '.')?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="rupiah1" class="col-md-4">Harga</label>
                                <input type="text" id="rupiah1" class="form-control col-md-7" name="voucher_harga" value="<?=number_format($data['value']->voucher_harga, 0, ',', '.')?>"
                                    required>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-md-4">Kadaluarsa</label>
                                <input type="date" id="inputEmail" class="form-control col-md-7" name="voucher_expired" required value="<?=date_format(date_create($data['value']->voucher_expired), "Y-m-d")?>">
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
        $('#rupiah, #rupiah1').on('keyup', function(){
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