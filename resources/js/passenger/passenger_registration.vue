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


 <!-- Passenger Registration -->
    <div class="jumbotron-container">
      <!-- Left section -->
      <div class="jumbotron-rigth">
        <div class="quote">
           <h2 class="jumbotron-header">Join the JuanClick Community</h2>
            <p>
            Experience a fast, safe, and easy way to book rides — designed to connect passengers and drivers anytime, anywhere.
          </p>
        </div>
      </div>

      <!-- Right section -->
      <div class="jumbotron-right">
        <form class="pass-reg-form" @submit.prevent="registerPassenger">
          <img src="../../img/JuanClickLogo.png" alt="JuanClick Logo" class="login-logo" />
          <h3>Register as Passenger</h3>

         <div class="name-group">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" v-model="firstName" placeholder="Enter your first name" required />
            </div>

            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" v-model="middleName" placeholder="Enter your middle name" />
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" v-model="lastName" placeholder="Enter your last name" required />
            </div>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="email" v-model="email" placeholder="Enter your username" required />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" v-model="email" placeholder="Enter your email" required />
          </div>

          <div class="form-group">
            <label>Phone Number</label>
            <input type="tel" v-model="phone" placeholder="Enter your phone number" required />
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" v-model="password" placeholder="Enter your password" required />
          </div>

          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" v-model="confirmPassword" placeholder="Confirm your password" required />
          </div>

          <button type="submit" class="btn btn-fill">Register</button>
        </form>
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
