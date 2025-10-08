<template>
  <div>
    <!-- Header -->
    <header>
      <div class="header-container">
        <nav class="header-nav-bar">
          <div class="header-nav-logo">
            <a href="/">
              <img
                src="https://res.cloudinary.com/joshuafolorunsho/image/upload/v1591615159/star_hotels_logo.png"
                alt="star hotels logo"
              />
            </a>
          </div>
          <ul class="header-nav-lists">
            <li class="header-nav-list">
               <a class="header-nav-link" href="/">Home</a>
            </li>
            <li class="header-nav-list">
              <a class="header-nav-link" href="/roomandsuites">Rooms and Suites</a>
            </li> 
            <li class="header-nav-list">
              <a class="header-nav-link" href="/facilities">Facilities</a>
            </li>
            <li class="header-nav-list">
               <a class="header-nav-link header-active" href="/contact_page">Contact Us</a>
            </li>
            <li class="header-nav-list">
              <a class="header-btn header-btn-custom" href="https://timbu.com/search?query=hotel">BOOK NOW</a>
            </li>
          </ul>

          <div class="header-hamburger-icon">
            <div class="header-hamburger-line-1"></div>
            <div class="header-hamburger-line-2"></div>
            <div class="header-hamburger-line-3"></div>
          </div>
        </nav>
      </div>
    </header>

    <!-- Main -->
    <main>
      <div class="container">
        <!-- Header Part -->
        <div class="header">
          <h2>Contact Us</h2>
          <hr />
          <p>
            Intersted in striking a partnership or do you have any complaint or
            feedback? Fill the form below
          </p>
        </div>

        <!-- Main Part -->
        <div class="main">
          <div class="contact">
            <!-- Form -->
            <div class="contact-form">
              <form @submit.prevent="submitForm">
                <div class="contact-detail">
                  <label class="hide" for="name">Enter your name</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Name"
                    id="name"
                    v-model="form.name"
                  />
                  <label class="hide" for="email">Enter your email address</label>
                  <input
                    type="email"
                    class="form-control"
                    placeholder="Email"
                    id="email"
                    v-model="form.email"
                  />
                </div>
                <label class="hide" for="message">Message</label>
                <textarea
                  class="form-control"
                  rows="5"
                  id="comment"
                  placeholder="Message"
                  style="resize: none; width: 100%;"
                  v-model="form.message"
                ></textarea>

                <button type="submit" class="btn">SEND MESSAGE</button>
              </form>
            </div>

            <!-- Contact Info -->
            <div class="contact-us">
              <h3>Contact Us</h3>
              <span>
                <i
                  style="font-size: 1.5rem;"
                  class="fa fa-map-marker"
                  aria-hidden="true"
                ></i>
                23, Fola osibo, Lekki&nbsp;phase&nbsp;1
              </span>
              <span>
                <i
                  style="font-size: 1.5rem;"
                  class="fa fa-phone"
                  aria-hidden="true"
                ></i>
                08185956620
              </span>
              <span>
                <i
                  style="font-size: 1.5rem;"
                  class="fa fa-envelope-o"
                  aria-hidden="true"
                ></i>
                Support@starhotels.com
              </span>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
      <div class="footer-container">
        <nav class="footer-nav">
          <div class="footer-description">
            <h3 class="footer-description-title">Star Hotels</h3>
            <p>Hospitality and Comfort are our watchwords</p>
          </div>
          <div class="footer-contact-us">
            <h3 class="footer-description-title">Contact Us</h3>
            <p class="footer-description-detail">
              <img
                src="../../img/map-pin.svg"
                class="footer-description-icon"
                alt="star hotel location"
              />
              <span>23, Fola Osibo, Lekki Phase 1</span>
            </p>
            <p class="footer-description-detail">
              <img
                src="../../img/phone.svg"
                class="footer-description-icon"
                alt="star hotels phone number"
              />
              <span>08185956620</span>
            </p>
            <p class="footer-description-detail">
              <img
                src="../../img/mail.svg"
                class="footer-description-icon"
                alt="star hotels email"
              />
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
  name: "ContactPage",
  data() {
    return {
      form: {
        name: "",
        email: "",
        message: "",
      },
    };
  },
  methods: {
    submitForm() {
      console.log("Form submitted:", this.form);
      alert("Message sent!");
      this.form = { name: "", email: "", message: "" };
    },
  },
};
</script>

<style scoped>
@import "../../css/global-header.css";
@import "../../css/global-footer.css";
@import "../../css/accesibility.css";
@import "../../css/contact-page.css";
</style>
