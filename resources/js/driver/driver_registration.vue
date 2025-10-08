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

    <!-- TWO-TONE LAYOUT -->
    <div class="jumbotron-container">
      <!-- LEFT: Info panel -->
      <div class="jumbotron-left">
        <div class="quote">
          <h1>Join the JuanClick Driver Network</h1>
          <p>
            Complete the short registration to become a verified driver. JuanClick connects drivers with passengers safely and reliably.
            All fields are required — please have your license and vehicle details ready.
          </p>
        </div>
      </div>

      <!-- RIGHT: Multi-step form -->
      <div class="jumbotron-right">
        <div class="form-shell">
          <!-- Progress -->
          <div class="progress-top">
            <div class="progress-info">
              <span class="step-label">Step {{ currentStep }} of {{ totalSteps }}</span>
              <span class="step-title">{{ stepTitles[currentStep - 1] }}</span>
            </div>
            <div class="progress-bar">
              <div class="progress-fill" :style="{ width: progressPercent + '%' }"></div>
            </div>
          </div>

          <!-- Form content -->
          <form @submit.prevent="onSubmit" novalidate>
            <!-- Step 1: Personal Information -->
            <section v-if="currentStep === 1" class="step">
              <h3 class="section-heading">Personal Information</h3>

              <div class="name-row">
                <div class="form-group">
                  <label for="lastName">Last Name</label>
                  <input id="lastName" type="text" v-model="form.lastName" placeholder="Lastname" required />
                </div>
                <div class="form-group">
                  <label for="firstName">First Name</label>
                  <input id="firstName" type="text" v-model="form.firstName" placeholder="Firstname" required />
                </div>
                <div class="form-group">
                  <label for="middleName">Middle Name</label>
                  <input id="middleName" type="text" v-model="form.middleName" placeholder="Middlename" required />
                </div>
              </div>

              <div class="form-group">
                <label for="birthDate">Birthdate</label>
                <input id="birthDate" type="date" v-model="form.birthDate" required />
              </div>

              <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" v-model="form.gender" required>
                  <option value="" disabled>Select gender</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Other</option>
                </select>
              </div>
              
              <div class="form-group">
                <label for="contactNumber">Contact Number</label>
                <input id="contactNumber" type="tel" v-model="form.contactNumber" placeholder="+63" required />
              </div>
              <div class="address-group">
              <div class="form-group">
                <label for="houseNo">House / Block / Lot No.</label>
                <input id="houseNo" type="text" v-model="form.houseNo" placeholder="e.g., Blk 12 Lot 8" required />
              </div>

              <div class="form-group">
                <label for="street">Street</label>
                <input id="street" type="text" v-model="form.street" placeholder="Street name" required />
              </div>

              <div class="form-group">
                <label for="barangay">Barangay</label>
                <input id="barangay" type="text" v-model="form.barangay" placeholder="Barangay" required />
              </div>

              <div class="form-group">
                <label for="city">City / Municipality</label>
                <input id="city" type="text" v-model="form.city" placeholder="City or Municipality" required />
              </div>

              <div class="form-group">
                <label for="province">Province</label>
                <input id="province" type="text" v-model="form.province" placeholder="Province" required />
              </div>

              <div class="form-group">
                <label for="country">Country</label>
                <input id="country" type="text" v-model="form.country" placeholder="Country" required />
              </div>

              <div class="form-group">
                <label for="zipcode">Zip Code</label>
                <input id="zipcode" type="text" v-model="form.zipcode" placeholder="Postal Code" required />
              </div>
            </div>
            </section>

            <!-- Step 2: Driver's License -->
            <section v-if="currentStep === 2" class="step">
              <h3 class="section-heading">Driver's License</h3>

              <div class="form-group">
                <label for="licenseNumber">License Number</label>
                <input id="licenseNumber" type="text" v-model="form.licenseNumber" required />
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="licenseType">License Type</label>
                  <input id="licenseType" type="text" v-model="form.licenseType" required />
                </div>
                <div class="form-group">
                  <label for="licenseExpiry">Expiry Date</label>
                  <input id="licenseExpiry" type="date" v-model="form.licenseExpiry" required />
                </div>
              </div>

              <div class="form-group">
                <label for="nationality">Nationality</label>
                <input id="nationality" type="text" v-model="form.nationality" required />
              </div>
            </section>

            <!-- Step 3: Vehicle Details -->
            <section v-if="currentStep === 3" class="step">
              <h3 class="section-heading">Vehicle Information</h3>

              <div class="form-group">
                <label for="vehicleType">Vehicle Type</label>
                <input id="vehicleType" type="text" v-model="form.vehicleType" required placeholder="Car / Motorcycle / Van" />
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="plateNumber">Plate Number</label>
                  <input id="plateNumber" type="text" v-model="form.plateNumber" required />
                </div>
                <div class="form-group">
                  <label for="vehicleModel">Model</label>
                  <input id="vehicleModel" type="text" v-model="form.vehicleModel" required />
                </div>
              </div>

              <div class="form-group">
                <label for="vehicleColor">Color</label>
                <input id="vehicleColor" type="text" v-model="form.vehicleColor" required />
              </div>
            </section>

            <!-- Step 4: Emergency Contact -->
            <section v-if="currentStep === 4" class="step">
              <h3 class="section-heading">Emergency Contact</h3>

              <div class="form-group">
                <label for="ecName">Contact Person Name</label>
                <input id="ecName" type="text" v-model="form.ecName" required />
              </div>

              <div class="form-group">
                <label for="ecRelationship">Relationship</label>
                <input id="ecRelationship" type="text" v-model="form.ecRelationship" required />
              </div>

              <div class="form-group">
                <label for="ecContact">Contact Number</label>
                <input id="ecContact" type="tel" v-model="form.ecContact" required />
              </div>

              <div class="form-group">
                <label for="ecAddress">Address</label>
                <input id="ecAddress" type="text" v-model="form.ecAddress" required />
              </div>
            </section>

            <!-- Step 5: Account Setup -->
            <section v-if="currentStep === 5" class="step">
              <h3 class="section-heading">Account Setup</h3>

              <div class="form-group">
                <label for="regEmail">Email</label>
                <input id="regEmail" type="email" v-model="form.email" required />
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="regPassword">Password</label>
                  <input id="regPassword" type="password" v-model="form.password" required />
                </div>
                <div class="form-group">
                  <label for="regPasswordConfirm">Confirm Password</label>
                  <input id="regPasswordConfirm" type="password" v-model="form.confirmPassword" required />
                </div>
              </div>

              <!-- === Added Upload Fields === -->
              <div class="form-row">
                <div class="form-group">
                  <label for="photoUpload">Upload Photo</label>
                  <input id="photoUpload" type="file" accept="image/*" @change="handlePhotoUpload" />
                  <div v-if="photoPreview" class="file-preview">
                    <img :src="photoPreview" alt="Driver Photo Preview" />
                  </div>
                </div>

                <div class="form-group">
                  <label for="signatureUpload">Upload E-Signature</label>
                  <input id="signatureUpload" type="file" accept="image/*" @change="handleSignatureUpload" />
                  <div v-if="signaturePreview" class="file-preview">
                    <img :src="signaturePreview" alt="Signature Preview" />
                  </div>
                </div>
              </div>
            </section>


            <!-- Navigation buttons -->
            <div class="nav-buttons">
              <button type="button" class="btn btn-secondary" @click="prevStep" :disabled="currentStep === 1">Previous</button>

              <template v-if="currentStep < totalSteps">
                <button type="button" class="btn btn-primary" @click="nextStep">Next</button>
              </template>

              <template v-else>
                <button type="submit" class="btn btn-primary">Register</button>
              </template>
            </div>
          </form>
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

<script setup>
import { reactive, ref, computed, onMounted } from "vue";

// ---------- Step Progress ----------
const totalSteps = 5;
const currentStep = ref(1);

const stepTitles = [
  "Personal Information",
  "Driver's License",
  "Vehicle Information",
  "Emergency Contact",
  "Account Setup",
];

// ---------- Reactive Form Object ----------
const form = reactive({
  // Personal
  lastName: "",
  firstName: "",
  middleName: "",
  birthDate: "",
  gender: "",
  address: "",
  contactNumber: "",

  // License
  licenseNumber: "",
  licenseType: "",
  licenseExpiry: "",
  nationality: "",

  // Vehicle
  vehicleType: "",
  plateNumber: "",
  vehicleModel: "",
  vehicleColor: "",

  // Emergency Contact
  ecName: "",
  ecRelationship: "",
  ecContact: "",
  ecAddress: "",

  // Account
  email: "",
  password: "",
  confirmPassword: "",
});

// ---------- Computed ----------
const progressPercent = computed(() => (currentStep.value / totalSteps) * 100);

// ---------- Validation ----------
function validateStep(step) {
  const s = step;
  const required = [];

  // if (s === 1) {
  //   required.push("lastName", "firstName", "middleName", "birthDate", "gender", "address", "contactNumber");
  // } else if (s === 2) {
  //   required.push("licenseNumber", "licenseType", "licenseExpiry", "nationality");
  // } else if (s === 3) {
  //   required.push("vehicleType", "plateNumber", "vehicleModel", "vehicleColor");
  // } else if (s === 4) {
  //   required.push("ecName", "ecRelationship", "ecContact", "ecAddress");
  // } else if (s === 5) {
  //   required.push("email", "password", "confirmPassword");
  // }

  for (const key of required) {
    const val = form[key];
    if (val === null || val === undefined || String(val).trim() === "") {
      alert("Please fill all required fields for this step.");
      return false;
    }
  }

  if (s === 5) {
    if (form.password !== form.confirmPassword) {
      alert("Passwords do not match.");
      return false;
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.email)) {
      alert("Please enter a valid email address.");
      return false;
    }
  }

  return true;
}

// ---------- Navigation ----------
function nextStep() {
  if (validateStep(currentStep.value)) {
    if (currentStep.value < totalSteps) currentStep.value++;
    scrollFormTop();
  }
}

function prevStep() {
  if (currentStep.value > 1) {
    currentStep.value--;
    scrollFormTop();
  }
}

function scrollFormTop() {
  const shell = document.querySelector(".form-shell");
  if (shell) shell.scrollIntoView({ behavior: "smooth", block: "start" });
}

// ---------- Submission ----------
function onSubmit() {
  if (!validateStep(currentStep.value)) return;

  const payload = JSON.parse(JSON.stringify(form));
  console.log("Driver registration payload:", payload);

  alert("Driver registered successfully (demo). Check console for payload.");
  // resetForm();
}

function resetForm() {
  for (const k in form) form[k] = "";
  currentStep.value = 1;
}

// ---------- Header / Loader Setup ----------
function toggleHamburger() {
  const nav = document.querySelector(".header-nav-lists");
  if (nav) nav.classList.toggle("open");
}

onMounted(() => {
  const loader = document.getElementById("loader");
  const scrollBar = document.getElementsByClassName("scroll-bar")[0];

  window.addEventListener("load", () => {
    loader?.classList.add("none");
    scrollBar?.classList.remove("scroll-bar");
  });

  // Load external hamburger behavior if available
  import("../../js/toggleHamburger.js").catch(() => {});
});

const photoPreview = ref(null);
const signaturePreview = ref(null);

function handlePhotoUpload(e) {
  const file = e.target.files[0];
  if (file) photoPreview.value = URL.createObjectURL(file);
}

function handleSignatureUpload(e) {
  const file = e.target.files[0];
  if (file) signaturePreview.value = URL.createObjectURL(file);
}
</script>


<style scoped>
@import "../../css/global-header.css";
@import "../../css/global-footer.css";
@import "../../css/accesibility.css";
@import "../../css/index.css";
@import "../../css/dashboard.css";
@import "../../css/driver.css";
</style>
