<script setup>
import Navigation from "@/layouts/navigation.vue";
import FooterComponent from "@/layouts/footer.vue";
import { ref } from "vue";
import { useRouter } from "vue-router"; // ✅ Import router

const router = useRouter();

const availableServices = ref([
  {
    name: "Driver",
    description: "Professional and licensed drivers available for immediate bookings.",
  },
  {
    name: "Plumber",
    description: "Quick and reliable plumbing services for your home or business.",
  },
  {
    name: "Nail Technician",
    description: "Expert nail care and beauty services at your location.",
  },
  {
    name: "Carpenter",
    description: "Skilled carpenters ready to handle furniture and repair work.",
  },
]);

const bookService = (service) => {
  if (service.name === "Driver") {
    // ✅ Redirect to driver booking page
    router.push("/driver_booking");
  } else {
    alert(`You are booking the ${service.name} service.`);
  }
};
</script>

<template>
  <Navigation />

  <div class="flex flex-col min-h-screen bg-[#0d0d0d] text-white pt-[150px]">
    <main class="flex-1">
      <!-- ✅ Title Section -->
      <section class="text-center py-16 bg-[#0d0d0d] border-b border-[#d4af37]/30">
        <h1 class="text-3xl md:text-4xl font-bold text-[#d4af37] mb-4">
          Services Available Today
        </h1>
        <p class="text-gray-400 max-w-2xl mx-auto">
          Find skilled professionals available right now. Click “Book Now” to get started.
        </p>
      </section>

      <!-- ✅ Services Grid -->
      <section
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 px-6 md:px-12 py-12 max-w-7xl mx-auto"
      >
        <div
          v-for="(service, index) in availableServices"
          :key="index"
          class="bg-[#1a1a1a] border border-[#d4af37]/40 rounded-2xl p-6 shadow-md hover:bg-[#2a2a2a] hover:shadow-lg transition duration-300"
        >
          <h3 class="text-[#d4af37] text-xl font-semibold mb-3">
            {{ service.name }}
          </h3>
          <p class="text-gray-300 mb-4">{{ service.description }}</p>
          <p class="text-sm mb-4">
            <strong>Status:</strong>
            <span class="text-green-400 font-semibold">Available</span>
          </p>
          <button
            @click="bookService(service)"
            class="w-full bg-[#d4af37] text-black font-semibold py-2 rounded-lg hover:bg-[#c19e35] transition"
          >
            Book Now
          </button>
        </div>
      </section>
    </main>

    <FooterComponent />
  </div>
</template>