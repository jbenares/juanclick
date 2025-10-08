<template>
  <div class="scroll-bar">
    <!-- Loader -->
    <div id="loader">
      <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 100 100">
        <path fill="#d4af37" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,
          19.1-19.1S69.1,39.5,69.1,50">
          <animateTransform attributeName="transform" type="rotate"
            dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
        </path>
      </svg>
    </div>

    <!-- HEADER -->
    <header>
      <div class="header-container">
        <nav class="header-nav-bar">
          <div class="header-nav-logo">
            <a href="/">
              <img src="../../img/JuanClickLogo.png" alt="JuanClick logo" style="width: 150px; height: auto;" />
            </a>
          </div>
          <ul class="header-nav-lists">
            <li class="header-nav-list">
               <a class="header-nav-link header-active" href="/">Home</a>
            </li>
            <li class="header-nav-list">
              <a class="header-nav-link" href="/roomandsuites">Rooms and Suites</a>
            </li> 
            <li class="header-nav-list">
              <a class="header-nav-link" href="/facilities">Facilities</a>
            </li>
            <li class="header-nav-list">
               <a class="header-nav-link" href="/contact_page">Contact Us</a>
            </li>
            <li class="header-nav-list">
              <a class="header-btn header-btn-custom" href="https://timbu.com/search?query=hotel">BOOK NOW</a>
            </li>
          </ul>

          <div class="header-hamburger-icon" @click="toggleHamburger">
            <div class="header-hamburger-line-1"></div>
            <div class="header-hamburger-line-2"></div>
            <div class="header-hamburger-line-3"></div>
          </div>
        </nav>
      </div>
    </header>

    <!-- JUMBOTRON -->
<div class="jumbotron-container">
  <!-- Left: Mission Quote -->
  <div class="jumbotron-left">
    <h2 class="jumbotron-header">Connecting Passengers & Drivers</h2>
    <p>
      “JuanClick’s mission is to make travel easier and safer for both passengers and drivers.
      We connect people through trusted and efficient booking services — anywhere, anytime.”
    </p>
  </div>

  <!-- Right: Login Form -->
  <div class="jumbotron-right">
    <form class="login-form" @submit.prevent="login">
      <img src="../../img/JuanClickLogo.png" alt="JuanClick Logo" class="login-logo">

      <h3>Login to Your Account</h3>

      <div class="form-group btn">
        <label>Email/Username</label>
        <input type="email" v-model="email" placeholder="Enter your email or username" required />
        <label>Password</label>
        <input type="password" v-model="password" placeholder="Enter your password" required />
        <button type="submit" class="btn btn-fill">Login</button>
              <div class="divider">OR</div>

      <button type="button" class="btn social-btn email-btn" @click="emailLogin">
        <img src="../../img/mail.svg" alt="email" class="icon" /> Continue with Email
      </button>
      <button type="button" class="btn social-btn facebook-btn" @click="facebookLogin">
        <img src="../../img/facebook.svg" alt="facebook" class="icon" /> Continue with Facebook
      </button>
      </div>
      <div class="register-links">
        <label>Don’t have an account?</label>
        <a href="/register_driver" class="register-link">Register as Driver</a> |
        <a href="/register_passenger" class="register-link">Register as Passenger</a>
      </div>
    </form>
  </div>
</div>


    <!-- ENJOY -->
    <div class="enjoy-container">
      <div class="enjoy-header">
        <h2 class="enjoy-heading">Enjoy your stay <br>at our hotel</h2>
        <hr class="horizontal">
        <p>We are more than being a hotel because we are able<br> to combine the quality standard of a hotel with the<br> advantages of an apartment.</p>
      </div>
      <div class="enjoy-services">
        <div class="first-col">
          <div class="upper">
            <span>
              <img src="../../img/clock.svg" alt="clock icon" class="enjoy__clock-icon">
            </span>
            <h3>24 hours Room Service</h3>
            <p>You have access to 24-hours a day room service at our hotel.</p>
          </div>
          <div class="lower">
            <span>
              <img src="../../img/database.svg" alt="fitness icon" class="enjoy__fitness-icon">
            </span>
            <h3>Fitness and Spa</h3>
            <p>Access to fitness and Spa is part of our hotel package when you make a booking.</p>
          </div>
        </div>
        <div class="sec-col">
          <div class="upper">
            <span>
              <img src="../../img/coffee.svg" alt="coffee icon" class="enjoy__coffee-icon">
            </span>
            <h3>Restaurant and Bars</h3>
            <p>You have access to the world state of art restaurants and bars at our hotel</p>
          </div>
          <div class="lower">
            <span>
              <img src="../../img/wifi.svg" alt="wifi icon" class="enjoy__wifi-icon">
            </span>
            <h3>Free Wi-Fi Access</h3>
            <p>You have access to 24-hours free Wi-Fi services irrespective of any room.</p>
          </div>
        </div>
        <div class="third-col cont">
          <img src="../../img/ant-design_play-circle-filled.svg" alt="video play icon" class="enjoy__play-icon">
          <img src="../../img/video link.webp" alt="women in swimming pool" class="third-col-video">
        </div>
      </div>
    </div>

    <!-- OFFERS -->
    <section class="special-offers">
      <div class="page-header-container">
        <h2 class="page-header">Simplicity is the ultimate <br>Watchword</h2>
      </div>
      <div class="row center-lg">
        <div class="col image-col right-marg">
          <img src="../../img/hotel-1.webp" alt="room-image" class="small-image">
          <img src="../../img/hotel-2.webp" alt="room-image" class="small-image">
          <img src="../../img/hotel-3.webp" alt="room-image" class="small-image img-hide">
          <div class="side-by-side-container">
            <div class="large-image-container">
              <img src="../../img/hotel-4-large.webp" alt="room-image-large" class="large-image">
            </div>
            <section class="stacked-image-container">
              <div><img src="../../img/hotel-5.webp" alt="room-image" class="small-image"></div>
              <div><img src="../../img/hotel-6.webp" alt="room-image" class="small-image"></div>
            </section>
          </div>
        </div>
        <div class="col">
          <p class="offers-sub-title">
            The fact that we are run by hospitality professionals<br>and equipped with the world best interior designers <br> is why our rooms and suites are second to none in <br>the universe
          </p>
          <ul class="offers-list">
            <li><img src="../../img/check-square.svg" alt="tick" class="list-icon"><p class="list-text">Standard Room</p></li>
            <li><img src="../../img/check-square.svg" alt="tick" class="list-icon"><p class="list-text">Executive Room</p></li>
            <li><img src="../../img/check-square.svg" alt="tick" class="list-icon"><p class="list-text">King Suite</p></li>
          </ul>
          <a href="https://timbu.com/search?query=hotel" class="btn btn-fill btn-large centered">Book Now</a>
        </div>
      </div>
    </section>

    <!-- REVIEWS -->
    <div class="review-container">
      <div class="review-header">
        <h2 class="review-title">Client Reviews</h2>
        <hr class="horizontal">
        <p>We are very proud of the services we offer to our customers.<br>Read every word from our happy customers.</p>
      </div>
      <div class="cards-container">
        <div class="card">
          <img src="../../img/customer1.webp" alt="" class="card-avi">
          <h2 class="card-title">Mark Essien</h2>
          <h3 class="card-subtitle">Lagos, Nigeria.</h3>
          <p class="card-desc">Words can't explain the kind of treatment I received from the management of star hotels. They are the best in the country.</p>
        </div>
        <div class="card">
          <img src="../../img/customer2.webp" alt="" class="card-avi">
          <h2 class="card-title">Seyi Onifade</h2>
          <h3 class="card-subtitle">Lagos, Nigeria.</h3>
          <p class="card-desc">Star hotels makes you feel the best room quality that makes you feel the comfort of a home.</p>
        </div>
        <div class="card">
          <img src="../../img/customer3.webp" alt="" class="card-avi">
          <h2 class="card-title">Fayemi David</h2>
          <h3 class="card-subtitle">Lagos, Nigeria.</h3>
          <p class="card-desc">My Family and I are very happy when we lodge into star hotels. They are by far the best in the universe.</p>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer">
      <div class="footer-container">
        <nav class="footer-nav">
          <div class="footer-description">
            <h3 class="footer-description-title">JuanClick</h3>
            <p>Hospitality and Comfort are our watchwords</p>
          </div>
          <div class="footer-contact-us">
            <h3 class="footer-description-title">Contact Us</h3>
            <p class="footer-description-detail">
              <img src="../../img/map-pin.svg" class="footer-description-icon" alt="star hotel location">
              <span>23, Fola Osibo, Lekki Phase 1</span>
            </p>
            <p class="footer-description-detail">
              <img src="../../img/phone.svg" class="footer-description-icon" alt="star hotels phone number">
              <span>08185956620</span>
            </p>
            <p class="footer-description-detail">
              <img src="../../img/mail.svg" class="footer-description-icon" alt="star hotels email">
              <span>support@starhotels.com</span>
            </p>
          </div>
          <div class="footer-follow-us">
            <h3 class="footer-description-title">Follow Us</h3>
            <ul class="footer-follow-us-lists">
              <li class="follow-us-list">
                <a href="">
                  <img src="../../img/facebook.svg" alt="facebook page" />
                </a>
              </li>
              <li class="follow-us-list">
                <a href="">
                  <img src="../../img/twitter.svg" alt="twitter page" />
                </a>
              </li>
              <li class="follow-us-list">
                <a href="">
                  <img src="../../img/instagram.svg" alt="instagram page" />
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  name: "Home",
  mounted() {
    // Loader effect
    const loader = document.getElementById("loader");
    const scrollBar = document.getElementsByClassName("scroll-bar")[0];
    window.addEventListener("load", () => {
      loader.classList.add("none");
      scrollBar.classList.remove("scroll-bar");
    });
    // Toggle Hamburger menu script
    import("../../js/toggleHamburger.js");
  }
};
</script>

<style scoped>
@import "../../css/global-header.css";
@import "../../css/global-footer.css";
@import "../../css/accesibility.css";
@import "../../css/index.css";
@import "../../css/dashboard.css";
</style>