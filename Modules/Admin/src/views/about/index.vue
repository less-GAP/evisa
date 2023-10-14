<script setup>
import SectionMain from "@/components/SectionMain.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <div class="p-5">
        <h1 class="text-3xl mb-3">About this project</h1>
        <hr class="my-2">
        <h2 class="mt-5">e-VISA</h2>
        <p class="text-lg mt-5">e-VISA is an online portal for visa application. It enables clients to apply for a visa online, pay and receive their visa entirely online and from the comfort of their homes or offices.</p>
        <h2 class="mt-5">Developed by less[GAP] Solutions</h2>
        <p class="text-lg mt-5">less[GAP] Solutions is a software development company based in US. We are a team of young and vibrant developers who are passionate about building software solutions that solve real world problems.</p>

        <!-- Version -->
        <h2 class="mt-5">Version</h2>
        <p class="text-sm">3.5.0</p>

      </div>
    </SectionMain>
  </LayoutAuthenticated>
</template>
