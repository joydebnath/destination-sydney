<template>
  <div class="bg-white shadow-sm rounded p-4 pt-2 flex flex-col space-y-2.5">
    <slot name="header" />
    <slot />

    <slot name="footer" />
  </div>
</template>

<script lang="ts" setup></script>
