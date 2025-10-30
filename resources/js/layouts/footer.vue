<script setup>
import mapPin from '@/../img/map-pin.svg'
import phoneIcon from '@/../img/phone.svg'
import mailIcon from '@/../img/mail.svg'
import facebookIcon from '@/../img/facebook.svg'
import twitterIcon from '@/../img/twitter.svg'
import instagramIcon from '@/../img/instagram.svg'
</script>

<template>
  <!-- ✅ FOOTER (Matching Header Style) -->
  <footer class="bg-white text-[#d4af37] border-t border-gray-200 mt-auto py-7 w-full">
    <div class="max-w-7xl mx-auto px-6">
      <nav class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm text-center md:text-left">
        <div>
          <h3 class="text-[#d4af37] text-lg font-semibold mb-1">JuanClick</h3>
          <p class="flex justify-center md:justify-start items-center gap-2 text-black">Hospitality and Comfort are our watchwords</p>
        </div>

        <div>
          <h3 class="text-[#d4af37] text-lg font-semibold mb-1">Contact Us</h3>
         <p class="flex justify-center md:justify-start items-center gap-2 text-black">
            <img :src="mapPin" class="w-4 h-4 filter brightness-0" />
            <span>23, Fola Osibo, Lekki Phase 1</span>
          </p>

          <p class="flex justify-center md:justify-start items-center gap-2 mt-1 text-black">
            <img :src="phoneIcon" class="w-4 h-4 filter brightness-0" />
            <span>08185956620</span>
          </p>

          <p class="flex justify-center md:justify-start items-center gap-2 mt-1 text-black">
            <img :src="mailIcon" class="w-4 h-4 filter brightness-0" />
            <span>support@starhotels.com</span>
          </p>
        </div>

        <div>
          <h3 class="text-[#d4af37] text-lg font-semibold mb-1">Follow Us</h3>
          <ul class="flex justify-center md:justify-start space-x-3">
            <li><a href="#"><img :src="facebookIcon" alt="facebook" class="w-5 h-5 filter brightness-0" /></a></li>
            <li><a href="#"><img :src="twitterIcon" alt="twitter" class="w-5 h-5 filter brightness-0" /></a></li>
            <li><a href="#"><img :src="instagramIcon" alt="instagram" class="w-5 h-5 filter brightness-0" /></a></li>
          </ul>
        </div>
      </nav>
    </div>
  </footer>
</template>