<script setup>
import { ref } from "vue";
import Navigation from "@/layouts/navigation.vue";
import FooterComponent from "@/layouts/footer.vue";

const selectedOption = ref(null);

const selectOption = (option) => {
  selectedOption.value = option;
};
</script>

<template>
  <Navigation />

  <div class="flex flex-col min-h-screen bg-[#0d0d0d] text-white pt-[150px]">
    <!-- ✅ Main Dashboard -->
    <main class="flex-1 py-16 px-6 flex flex-col items-center text-center">
      <h1 class="text-3xl md:text-4xl font-bold text-[#d4af37] mb-8">
        Welcome to Your Dashboard
      </h1>

      <p class="text-gray-400 mb-10 max-w-lg">
        Choose what you want to do today — offer your skills and services or avail services from others.
      </p>

      <!-- ✅ Options -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl w-full">
        <!-- Offer Services -->
        <div
          @click="$router.push('/services_registration')"
          class="cursor-pointer border border-[#d4af37]/50 rounded-2xl p-10 bg-[#1a1a1a]
                 transform transition-all duration-300 hover:-translate-y-2
                 hover:shadow-[0_0_25px_rgba(212,175,55,0.5)] hover:border-[#d4af37]"
          :class="selectedOption === 'offer' ? 'border-[#d4af37]' : ''"
        >
          <h2 class="text-2xl font-semibold text-[#d4af37] mb-3">
            Offer Services
          </h2>
          <p class="text-gray-300">
            Provide your skills and earn by connecting with clients looking for your expertise.
          </p>
        </div>

        <!-- Avail Services -->
        <div
          @click="$router.push('/available_services')"
          class="cursor-pointer border border-[#d4af37]/50 rounded-2xl p-10 bg-[#1a1a1a]
                 transform transition-all duration-300 hover:-translate-y-2
                 hover:shadow-[0_0_25px_rgba(212,175,55,0.5)] hover:border-[#d4af37]"
          :class="selectedOption === 'avail' ? 'border-[#d4af37]' : ''"
        >
          <h2 class="text-2xl font-semibold text-[#d4af37] mb-3">
            Avail Services
          </h2>
          <p class="text-gray-300">
            Find trusted professionals and skilled individuals ready to help you today.
          </p>
        </div>
      </div>
    </main>

    <FooterComponent />
  </div>
</template>