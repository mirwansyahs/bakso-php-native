 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>E-commerce</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
          <?php while ($key = $data['value']->fetch_object()){ ?>
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?=$key->produk_nama?></h3>
              <div class="col-12">
              <?php if ($key->produk_image != ""){ ?>
                <img src="<?=base_url?>assets/back/img/<?=$key->produk_image?>" class="product-image" alt="Product Image">
                <?php } ?>
              </div>
              <div class="col-12 product-image-thumbs">
                
                  
                
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?=$key->produk_nama?></h3>
              <p></p>

              <hr>

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                <?=$key->produk_harga?>
                </h2>
                <h4 class="mt-0">
                  <small>Stok: <?=$key->produk_stok?></small>
                </h4>
              </div>
                <div class="col-4 mt-4">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-primary">Jumlah</button>
                  </div>
                  <!-- /btn-group -->
                  <input type="number" class="form-control" id="jumlah" name="jumlah" splaceholder="kg">
                </div>
                </div>
              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                 Tambahkam ke keranjang
                </div>

                <div class="btn btn-default btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2"></i>
                  Tambahkan ke Whistlist
                </div>
              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>
               
            </div>
            <?php }?>
          </div>
          
         
        </div>
        
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  