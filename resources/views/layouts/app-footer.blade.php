
<footer class="footer-section">
  <div class="newslater-section padding-bottom">
    <div class="container">
      <div class="newslater-area">
        <div class="newslater-content padding-bottom padding-top">
          <span class="cate">SUBSCRIBE TO hyipland</span>
          <h3 class="title">To Get Exclusive Benefits</h3>
          <form class="newslater-form">
            <input type="text" placeholder="Enter Your Email Here" required>
            <button type="submit">subscribe</button>
          </form>
        </div>
        <div class="newslater-thumb">
          <img src="{{ asset('images/footer/footer.png') }}" alt="footer">
          <div class="coin-1">
            <img src="{{ asset('images/footer/Coin_01.png') }}" alt="footer">
          </div>
          <div class="coin-2">
            <img src="{{ asset('images/footer/Coin_02.png') }}" alt="footer">
          </div>
          <div class="coin-3">
            <img src="{{ asset('images/footer/Coin_03.png') }}" alt="footer">
          </div>
          <div class="coin-4">
            <img src="{{ asset('images/footer/Coin_04.png') }}" alt="footer">
          </div>
          <div class="coin-5">
            <img src="{{ asset('images/footer/Coin_05.png') }}" alt="footer">
          </div>
          <div class="coin-6">
            <img src="{{ asset('images/footer/Coin_06.png') }}" alt="footer">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="footer-top">
      <div class="logo">
        <a href="">
          <img src="{{ asset('images/logo/footer-logo.png') }}" alt="logo">
        </a>
      </div>
      <ul class="links">
        <li>
          <a href="{{ route('customer.aboutus') }}">About</a>
        </li>
        <li>
          <a href="{{ route('customer.partners') }}">Affiliates</a>
        </li>
        <li>
          <a href="">Plans</a>
        </li>
        <li>
          <a href="{{ route('customer.faq') }}">FAQ</a>
        </li>
        <li>
          <a href="{{ route('customer.agreement') }}">Privacy Policy</a>
        </li>
      </ul>
    </div>
    <div class="footer-bottom">
      <div class="footer-bottom-area">
        <div class="left">
          <p>&copy; 2020
            <a href="{{ route('customer.main') }}">Hyipland</a>
            | All right reserved
          </p>
        </div>
        <ul class="social-icons">
          <li>
            <a href="#0">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li>
            <a href="#0" class="active">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li>
            <a href="#0">
              <i class="fab fa-pinterest-p"></i>
            </a>
          </li>
          <li>
            <a href="#0">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
