<script setup>
import Navigation from "@/layouts/navigation.vue";
import FooterComponent from "@/layouts/footer.vue";
import { ref } from "vue";

// 🧑‍✈️ DRIVER INFO
const driver = ref({
  name: "Juan Dela Cruz",
  license: "A1234567",
  vehicle: "Toyota Vios 2021",
  status: "Available",
  earnings: 14500,
  photo: "/img/default_profile.png", // 🖼️ default driver photo
});

// 📸 Handle new photo upload
const handlePhotoUpload = (e) => {
  const file = e.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (event) => {
      driver.value.photo = event.target.result;
    };
    reader.readAsDataURL(file);
  }
};

// 📅 ACTIVE BOOKINGS
const bookings = ref([
  {
    id: 1,
    passenger: "Maria Santos",
    pickup: "SM City Cebu",
    destination: "Ayala Center Cebu",
    time: "10:30 AM",
    amount: "250",
    status: "Completed",
  },
  {
    id: 2,
    passenger: "John Reyes",
    pickup: "IT Park",
    destination: "Mactan Airport",
    time: "2:00 PM",
    amount: "300",
    status: "Ongoing",
  },
]);

// 🚗 UPCOMING TRIPS
const upcoming = ref([
  { id: 1, passenger: "Juan Dela Cruz", pickup: "Makati", destination: "Quezon City", time: "10:00 AM", amount: "250" },
  { id: 2, passenger: "Maria Santos", pickup: "Pasig", destination: "Taguig", time: "11:30 AM", amount: "300" },
]);

// 🟢 STATUS & ACTIONS
const toggleStatus = () => {
  driver.value.status =
    driver.value.status === "Available" ? "Not Available" : "Available";
};

const acceptTrip = (id) => {
  const trip = upcoming.value.find((t) => t.id === id);
  if (trip) {
    alert(`✅ Trip from ${trip.pickup} to ${trip.destination} accepted!`);
    upcoming.value = upcoming.value.filter((t) => t.id !== id);
  }
};

const declineTrip = (id) => {
  const trip = upcoming.value.find((t) => t.id === id);
  if (trip) {
    alert(`❌ Trip from ${trip.pickup} to ${trip.destination} declined.`);
    upcoming.value = upcoming.value.filter((t) => t.id !== id);
  }
};
</script>

<template>
  <Navigation />

  <div class="flex flex-col min-h-screen bg-[#0d0d0d] text-white pt-[150px]">
    <main class="flex-1 py-6 px-4 md:px-10 max-w-7xl mx-auto w-full space-y-8">
      <!-- ✅ Dashboard Title -->
      <h1 class="text-2xl md:text-3xl font-bold text-[#d4af37] text-center mb-6 md:mb-10">
        Driver Services Dashboard
      </h1>

      <!-- ✅ Profile Summary -->
      <section class="bg-[#1a1a1a] border border-[#d4af37]/40 p-6 md:p-8 rounded-2xl shadow-md">
        <h2 class="text-xl md:text-2xl font-semibold text-[#d4af37] mb-4 md:mb-6">Profile Summary</h2>

        <div class="flex flex-col md:flex-row items-center md:items-start gap-6 md:gap-8">
          <!-- 🖼️ PROFILE PICTURE -->
          <div class="flex flex-col items-center w-full md:w-auto">
            <img
              :src="driver.photo"
              alt="Driver Photo"
              class="w-24 h-24 md:w-32 md:h-32 rounded-full border-4 border-[#d4af37]/60 object-cover"
            />
            <label
              for="driverPhoto"
              class="mt-2 md:mt-3 text-sm md:text-base cursor-pointer bg-[#d4af37] hover:bg-[#c09c2e]
                     text-black font-semibold px-3 md:px-4 py-1 md:py-1.5 rounded-lg transition"
            >
              Change Photo
            </label>
            <input
              id="driverPhoto"
              type="file"
              accept="image/*"
              class="hidden"
              @change="handlePhotoUpload"
            />
          </div>

          <!-- 📋 PROFILE INFO -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 w-full">
            <div class="space-y-1">
              <p class="text-sm md:text-base font-medium">
                Name: <span class="text-[#d4af37] font-semibold">{{ driver.name }}</span>
              </p>
              <p class="text-sm md:text-base font-medium">
                License No.: <span class="text-[#d4af37] font-semibold">{{ driver.license }}</span>
              </p>
              <p class="text-sm md:text-base font-medium">
                Vehicle: <span class="text-[#d4af37] font-semibold">{{ driver.vehicle }}</span>
              </p>
            </div>

            <div class="space-y-2">
              <div class="flex flex-col md:flex-row items-start md:items-center gap-2 md:gap-4">
                <p class="text-sm md:text-base font-medium">
                  Status:
                  <span
                    :class="[
                      'font-semibold px-2 md:px-3 py-1 rounded-full ml-1 md:ml-2 text-xs md:text-sm',
                      driver.status === 'Available'
                        ? 'bg-green-700/30 text-green-400'
                        : 'bg-red-700/30 text-red-400',
                    ]"
                  >
                    {{ driver.status }}
                  </span>
                </p>

                <button
                  @click="toggleStatus"
                  class="w-full md:w-auto bg-[#d4af37] text-black px-3 md:px-4 py-1 md:py-1.5 rounded-md hover:bg-[#c19e35] transition font-semibold text-sm md:text-base"
                >
                  {{ driver.status === 'Available' ? 'Go Offline' : 'Go Online' }}
                </button>
              </div>

              <p class="text-sm md:text-base font-medium">
                Total Earnings:
                <span class="text-[#d4af37] font-bold">
                  ₱{{ driver.earnings.toLocaleString() }}
                </span>
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- ✅ Upcoming Trips -->
      <section class="bg-[#1a1a1a] border border-[#d4af37]/40 p-6 md:p-8 rounded-2xl shadow-md">
        <h2 class="text-xl md:text-2xl font-semibold text-[#d4af37] mb-4 md:mb-6">Upcoming Trips</h2>

        <div v-if="upcoming.length > 0" class="space-y-4">
          <div
            v-for="trip in upcoming"
            :key="trip.id"
            class="p-4 md:p-5 border border-[#d4af37]/30 rounded-lg hover:bg-[#2a2a2a] transition flex flex-col md:flex-row md:items-center md:justify-between gap-3"
          >
            <div class="space-y-1">
              <p class="text-sm md:text-base font-semibold text-[#d4af37]">
                Passenger: <span class="text-white">{{ trip.passenger }}</span>
              </p>
              <p class="text-xs md:text-sm">Pickup: <span class="text-gray-300">{{ trip.pickup }}</span></p>
              <p class="text-xs md:text-sm">Destination: <span class="text-gray-300">{{ trip.destination }}</span></p>
              <p class="text-xs md:text-sm">Time: <span class="text-gray-300">{{ trip.time }}</span></p>
              <p class="text-xs md:text-sm">Amount: <span class="text-[#d4af37]">₱{{ trip.amount }}</span></p>
            </div>

            <div class="flex flex-col md:flex-row gap-2 md:gap-3 w-full md:w-auto">
              <button
                @click="acceptTrip(trip.id)"
                class="w-full md:w-auto bg-[#d4af37] text-black font-medium px-3 md:px-5 py-1.5 md:py-2 rounded-md hover:bg-[#c19e35] transition text-sm md:text-base"
              >
                Accept
              </button>
              <button
                @click="declineTrip(trip.id)"
                class="w-full md:w-auto bg-red-600 text-white font-medium px-3 md:px-5 py-1.5 md:py-2 rounded-md hover:bg-red-700 transition text-sm md:text-base"
              >
                Decline
              </button>
            </div>
          </div>
        </div>

        <p v-else class="text-gray-400 italic text-center text-sm md:text-base">
          No upcoming trips scheduled.
        </p>
      </section>

      <!-- ✅ Active Bookings -->
      <section class="bg-[#1a1a1a] border border-[#d4af37]/40 p-6 md:p-8 rounded-2xl shadow-md">
        <h2 class="text-xl md:text-2xl font-semibold text-[#d4af37] mb-4 md:mb-6">Active & Recent Bookings</h2>

        <div class="overflow-x-auto">
          <table class="min-w-full border border-[#d4af37]/40 rounded-lg overflow-hidden text-sm md:text-base">
            <thead class="bg-[#2a2a2a] text-[#d4af37]">
              <tr>
                <th class="px-2 md:px-4 py-2 text-left">Passenger</th>
                <th class="px-2 md:px-4 py-2 text-left">Pickup</th>
                <th class="px-2 md:px-4 py-2 text-left">Destination</th>
                <th class="px-2 md:px-4 py-2 text-left">Time</th>
                <th class="px-2 md:px-4 py-2 text-left">Amount</th>
                <th class="px-2 md:px-4 py-2 text-left">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="trip in bookings"
                :key="trip.id"
                class="border-t border-[#d4af37]/30 hover:bg-[#2a2a2a] transition"
              >
                <td class="px-2 md:px-4 py-2">{{ trip.passenger }}</td>
                <td class="px-2 md:px-4 py-2">{{ trip.pickup }}</td>
                <td class="px-2 md:px-4 py-2">{{ trip.destination }}</td>
                <td class="px-2 md:px-4 py-2">{{ trip.time }}</td>
                <td class="px-2 md:px-4 py-2 text-[#d4af37] font-bold">
                  ₱{{ trip.amount ? trip.amount.toLocaleString() : '100' }}
                </td>
                <td class="px-2 md:px-4 py-2">
                  <span
                    :class="[ 
                      'px-2 md:px-3 py-1 rounded-full text-xs md:text-sm font-medium',
                      trip.status === 'Completed'
                        ? 'bg-green-700/30 text-green-400'
                        : trip.status === 'Ongoing'
                        ? 'bg-yellow-700/30 text-yellow-400'
                        : 'bg-gray-700/30 text-gray-300',
                    ]"
                  >
                    {{ trip.status }}
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
