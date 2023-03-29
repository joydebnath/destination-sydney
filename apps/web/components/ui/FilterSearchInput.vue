<template>
  <div>
    <input
      type="text"
      :placeholder="props.placeholder"
      class="bg-gray-50 h-8 px-2 py-1.5 border border-gray-100 rounded-md outline-none text-sm"
    />
  </div>
</template>

<script lang="ts" setup>
const props = withDefaults(
  defineProps<{
    placeholder?: string;
  }>(),
  {
    placeholder: "Search",
  }
);
</script>
