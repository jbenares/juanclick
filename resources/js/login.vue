<script setup>
import { ref } from "vue";
import axios from "axios";
import Navigation from "@/layouts/navigation.vue";
import FooterComponent from "@/layouts/footer.vue";

// 🟡 Modal visibility states
const showTerms = ref(false);
const showPrivacy = ref(false);

// 🟡 Loading states
const loadingFacebook = ref(false);
const loadingGoogle = ref(false);

const facebookLogin = async () => {
  try {
    loadingFacebook.value = true;
    const API_URL = "https://juanclick.ph/api";
    const redirectUrl = encodeURIComponent("https://juanclick.ph/services_registration");
    const res = await axios.get(`${API_URL}/auth/facebook/redirect`, {
      params: { redirect: redirectUrl },
    });
    window.location.href = res.data.url;
  } catch (error) {
    console.error("Facebook login error:", error);
    alert("Facebook login failed. Please try again.");
    loadingFacebook.value = false;
  }
};

const googleLogin = () => {
  loadingGoogle.value = true;
  const API_URL = "https://juanclick.ph/api";
  // Add a short delay so the spinner shows up before redirecting
  setTimeout(() => {
    window.location.href = `${API_URL}/auth/google/redirect`;
  }, 300);
};

// ✅ Loader control for page navigation
window.addEventListener("beforeunload", () => {
  document.getElementById("loader")?.classList.remove("hidden");
});
window.addEventListener("load", () => {
  document.getElementById("loader")?.classList.add("hidden");
});
</script>

<template>
  <Navigation />

  <div class="flex flex-col min-h-screen bg-[#0d0d0d] text-white overflow-y-auto">
    <!-- Page Loader -->
    <div
      id="loader"
      class="fixed inset-0 flex justify-center items-center bg-[#0d0d0d] z-50 transition-opacity duration-500"
    >
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="w-20 h-20">
        <path
          fill="#d4af37"
          d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,
          19.1-19.1S69.1,39.5,69.1,50"
        >
          <animateTransform
            attributeName="transform"
            type="rotate"
            dur="1s"
            from="0 50 50"
            to="360 50 50"
            repeatCount="indefinite"
          />
        </path>
      </svg>
    </div>

<!-- HERO SECTION -->
<div
  class="flex flex-col md:flex-row justify-between items-center px-5 md:px-[10%] pt-[150px] pb-12 md:pb-24 gap-8"
>
  <!-- Left -->
  <div class="flex-1 text-center md:text-left">
    <h2 class="text-2xl md:text-4xl text-[#d4af37] font-semibold mb-4">
      Connecting Juan and All
    </h2>
    <p class="text-gray-400 max-w-md mx-auto md:mx-0 leading-relaxed text-sm md:text-base">
      “Every connection starts with Juan. JuanClick offers different services to bring everyone closer.”
    </p>
  </div>

  <!-- Right: Login Box -->
  <div class="flex-1 flex justify-center items-center w-full">
    <form
      class="bg-gray-300 border-2 border-[#d4af37] rounded-2xl p-6 md:p-8 w-full max-w-md text-center"
      @submit.prevent
    >
      <img
        src="../img/JuanClickLogo.png"
        alt="JuanClick Logo"
        class="w-24 md:w-28 mx-auto mb-4 md:mb-6"
      />

      <h3 class="text-[#d4af37] font-bold text-lg md:text-xl mb-4 md:mb-6">
        Login to Your Account
      </h3>

      <div class="flex flex-col gap-3 md:gap-4 w-full">
        <!-- Facebook Login -->
        <button
          type="button"
          @click="facebookLogin"
          :disabled="loadingFacebook"
          class="flex items-center justify-center gap-2 bg-[#1877F2] text-white font-semibold rounded-lg py-2 transition transform hover:scale-105 hover:bg-[#0e63c7] disabled:opacity-70 disabled:cursor-not-allowed text-sm md:text-base"
        >
          <template v-if="!loadingFacebook">
            <img
              src="../img/facebook.svg"
              alt="facebook"
              class="w-4 md:w-5 h-4 md:h-5"
            />
            Continue with Facebook
          </template>
          <template v-else>
            <svg
              class="animate-spin h-5 w-5 text-white"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
            >
              <circle
                class="opacity-25"
                cx="12"
                cy="12"
                r="10"
                stroke="currentColor"
                stroke-width="4"
              ></circle>
              <path
                class="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
              ></path>
            </svg>
            Redirecting...
          </template>
        </button>

        <!-- Google Login -->
        <button
          type="button"
          @click="googleLogin"
          :disabled="loadingGoogle"
          class="flex items-center justify-center gap-2 bg-[#0d0d0d] border border-[#d4af37] text-[#d4af37] font-semibold rounded-lg py-2 transition transform hover:scale-105 hover:bg-[#1a1a1a] disabled:opacity-70 disabled:cursor-not-allowed text-sm md:text-base"
        >
          <template v-if="!loadingGoogle">
            <img
              src="../img/mail.svg"
              alt="email"
              class="w-4 md:w-5 h-4 md:h-5"
            />
            Continue with Email
          </template>
          <template v-else>
            <svg
              class="animate-spin h-5 w-5 text-[#d4af37]"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
            >
              <circle
                class="opacity-25"
                cx="12"
                cy="12"
                r="10"
                stroke="currentColor"
                stroke-width="4"
              ></circle>
              <path
                class="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
              ></path>
            </svg>
            Redirecting...
          </template>
        </button>
      </div>

      <!-- Terms & Privacy -->
      <p class="text-black text-xs md:text-sm mt-4 md:mt-6">
        By logging in, you agree to our
        <button
          type="button"
          @click="showTerms = true"
          class="text-[#d4af37] hover:underline"
          >Terms</button
        >
        and
        <button
          type="button"
          @click="showPrivacy = true"
          class="text-[#d4af37] hover:underline"
          >Privacy Policy</button
        >.
      </p>
    </form>
  </div>
</div>

    <!-- Terms Modal -->
    <div v-if="showTerms" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 px-4">
      <div class="bg-white rounded-2xl p-4 md:p-6 w-full max-w-md shadow-lg relative">
        <h2 class="text-lg md:text-xl font-semibold mb-3 text-[#d4af37]">Terms and Conditions</h2>
        <div class="text-sm md:text-base text-gray-700 space-y-2 max-h-64 md:max-h-80 overflow-y-auto">
          <p>Welcome to JuanClick! By using our services, you agree to the following terms:</p>
          <p>1. Provide accurate and complete information when registering or booking.</p>
          <p>2. JuanClick may modify or discontinue the service at any time.</p>
          <p>3. Users must follow all applicable laws and regulations.</p>
          <p>4. We are not liable for any external third-party delays or service issues.</p>
          <p>5. Continued use means acceptance of these terms.</p>
        </div>
        <button class="mt-4 md:mt-6 bg-[#d4af37] text-white px-4 py-2 rounded-lg block mx-auto hover:bg-[#c19b36]" @click="showTerms = false">
          Close
        </button>
      </div>
    </div>

    <!-- Privacy Modal -->
    <div v-if="showPrivacy" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 px-4">
      <div class="bg-white rounded-2xl p-4 md:p-6 w-full max-w-md shadow-lg relative">
        <h2 class="text-lg md:text-xl font-semibold mb-3 text-[#d4af37]">Privacy Policy</h2>
        <div class="text-sm md:text-base text-gray-700 space-y-2 max-h-64 md:max-h-80 overflow-y-auto">
          <p>We respect your privacy and ensure that your data is protected.</p>
          <p>1. We only collect necessary information for login and booking.</p>
          <p>2. Your data will not be sold or shared without consent.</p>
          <p>3. All communications are encrypted for your safety.</p>
          <p>4. You can request deletion or review of your data anytime.</p>
        </div>
        <button class="mt-4 md:mt-6 bg-[#d4af37] text-white px-4 py-2 rounded-lg block mx-auto hover:bg-[#c19b36]" @click="showPrivacy = false">
          Close
        </button>
      </div>
    </div>

    <FooterComponent />
  </div>
</template>
