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
              <a class="header-nav-link header-active" href="/roomandsuites">Rooms and Suites</a>
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

          <div class="header-hamburger-icon">
            <div class="header-hamburger-line-1"></div>
            <div class="header-hamburger-line-2"></div>
            <div class="header-hamburger-line-3"></div>
          </div>
        </nav>
      </div>
    </header>

    <!-- Main Content -->
    <main>
      <div class="container">
        <!-- Top Section -->
        <div class="page-header-container">
          <h2 class="page-header">Star Hotel Rooms</h2>
          <hr />
          <p class="page-sub-header">
            Get the most of our hotel specials. Enjoy the modern <br />
            comfort and panoramic view
          </p>
        </div>

        <!-- Special Offers -->
        <section class="special-offers">
          <div class="row center-lg">
            <div class="col image-col right-marg">
              <img src="../../img/hotel-1.webp" alt="room-image" class="small-image" />
              <img src="../../img/hotel-2.webp" alt="room-image" class="small-image" />
              <img src="../../img/hotel-3.webp" alt="room-image" class="small-image" />

              <div class="side-by-side-container">
                <div class="large-image-container">
                  <img src="../../img/hotel-4-large.webp" alt="room-image-large" class="large-image" />
                </div>
                <section class="stacked-image-container">
                  <div><img src="../../img/hotel-5.webp" alt="room-image" class="small-image" /></div>
                  <div><img src="../../img/hotel-6.webp" alt="room-image" class="small-image" /></div>
                </section>
              </div>
            </div>

            <div class="col">
              <h3 class="offers-title">Special Offers</h3>
              <p class="offers-sub-title">
                Get 10% discount off this city view- standard room. <br />
                Offers valid till June 31st 2020
              </p>
              <ul class="offers-list">
                <li>
                  <div>
                    <img src="../../img/check-square.svg" alt="tick" class="list-icon" />
                    <p class="list-text">Free Wi-Fi Service</p>
                  </div>
                </li>
                <li>
                  <div>
                    <img src="../../img/check-square.svg" alt="tick" class="list-icon" />
                    <p class="list-text">Best Rate Guarantee</p>
                  </div>
                </li>
                <li>
                  <div>
                    <img src="../../img/check-square.svg" alt="tick" class="list-icon" />
                    <p class="list-text">Free DSTV Access</p>
                  </div>
                </li>
              </ul>
              <a href="#" class="btn btn-fill btn-large">View More</a>
            </div>
          </div>
        </section>

        <!-- Rooms Section -->
        <section class="rooms-section">
          <div class="row room-section-header-container">
            <div class="col col-3"><h4 class="room-section-header active-header">Standard Rooms</h4></div>
            <div class="col col-3"><h4 class="room-section-header">Executive Rooms</h4></div>
            <div class="col col-3"><h4 class="room-section-header">King Suites</h4></div>
          </div>

          <div class="row center-lg">
            <!-- Room Card -->
            <div class="rooms col col-2" v-for="room in rooms" :key="room.id">
              <img :src="room.img" alt="room" class="rooms-img" />
              <h3 class="room-title">{{ room.title }}</h3>
              <p class="room-text" v-html="room.desc"></p>
              <div>
                <div class="details-container" v-for="detail in room.details" :key="detail.text">
                  <img :src="detail.icon" alt="icon" class="list-icon" />
                  <p class="list-text">{{ detail.text }}</p>
                </div>
              </div>
              <p class="amount-text">{{ room.price }}</p>
              <div class="buttons-container">
                <a href="#" class="btn btn-ghost">View More</a>
                <a href="https://timbu.com/search?query=hotel" class="btn btn-fill">Book Now</a>
              </div>
            </div>
          </div>
        </section>
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
              <img src="../../img/map-pin.svg" class="footer-description-icon" alt="location" />
              <span>23, Fola Osibo, Lekki Phase 1</span>
            </p>
            <p class="footer-description-detail">
              <img src="../../img/phone.svg" class="footer-description-icon" alt="phone" />
              <span>08185956620</span>
            </p>
            <p class="footer-description-detail">
              <img src="../../img/mail.svg" class="footer-description-icon" alt="email" />
              <span>support@starhotels.com</span>
            </p>
          </div>

          <div class="footer-follow-us">
            <h3 class="footer-description-title">Follow Us</h3>
            <ul class="footer-follow-us-lists">
              <li class="follow-us-list"><a href="#"><img src="../../img/facebook.svg" alt="facebook" /></a></li>
              <li class="follow-us-list"><a href="#"><img src="../../img/twitter.svg" alt="twitter" /></a></li>
              <li class="follow-us-list"><a href="#"><img src="../../img/instagram.svg" alt="instagram" /></a></li>
            </ul>
          </div>
        </nav>
      </div>
    </footer>
  </div>
</template>

<script setup>
import checkIcon from '../../img/check-square.svg'
import bedIcon from '../../img/bed.png'
const rooms = [
  {
    id: 1,
    img: "https://res.cloudinary.com/start-ng/image/upload/v1591638448/Rectangle_42_nastdj.png",
    title: "Standard Economic Single",
    desc: "Designed specifically for Practicality and <br> comfort",
    details: [
      { icon: checkIcon, text: "2 Persons" },
      { icon: bedIcon, text: "1 Kingsize bed" },
    ],
    price: "NGN25,000 Per Night",
  },
  {
    id: 2,
    img: "https://res.cloudinary.com/start-ng/image/upload/v1591638449/Rectangle_43_d9eepu.png",
    title: "Standard Economic Single",
    desc: "Designed specifically for Practicality and <br> comfort",
    details: [
      { icon: checkIcon, text: "2 Persons" },
      { icon: bedIcon, text: "1 Kingsize bed" },
    ],
    price: "NGN35,000 Per Night",
  },
  {
    id: 3,
    img: "https://res.cloudinary.com/start-ng/image/upload/v1591638448/Rectangle_44_anerdv.png",
    title: "Standard Economic Single",
    desc: "Designed specifically for Practicality and <br> comfort",
    details: [
      { icon: checkIcon, text: "2 Persons" },
      { icon: bedIcon, text: "1 Kingsize bed" },
    ],
    price: "NGN45,000 Per Night",
  },
  {
    id: 4,
    img: "https://res.cloudinary.com/start-ng/image/upload/v1591638449/Rectangle_45_mtl458.png",
    title: "Standard Economic Single",
    desc: "Designed specifically for Practicality and <br> comfort",
    details: [
      { icon: checkIcon, text: "2 Persons" },
      { icon: bedIcon, text: "1 Kingsize bed" },
    ],
    price: "NGN50,000 Per Night",
  },
];
</script>

<style scoped>
@import "../../css/global-header.css";
@import "../../css/global-footer.css";
@import "../../css/rooms-and-suites.css";
</style>
