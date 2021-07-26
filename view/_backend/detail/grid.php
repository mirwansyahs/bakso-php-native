<div class="row ">
  <?php while ($key = $data['value']->fetch_object()){ ?>

  <div class="col-md-3">
    <div class="card card-primary card-outline">
      <form action="<?=base_url?>admin/grid.php?aksi=addToCart&id=<?=$key->produk_id?>" method="POST">
      <div class="card-body box-profile">
        <div class="text-center">
          <?php if ($key->produk_image != ""){ ?>
          <img class="profile-user-img img-fluid img-circle" src="<?=base_url?>assets/back/img/<?=$key->produk_image?>"
            alt="Produk picture">
          <?php } ?>
        </div>

        <h3 class="profile-username text-center"><?=$key->produk_nama?></h3>

        <p class="text-muted text-center"><?=$key->produk_nama?></p>

        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Harga</b> <a class="float-right"><?=$key->produk_harga?></a>
          </li>
          <li class="list-group-item">
            <b>Stok</b> <a class="float-right"><?=$key->produk_stok?></a>
          </li>
          <li class="list-group-item">
            <b>Kuantitas</b> 
            <br/>
            <div class="row">
              <div class="col-md-3">
                <button type="button" class="btn btn-primary form-control" onclick="decrementValue('kuantitas<?=$key->produk_id?>')">-</button>
              </div> 
              <div class="col-md-3">
                <input type="text" name="kuantitas" id="kuantitas<?=$key->produk_id?>" class="form-control" value="0" min="0" max="100">
              </div> 
              <div class="col-md-3">
                <button type="button" class="btn btn-primary form-control" onclick="incrementValue('kuantitas<?=$key->produk_id?>')">+</button>
              </div>
            </div>
          </li>
        </ul>

        <button type="submit" class="btn btn-primary btn-block"><b>Beli</b></button>
        </form>
      </div>

      <!-- /.card-body -->
    </div>
  </div>
  <?php } ?>
</div>
<script>
  
  function incrementValue(id = ''){
			var value = parseInt(document.getElementById(id).value, 10);
			value = isNaN(value) ? 0 : value;
			if(value<100){
				value++;
					document.getElementById(id).value = value;
			}
		}

		function decrementValue(id = ''){
			var value = parseInt(document.getElementById(id).value, 10);
			value = isNaN(value) ? 0 : value;
			if(value>1){
				value--;
					document.getElementById(id).value = value;
			}
		}
        
  </script>