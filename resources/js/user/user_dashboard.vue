<script setup>
import { ref } from "vue";
import Navigation from "@/layouts/navigation.vue";
import FooterComponent from "@/layouts/footer.vue";

// 🟡 Example user profile
const user = ref({
  name: "Maria Santos",
  email: "maria.santos@example.com",
  phone: "+63 912 345 6789",
  address: "Cebu City, Philippines",
  joined: "January 2024",
  photo: "/img/default_profile.png", // replace with your actual default image path
});

// 🟡 Example service history
const services = ref([
  {
    id: 1,
    type: "Driver Booking",
    driver: "Juan Dela Cruz",
    date: "2025-10-20 09:00 AM",
    amount: 200,
    status: "Completed",
  },
  {
    id: 2,
    type: "Parcel Delivery",
    driver: "Mark Reyes",
    date: "2025-10-24 02:00 PM",
    amount: 350,
    status: "Ongoing",
  },
  {
    id: 3,
    type: "Driver Booking",
    driver: "Carlos Mendoza",
    date: "2025-09-10 05:30 PM",
    amount: 180,
    status: "Completed",
  },
]);

// 🟡 Handle new profile photo upload
const handlePhotoUpload = (e) => {
  const file = e.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (event) => {
      user.value.photo = event.target.result;
    };
    reader.readAsDataURL(file);
  }
};
</script>

<template>
  <Navigation />

  <div class="flex flex-col min-h-screen bg-[#0d0d0d] text-white pt-[150px]">
    <main class="flex-grow max-w-6xl w-full mx-auto p-4 md:p-10 space-y-8">

      <!-- ✅ USER PROFILE -->
      <section class="bg-[#1a1a1a] border border-[#d4af37]/40 p-6 md:p-8 rounded-2xl shadow-md">
        <h2 class="text-xl md:text-2xl font-semibold text-[#d4af37] mb-4 md:mb-6">My Profile</h2>

        <div class="flex flex-col md:flex-row items-center md:items-start gap-6 md:gap-8">
          <!-- 🖼️ PROFILE IMAGE -->
          <div class="flex flex-col items-center w-full md:w-auto">
            <img
              :src="user.photo"
              alt="Profile"
              class="w-24 h-24 md:w-32 md:h-32 rounded-full border-4 border-[#d4af37]/60 object-cover"
            />
            <label
              for="profilePic"
              class="mt-2 md:mt-3 text-sm md:text-base cursor-pointer bg-[#d4af37] hover:bg-[#c09c2e]
                     text-black font-semibold px-3 md:px-4 py-1 md:py-1.5 rounded-lg transition"
            >
              Change Photo
            </label>
            <input
              id="profilePic"
              type="file"
              accept="image/*"
              class="hidden"
              @change="handlePhotoUpload"
            />
          </div>

          <!-- 🧾 PROFILE DETAILS -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 w-full">
            <div>
              <p class="text-gray-400 text-xs md:text-sm">Full Name</p>
              <p class="text-sm md:text-lg font-medium">{{ user.name }}</p>
            </div>
            <div>
              <p class="text-gray-400 text-xs md:text-sm">Email</p>
              <p class="text-sm md:text-lg font-medium">{{ user.email }}</p>
            </div>
            <div>
              <p class="text-gray-400 text-xs md:text-sm">Contact Number</p>
              <p class="text-sm md:text-lg font-medium">{{ user.phone }}</p>
            </div>
            <div>
              <p class="text-gray-400 text-xs md:text-sm">Address</p>
              <p class="text-sm md:text-lg font-medium">{{ user.address }}</p>
            </div>
            <div>
              <p class="text-gray-400 text-xs md:text-sm">Member Since</p>
              <p class="text-sm md:text-lg font-medium">{{ user.joined }}</p>
            </div>
          </div>
        </div>

        <div class="mt-6 md:mt-8 flex justify-center md:justify-end">
          <button
            class="w-full md:w-auto bg-[#d4af37] hover:bg-[#c09c2e] text-black font-semibold px-4 md:px-6 py-2 rounded-lg transition"
          >
            Edit Profile
          </button>
        </div>
      </section>

      <!-- ✅ SERVICE HISTORY -->
      <section class="bg-[#1a1a1a] border border-[#d4af37]/40 p-6 md:p-8 rounded-2xl shadow-md">
        <h2 class="text-xl md:text-2xl font-semibold text-[#d4af37] mb-4 md:mb-6">Service History</h2>

        <div class="overflow-x-auto">
          <table class="min-w-full border border-[#d4af37]/40 rounded-lg text-sm md:text-base">
            <thead class="bg-[#2a2a2a] text-[#d4af37]">
              <tr>
                <th class="px-3 md:px-4 py-2 text-left">Service Type</th>
                <th class="px-3 md:px-4 py-2 text-left">Driver</th>
                <th class="px-3 md:px-4 py-2 text-left">Date</th>
                <th class="px-3 md:px-4 py-2 text-left">Amount</th>
                <th class="px-3 md:px-4 py-2 text-left">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="service in services"
                :key="service.id"
                class="border-t border-[#d4af37]/30 hover:bg-[#2a2a2a] transition"
              >
                <td class="px-3 md:px-4 py-2">{{ service.type }}</td>
                <td class="px-3 md:px-4 py-2">{{ service.driver }}</td>
                <td class="px-3 md:px-4 py-2">{{ service.date }}</td>
                <td class="px-3 md:px-4 py-2 text-[#d4af37] font-semibold">
                  ₱{{ service.amount.toLocaleString() }}
                </td>
                <td class="px-3 md:px-4 py-2">
                  <span
                    :class="[
                      'px-2 md:px-3 py-1 rounded-full text-xs md:text-sm font-medium',
                      service.status === 'Completed'
                        ? 'bg-green-700/30 text-green-400'
                        : service.status === 'Ongoing'
                        ? 'bg-yellow-700/30 text-yellow-400'
                        : 'bg-gray-700/30 text-gray-300'
                    ]"
                  >
                    {{ service.status }}
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </main>

    <FooterComponent />
  </div>
</template>

