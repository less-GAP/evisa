<script setup>
import { containerMaxW } from "@/config.js";
</script>

<template>
  <section class="" :class="containerMaxW">
    <slot />
  </section>
</template>
