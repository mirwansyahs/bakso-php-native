<!-- footer -->
<footer class="w3l-footer-29-main">
    <div class="footer-29 py-5">
      <div class="container py-md-4">
  
        <div class="row footer-top-29">
  
          <div class="col-lg-4 col-md-6 footer-list-29 footer-1">
            <div class="footer-logo mb-4">
              <a class="navbar-brand" href="index.html">
                <span class="fa fa-align-right"></span> <?=base_name?> <span class="logo">Mantap Membahana</span></a>
            </div>
            <p><?=base_name?>Adalah kedai bakso yamin terbaik di kota ini. Kami meracik bumbu dan mengolah bakso dengan sepenuh hati untuk menjadikan bakso semantap ini.</p>
            <div class="main-social-footer-29 mt-md-4 mt-3">
              <a href="#facebook" class="facebook"><span class="fa fa-facebook"></span></a>
              <a href="#twitter" class="twitter"><span class="fa fa-twitter"></span></a>
              <a href="#instagram" class="instagram"><span class="fa fa-instagram"></span></a>
              <a href="#linkedin" class="linkedin"><span class="fa fa-linkedin"></span></a>
            </div>
          </div>
  
          <div class="col-lg-4 col-md-6 footer-list-29 footer-1 pr-lg-5 mt-md-0 mt-5">
            <h6 class="footer-title-29">Kontak </h6>
            <p class="mb-2">Alamat :<?=base_name?>, Jalan Siliwangi nomor 43 Kuningan Jawa Barat 45516.</p>
            <p class="mb-2">Nomor Telpon : <a href="tel:+1(21) 234 4567">+1(21) 234 4567</a></p>
            <p class="mb-2">Email : <a href="mailto:info@example.com">info@example.com</a></p>
            <p>Support : <a href="mailto:info@support.com">info@support.com</a></p>
          </div>
  
         
  
          <div class="col-lg-2 col-md-6 col-sm-5 col-6 footer-list-29 footer-2 mt-lg-0 mt-5">
            <ul>
              <h6 class="footer-title-29">Company</h6>i>
              <li><a href="#about">Tentang kami</a></li>
              <li> <?php if (@$_SESSION['users_id']){ ?>
              <a href="<?=base_url?>admin/index.php">Dashboard</a>
              <?php }else{ ?>
              <a href="<?=base_url?>fLogin.php">Masuk</a>
              <?php } ?></li>
            </ul>
          </div>
  
        </div>
  
      </div>
    </div>
    <!-- copyright -->
   
    <section class="w3l-copyright text-center">
      <div class="container">
        <p class="copy-footer-29">© 2021 <?=base_name?>. All rights reserved. </p>
        
      </div>
  
      <!-- move top -->
      <button onclick="topFunction()" id="movetop" title="Go to top">
        &#10548;
      </button>
      <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
          scrollFunction()
        };
  
        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("movetop").style.display = "block";
          } else {
            document.getElementById("movetop").style.display = "none";
          }
        }
  
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
      </script>
      <!-- /move top -->
    </section>
    <!-- //copyright -->
  </footer>
  <!-- //footer -->