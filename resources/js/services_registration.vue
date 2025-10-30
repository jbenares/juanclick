<script setup>
import { ref, computed } from "vue";
import Navigation from "@/layouts/navigation.vue";
import FooterComponent from "@/layouts/footer.vue";

const step = ref(1);
const totalSteps = 5;

const form = ref({
  firstName: "",
  middleName: "",
  lastName: "",
  birthday: "",
  contact: "",
  email: "",
  gender: "",
  nationality: "",
  blk: "",
  street: "",
  brgy: "",
  purok: "",
  city: "",
  province: "",
  country: "",
  zip: "",
  service: "",
  companyCode: "",
  license: "",
  expiration: "",
  emergencyName: "",
  emergencyRelation: "",
  emergencyAddress: "",
  emergencyContact: "",
});

// 🟡 Progress bar computed
const progressPercent = computed(() => (step.value / totalSteps) * 100);

const nextStep = () => {
  if (step.value < totalSteps) step.value++;
};

const prevStep = () => {
  if (step.value > 1) step.value--;
};
</script>

<template>
  <Navigation />

  <div class="flex flex-col min-h-screen bg-[#383838] text-white pt-[150px]">
    <main class="flex-1 py-12 px-6 md:px-12 max-w-5xl mx-auto w-full">
      <h1 class="text-3xl md:text-4xl font-bold text-[#d4af37] text-center mb-12">
        Service Registration Form
      </h1>

      <!-- ✅ Card Wrapper -->
      <div class="bg-[#1a1a1a] border border-[#d4af37] rounded-2xl p-8 shadow-md relative overflow-hidden transition">
        <!-- 🟡 Progress Bar -->
        <div class="absolute top-0 left-0 w-full h-2 bg-[#2b2b2b] rounded-t-2xl overflow-hidden">
          <div
            class="h-2 bg-[#d4af37] transition-all duration-500 ease-out"
            :style="{ width: progressPercent + '%' }"
          ></div>
        </div>

        <!-- ✅ Step Indicator -->
        <div class="flex justify-between mb-10 text-sm text-gray-400 mt-2">
          <span :class="step >= 1 ? 'text-[#d4af37] font-semibold' : ''">Step 1</span>
          <span :class="step >= 2 ? 'text-[#d4af37] font-semibold' : ''">Step 2</span>
          <span :class="step >= 3 ? 'text-[#d4af37] font-semibold' : ''">Step 3</span>
          <span :class="step >= 4 ? 'text-[#d4af37] font-semibold' : ''">Step 4</span>
          <span :class="step >= 5 ? 'text-[#d4af37] font-semibold' : ''">Step 5</span>
        </div>

        <!-- ✅ Step 1: Personal Info -->
        <section v-if="step === 1" class="space-y-6">
          <h2 class="text-2xl font-semibold text-[#d4af37] mb-6">Personal Information</h2>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div
              v-for="(label, field) in {
                firstName: 'First Name',
                middleName: 'Middle Name',
                lastName: 'Last Name',
                birthday: 'Birthday',
                contact: 'Contact Number',
                email: 'Email Address',
                gender: 'Gender',
                nationality: 'Nationality'
              }"
              :key="field"
            >
              <label class="block text-gray-300 font-medium mb-1">{{ label }}</label>

              <template v-if="label === 'Gender'">
                <select
                  v-model="form[field]"
                  class="w-full bg-[#2b2b2b] border border-[#d4af37] rounded-md p-2 text-white"
                >
                  <option value="">Select</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Other</option>
                </select>
              </template>

              <template v-else-if="label === 'Birthday'">
                <input
                  v-model="form[field]"
                  type="date"
                  class="w-full bg-[#2b2b2b] border border-[#d4af37] rounded-md p-2 text-white"
                />
              </template>

              <template v-else>
                <input
                  v-model="form[field]"
                  type="text"
                  class="w-full bg-[#2b2b2b] border border-[#d4af37] rounded-md p-2 text-white"
                />
              </template>
            </div>
          </div>

          <div class="flex justify-end mt-8">
            <button
              @click="nextStep"
              class="bg-[#d4af37] text-black font-semibold px-6 py-2 rounded-lg hover:bg-[#ffd700] transition"
            >
              Next
            </button>
          </div>
        </section>

        <!-- ✅ Step 2: Address -->
        <section v-if="step === 2" class="space-y-6">
          <h2 class="text-2xl font-semibold text-[#d4af37] mb-6">Address Details</h2>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div
              v-for="(label, field) in {
                blk: 'Blk / Lot / House No.',
                street: 'Street Name',
                brgy: 'Barangay',
                purok: 'Purok / Zone',
                city: 'City / Municipality',
                province: 'Province',
                country: 'Country',
                zip: 'Zip Code'
              }"
              :key="field"
            >
              <label class="block text-gray-300 font-medium mb-1">{{ label }}</label>
              <input
                v-model="form[field]"
                type="text"
                class="w-full bg-[#2b2b2b] border border-[#d4af37] rounded-md p-2 text-white"
              />
            </div>
          </div>

          <div class="flex justify-between mt-8">
            <button
              @click="prevStep"
              class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-400 transition"
            >
              Previous
            </button>
            <button
              @click="nextStep"
              class="bg-[#d4af37] text-black font-semibold px-6 py-2 rounded-lg hover:bg-[#ffd700] transition"
            >
              Next
            </button>
          </div>
        </section>

        <!-- ✅ Step 3: Service -->
        <section v-if="step === 3" class="space-y-6">
          <h2 class="text-2xl font-semibold text-[#d4af37] mb-6">Services Offered</h2>

          <div>
            <label class="block text-gray-300 font-medium mb-1">Select Service</label>
            <select
              v-model="form.service"
              class="w-full bg-[#2b2b2b] border border-[#d4af37] rounded-md p-2 text-white"
            >
              <option value="">Select</option>
              <option>Driver</option>
              <option>Plumber</option>
              <option>Nail Technician</option>
              <option>Carpenter</option>
            </select>
          </div>

          <div
            v-if="form.service === 'Driver'"
            class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4"
          >
        <div
          v-for="(label, field) in {
            companyCode: 'Company Code',
            license: 'Driver’s License Number',
            expiration: 'License Expiration Date'
          }"
          :key="field"
          class="mb-4 relative"
        >
          <label class="block text-gray-300 font-medium mb-1">{{ label }}</label>

          <!-- ✅ Input Wrapper -->
          <div class="relative">
            <input
              :type="label.includes('Date') ? 'date' : 'text'"
              v-model="form[field]"
              class="w-full bg-[#2b2b2b] border border-[#d4af37] rounded-md p-2 pr-8 text-white"
            />

            <!-- ✅ Tooltip Icon (only for Company Code) -->
            <div
              v-if="field === 'companyCode'"
              class="absolute right-2 top-1/2 -translate-y-1/2 group cursor-pointer"
            >
              <span
                class="text-[#d4af37] text-xs border border-[#d4af37] rounded-full px-[6px] py-[1px] hover:bg-[#d4af37] hover:text-black transition"
              >
                i
              </span>

              <!-- ✅ Tooltip Message -->
              <div
                class="absolute bottom-full right-0 mb-2 hidden group-hover:block bg-[#1a1a1a] text-gray-200 text-xs rounded-md px-3 py-2 shadow-[0_0_10px_rgba(212,175,55,0.4)] border border-[#d4af37]/70 w-60 text-center z-10"
              >
                You can get your company code from your registered company.
              </div>
            </div>
          </div>
        </div>
          </div>

          <div class="flex justify-between mt-8">
            <button
              @click="prevStep"
              class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-400 transition"
            >
              Previous
            </button>
            <button
              @click="nextStep"
              class="bg-[#d4af37] text-black font-semibold px-6 py-2 rounded-lg hover:bg-[#ffd700] transition"
            >
              Next
            </button>
          </div>
        </section>

        <!-- ✅ Step 4: Emergency -->
        <section v-if="step === 4" class="space-y-6">
          <h2 class="text-2xl font-semibold text-[#d4af37] mb-6">
            Emergency Contact Details
          </h2>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div
              v-for="(label, field) in {
                emergencyName: 'Full Name',
                emergencyRelation: 'Relationship',
                emergencyAddress: 'Address',
                emergencyContact: 'Contact Number'
              }"
              :key="field"
              :class="field === 'emergencyAddress' ? 'md:col-span-2' : ''"
            >
              <label class="block text-gray-300 font-medium mb-1">{{ label }}</label>
              <input
                v-model="form[field]"
                type="text"
                class="w-full bg-[#2b2b2b] border border-[#d4af37] rounded-md p-2 text-white"
              />
            </div>
          </div>

          <div class="flex justify-between mt-8">
            <button
              @click="prevStep"
              class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-400 transition"
            >
              Previous
            </button>
            <button
              @click="nextStep"
              class="bg-[#d4af37] text-black font-semibold px-6 py-2 rounded-lg hover:bg-[#ffd700] transition"
            >
              Next
            </button>
          </div>
        </section>

        <!-- ✅ Step 5: Uploads -->
        <section v-if="step === 5" class="space-y-6">
          <h2 class="text-2xl font-semibold text-[#d4af37] mb-6">Uploads</h2>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div
              v-for="label in ['Upload ID', 'Upload Photo', 'Upload Signature']"
              :key="label"
            >
              <label class="block text-gray-300 font-medium mb-1">{{ label }}</label>
              <input
                type="file"
                class="w-full bg-[#2b2b2b] border border-[#d4af37] rounded-md p-2 text-white
                       file:cursor-pointer file:bg-[#d4af37] file:text-black file:font-semibold
                       file:rounded file:px-3 file:py-1 hover:file:bg-[#ffd700]"
              />
            </div>
          </div>

          <div class="flex justify-between mt-8">
            <button
              @click="prevStep"
              class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-400 transition"
            >
              Previous
            </button>
            <button
              class="bg-[#d4af37] text-black font-semibold px-6 py-2 rounded-lg hover:bg-[#ffd700] transition"
            >
              Submit
            </button>
          </div>
        </section>
      </div>
    </main>

    <FooterComponent />
  </div>
</template>