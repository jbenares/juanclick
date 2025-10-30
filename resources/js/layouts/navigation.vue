<script setup>
import { ref } from "vue";

const isOpen = ref(false);
const toggleHamburger = () => {
  isOpen.value = !isOpen.value;
};
</script>

<template>
  <header class="bg-white text-black shadow-md fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-5">
      <nav class="flex justify-between items-center py-3 md:py-1">
        <!-- Logo -->
        <div>
          <a href="/">
            <img src="@/../img/JuanClickLogo.png" alt="JuanClick logo" class="w-28 h-auto" />
          </a>
        </div>

        <!-- Desktop Links -->
        <ul class="hidden md:flex space-x-6 items-center font-medium">
          <li><a href="/" class="text-[#d4af37] font-semibold hover:text-yellow-500">Home</a></li>
          <li><a href="/roomandsuites" class="hover:text-yellow-500">Jobs and Skills</a></li>
          <li><a href="/available_services" class="hover:text-yellow-500">Services</a></li>
          <li>
            <a
              href="/available_services"
              class="bg-[#d4af37] text-black px-3 py-1.5 rounded-md font-semibold hover:bg-yellow-400 transition"
            >
              BOOK NOW
            </a>
          </li>
        </ul>

        <!-- Hamburger Icon -->
        <div class="space-y-1 cursor-pointer md:hidden" @click="toggleHamburger">
          <div class="w-6 h-0.5 bg-black"></div>
          <div class="w-6 h-0.5 bg-black"></div>
          <div class="w-6 h-0.5 bg-black"></div>
        </div>
      </nav>

      <!-- Mobile Menu -->
      <div
        v-if="isOpen"
        class="md:hidden bg-white w-full absolute top-full left-0 border-t border-gray-200 shadow-lg z-50"
      >
        <ul class="flex flex-col py-4 space-y-2 font-medium">
          <li><a href="/" class="px-4 py-2 text-[#d4af37] font-semibold hover:bg-gray-100 block">Home</a></li>
          <li><a href="/roomandsuites" class="px-4 py-2 hover:bg-gray-100 block">Jobs and Skills</a></li>
          <li><a href="/available_services" class="px-4 py-2 hover:bg-gray-100 block">Services</a></li>
          <li>
            <a
              href="/available_services"
              class="px-4 py-2 bg-[#d4af37] text-black rounded-md font-semibold hover:bg-yellow-400 block"
            >
              BOOK NOW
            </a>
          </li>
        </ul>
      </div>
    </div>
  </header>
</template>