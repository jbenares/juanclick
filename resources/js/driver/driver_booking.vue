<script setup>
import { ref } from "vue";
import Navigation from "@/layouts/navigation.vue";
import FooterComponent from "@/layouts/footer.vue";

// 🟡 Reactive form data
const form = ref({
  pickup: "",
  destination: "",
  time: "",
  notes: "",
});

// 🟡 Sample booking data
const bookings = ref([
  {
    id: 1,
    driver: "Juan Dela Cruz",
    pickup: "SM City Cebu",
    destination: "IT Park",
    time: "2025-10-27 09:30 AM",
    amount: 150,
    status: "Completed",
  },
  {
    id: 2,
    driver: "Mark Reyes",
    pickup: "Ayala Center",
    destination: "Mactan Airport",
    time: "2025-10-26 07:00 AM",
    amount: 450,
    status: "Completed",
  },
]);

// 🟡 Book a new driver
const bookDriver = () => {
  const newBooking = {
    id: Date.now(),
    driver: "Pending Assignment",
    pickup: form.value.pickup,
    destination: form.value.destination,
    time: new Date(form.value.time).toLocaleString(),
    amount: Math.floor(Math.random() * 300 + 100),
    status: "Ongoing",
  };

  bookings.value.unshift(newBooking);
  alert("✅ Booking successfully created!");

  form.value = { pickup: "", destination: "", time: "", notes: "" };
};
</script>

<template>
  <Navigation />

  <div class="flex flex-col min-h-screen bg-[#0d0d0d] text-white pt-[150px]">
    <main class="flex-grow max-w-6xl w-full mx-auto p-4 md:p-10 space-y-8">

      <!-- ✅ BOOK DRIVER FORM -->
      <section class="bg-[#1a1a1a] border border-[#d4af37]/40 p-6 md:p-8 rounded-2xl shadow-md">
        <h2 class="text-xl md:text-2xl font-semibold text-[#d4af37] mb-4 md:mb-6">Book a Driver</h2>

        <form @submit.prevent="bookDriver" class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
          <div>
            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-300">Pickup Location</label>
            <input
              v-model="form.pickup"
              type="text"
              placeholder="Enter pickup location"
              class="w-full px-3 md:px-4 py-2 rounded-lg bg-[#2a2a2a] border border-[#d4af37]/40 focus:border-[#d4af37] outline-none text-sm md:text-base"
              required
            />
          </div>

          <div>
            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-300">Destination</label>
            <input
              v-model="form.destination"
              type="text"
              placeholder="Enter destination"
              class="w-full px-3 md:px-4 py-2 rounded-lg bg-[#2a2a2a] border border-[#d4af37]/40 focus:border-[#d4af37] outline-none text-sm md:text-base"
              required
            />
          </div>

          <div>
            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-300">Date & Time</label>
            <input
              v-model="form.time"
              type="datetime-local"
              class="w-full px-3 md:px-4 py-2 rounded-lg bg-[#2a2a2a] border border-[#d4af37]/40 focus:border-[#d4af37] outline-none text-sm md:text-base"
              required
            />
          </div>

          <div>
            <label class="block mb-1 text-xs md:text-sm font-medium text-gray-300">Notes (optional)</label>
            <textarea
              v-model="form.notes"
              rows="2"
              placeholder="Add details for driver..."
              class="w-full px-3 md:px-4 py-2 rounded-lg bg-[#2a2a2a] border border-[#d4af37]/40 focus:border-[#d4af37] outline-none text-sm md:text-base"
            ></textarea>
          </div>

          <div class="md:col-span-2 flex justify-center md:justify-end">
            <button
              type="submit"
              class="w-full md:w-auto bg-[#d4af37] hover:bg-[#c09c2e] text-black font-semibold px-4 md:px-6 py-2 rounded-lg transition text-sm md:text-base"
            >
              Confirm Booking
            </button>
          </div>
        </form>
      </section>

      <!-- ✅ ACTIVE BOOKINGS TABLE -->
      <section class="bg-[#1a1a1a] border border-[#d4af37]/40 p-6 md:p-8 rounded-2xl shadow-md">
        <h2 class="text-xl md:text-2xl font-semibold text-[#d4af37] mb-4 md:mb-6">My Active & Recent Bookings</h2>

        <div class="overflow-x-auto">
          <table class="min-w-full border border-[#d4af37]/40 rounded-lg text-sm md:text-base">
            <thead class="bg-[#2a2a2a] text-[#d4af37]">
              <tr>
                <th class="px-2 md:px-4 py-2 text-left">Driver</th>
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
                <td class="px-2 md:px-4 py-2">{{ trip.driver }}</td>
                <td class="px-2 md:px-4 py-2">{{ trip.pickup }}</td>
                <td class="px-2 md:px-4 py-2">{{ trip.destination }}</td>
                <td class="px-2 md:px-4 py-2">{{ trip.time }}</td>
                <td class="px-2 md:px-4 py-2 text-[#d4af37] font-semibold">
                  ₱{{ trip.amount.toLocaleString() }}
                </td>
                <td class="px-2 md:px-4 py-2">
                  <span
                    :class="[
                      'px-2 md:px-3 py-1 rounded-full text-xs md:text-sm font-medium',
                      trip.status === 'Completed'
                        ? 'bg-green-700/30 text-green-400'
                        : trip.status === 'Ongoing'
                        ? 'bg-yellow-700/30 text-yellow-400'
                        : 'bg-gray-700/30 text-gray-300'
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
