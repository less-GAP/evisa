<script setup>
import SectionMain from "@/components/SectionMain.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue"
import {ApiData, RemoteSelect} from "@/components";
import {reactive} from "vue";

const formState = reactive({})
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <form action="action" method="post" target="output_frame">
        <!-- input elements here -->
      </form>
      <iframe name="output_frame" src="" id="output_frame" width="XX" height="YY">
      </iframe>
    </SectionMain>
  </LayoutAuthenticated>
</template>
