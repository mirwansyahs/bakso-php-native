<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          <!-- <i class="fas fa-user-circle" style="font-size: 68px;"></i> -->
          <!-- ini gambar aslinya -->
          <img class="profile-user-img img-fluid img-circle"
            src="<?=base_url?>assets/back/img/<?=($data['value']->image == "")?'avatar5.png':$data['value']->image?>"
            alt="User profile picture">

        </div>

        <h3 class="profile-username text-center"><?=$data['value']->users_nama?></h3>

        <p class="text-muted text-center"><a href="<?=base_url?>admin/profile.php?aksi=edit" class=""><i
              class="fas fa-user-edit"></i>Edit Profile</p></a>

        <ul class="list-group list-group-unbordered mb-3 text-center ">
          <li class="list-group-item">
            <i class="far fa-list-alt"></i><b> <a href="<?=base_url?>admin/profile.php">Pesanan Saya</a></b>
          </li>
          <li class="list-group-item">
            <i class="fas fa-archive"></i> <b><a class=""
                href="<?=base_url?>admin/profile.php?aksi=voucher">Voucher</a></b>
          </li>

        </ul>


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- About Me Box -->

    <!-- /.card -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <?php
            while ($key = $data['dataVoucher']->fetch_object()){
            ?>
          <div class="col-md-4">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
                <?=$key->voucher_nama?>
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-9">
                    <?php
                      $waktuawal  = date_create($key->voucher_expired); //waktu di setting

                      $waktuakhir = date_create(); //2019-02-21 09:35 waktu sekarang
                      
                      $diff  = date_diff($waktuawal, $waktuakhir);
                      ?>
                    <h2 class="lead"><b>Berakhir dalam : <?=$diff->d?> hari</b></h2>

                  </div>

                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  <input type="hidden" id="voucher_kode<?=$key->voucher_id?>" value="<?=$key->voucher_kode?>">
                  <button class="btn btn-sm btn-primary" id="copyText<?=$key->voucher_id?>"
                    value="<?=$key->voucher_id?>">
                    <i class="fas fa-key"></i> <?=$key->voucher_kode?>
                  </button>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
          </div>

          <script>
            $('#copyText<?=$key->voucher_id?>').click(function () {
              let forms = $("#voucher_kode<?=$key->voucher_id?>");
              copyTextToClipboard(forms.val());
              alert("Copied the text: " + forms.val());
            })
          </script>
          <?php } ?>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function copyTextToClipboard(text) {
    var textArea = document.createElement("textarea");

    textArea.style.position = 'fixed';
    textArea.style.top = 0;
    textArea.style.left = 0;
    textArea.style.width = '2em';
    textArea.style.height = '2em';
    textArea.style.padding = 0;
    textArea.style.border = 'none';
    textArea.style.outline = 'none';
    textArea.style.boxShadow = 'none';
    textArea.style.background = 'transparent';
    textArea.value = text;
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    try {
      var successful = document.execCommand('copy');
      var msg = successful ? 'successful' : 'unsuccessful';
      console.log('Copying text command was ' + msg);
    } catch (err) {
      console.log('Oops, unable to copy');
    }

    document.body.removeChild(textArea);
  }
</script>