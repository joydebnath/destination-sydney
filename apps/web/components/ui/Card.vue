<template>
  <div class="bg-white shadow-sm rounded p-4 pt-2 flex flex-col space-y-2.5">
    <div class="border-b border-b-gray-100 pb-1" v-if="!!slots.header">
      <slot name="header" />
    </div>

    <slot />

    <div class="pt-2" v-if="slots.footer">
      <slot name="footer" />
    </div>
  </div>
</template>

<script lang="ts" setup>
const slots = useSlots();
</script>
