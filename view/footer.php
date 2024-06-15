  <!-- OPEN FORM Add-Product -->

  <section id="newletter">
    <div class="newstext">
      <h4>Sign Up For Newslatters</h4>
      <p>Get E-mail updates about our latest shop and <span>specical offers</span> </p>
    </div>
    <form action="index.php?page=sent_email" method="post">
      <div class="form ">
        <input type="text" name="email" id="" placeholder="Your E-mail address">
        <button type="submit" name="sent_email" class="normal"><i class='bx bxs-paper-plane sent'></i></button>
      </div>
    </form>
   
    <?php
    if (isset($_SESSION['success_message'])) {
      echo $_SESSION['success_message'];
      unset( $_SESSION['success_message']);
    }

    ?>
    <script src="layout/js/script.js"></script>
  </section>

  <section class="footer">
    <footer>
      <div class="col">
        <img src="" alt="">
        <h4>Contact</h4>
        <p><strong>Address:</strong> 18/4 Mỹ Huề , Trung Chánh Hóc Môn</p>
        <p><strong>Phone:</strong> (+84) 3770 812 / (+01) 1231 1231</p>
        <p><strong>Email:</strong> toanpt@gmail.com</p>

        <div class="follow">
          <h4>Follow Us</h4>
          <div class="icon">
            <i class='bx bxl-facebook fb'></i>
            <i class='bx bxl-twitter twitter'></i>
            <i class='bx bxl-instagram-alt instagram'></i>
            <i class='bx bxl-youtube ytb'></i>
          </div>
        </div>
      </div>
      <div class="col">
        <h4>About</h4>
        <a href="">Liên hệ</a>
        <a href="">Phỏng vấn</a>
        <a href="">Hoạt động của công ty</a>
        <a href="">Sự kiện </a>
      </div>
      <div class="col">
        <h4>Khách hàng</h4>
        <a href="">Tra cứu đơn hàng</a>
        <a href="">Phỏng vấn</a>
        <a href="">Đăng ký</a>
        <a href="">Đăng nhập </a>
      </div>
      <div class="col">
        <h4>Intall app</h4>
        <p>Form app Store or Google Play</p>
        <div class="row">
          <img src="layout/img/fixed/app.jpg" alt="">
          <img src="layout/img/fixed/play.jpg" alt="">
        </div>
        <p>Secured Payment Geatways</p>
        <img class="pay" src="layout/img/fixed/pay.png" alt="">
      </div>
    </footer>
    
  </section>




  <!-- ===========SHOW THÔNG TIN GIỎ HÀNG========== -->

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const showForm = document.getElementById('showForm');
      const closePopup = document.getElementById('closePopup');
      const overlay = document.getElementById('overlay');

      // Hiển thị hộp thoại khi nhấn vào nút thêm vào giỏ hàng
      showForm.addEventListener('click', function() {
        overlay.style.display = 'block';
      });

      // Ẩn hộp thoại khi nhấn vào nút đóng
      closePopup.addEventListener('click', function() {
        overlay.style.display = 'none';
      });
    });
  </script>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <!-- Initialize Swiper -->
  <script src="layout/js/slide.js"></script>
  <!-- list img -->
  <script>
    var MainImg = document.getElementById('MainImg');
    var smallimg = document.getElementsByClassName('smallimg');

    smallimg[0].onclick = function() {
      MainImg.src = smallimg[0].src;
    }
    smallimg[1].onclick = function() {
      MainImg.src = smallimg[1].src;

    }
    smallimg[2].onclick = function() {
      MainImg.src = smallimg[2].src;

    }
    smallimg[3].onclick = function() {
      MainImg.src = smallimg[3].src;

    }
  </script>

  <script>
    // Loadform
    document.getElementById('showForm').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('overlay').style.display = 'block';
    });
    document.getElementById('closePopup').addEventListener('click', function() {
      document.getElementById('overlay').style.display = 'none';
    });
  </script>

  </body>

  </html>