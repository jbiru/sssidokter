</main>

  <footer id="footer" class="footer position-relative">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">SiDokter</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Jl. Babat - Jombang No.227 </p>
            <p>Sendangrejo, Kec. Ngimbang, Kabupaten Lamongan 62273</p>
            <p class="mt-3"><strong>Phone:</strong> <span>(0322) 453636 : 453737</span></p>
            <p><strong>Email:</strong> <span>ngimbangrsud@yahoo.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Dokumen</a></li>
            <li><a href="#">Informasi</a></li>
            <li><a href="#">Anggota</a></li>
            <li><a href="#">Kegiatan</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">SiDokter</strong><span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://lamongankab.go.id/rsudngimbang">Program RSUD Ngimbang</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url() ?>assets/assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url() ?>assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url() ?>assets/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/jquery/jquery.js"></script>

  <!-- Main JS File -->
  <script src="<?= base_url() ?>assets/assets/js/main.js"></script>


  <script type="text/javascript">
    $(document).ready(function () {
      $("#live_search").keyup(function () { 
        // alert ($(this).val());die;
        var input =$(this).val();
        if (input !="") {
          $.ajax({
            url: "<?php echo base_url('home/livesearch');?>",
            method:"POST",
            data: {input:input},
            success: function (data) {
              $("#searchresult").html(data);
            }
          });
        } else{
          $("#searchresult").css("display","none");
        }
      });
      var debounceTimer;
      $('#live_search').on('input', function() {
          var input = $(this).val();
          clearTimeout(debounceTimer);
          debounceTimer = setTimeout(function() {
              $.ajax({
                  url: "<?php echo base_url('home/livesearch');?>",
                  method: "POST",
                  data: {input: input},
                  success: function(data){
                      $('#searchresult').html(data);
                  }
              });
          }, 5000); // Waktu penundaan sebelum permintaan AJAX dikirim (dalam milidetik)
      });
       // Ketika input diubah
       $('#search').on('input', function() {
                var input = $(this).val();
                if(input.trim() !== '') {
                    sendAjaxRequest(input);
                } else {
                    $('#searchresult').html(''); // Hapus hasil pencarian jika input kosong
                }
            });
    });
  </script>

</body>

</html>