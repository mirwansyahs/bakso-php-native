
<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mx-lg-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?=base_url?>index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item @@contact__active">
              <a class="nav-link" href="#services">Kategori</a>
            </li>
            <li class="nav-item @@contact__active">
              <a class="nav-link" href="#about">Tentang Kami</a>
            </li>
            <li class="nav-item @@contact__active">
              <?php if (@$_SESSION['users_id']){ ?>
              <a class="nav-link" href="<?=base_url?>admin/index.php">Dashboard</a>
              <?php }else{ ?>
              <a class="nav-link" href="<?=base_url?>fLogin.php">Masuk</a>
              <?php } ?>
            </li>
          </ul>
          </div>
  
          <!--/search-right-->
       
          <!--//search-right-->

          <!-- toggle switch for light and dark theme -->
          <div class="mobile-position">
            <nav class="navigation">
              <div class="theme-switch-wrapper">
                <label class="theme-switch" for="checkbox">
                  <input type="checkbox" id="checkbox">
                  <div class="mode-container py-1">
                    <i class="gg-sun"></i>
                    <i class="gg-moon"></i>
                  </div>
                </label>
              </div>
            </nav>
          </div>
          <!-- //toggle switch for light and dark theme -->
      </nav>
