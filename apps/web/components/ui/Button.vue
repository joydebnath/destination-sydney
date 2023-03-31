<template>
  <button
    @click="$emit('onClick')"
    class="bg-stone-50 px-2 py-1 border border-slate-100 rounded-md"
  >
    <slot />
  </button>
</template>

<script lang="ts" setup>
defineEmits<{
  (event: "onClick"): void;
}>();
</script>
