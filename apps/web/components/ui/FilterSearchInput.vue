<template>
  <UiInputField v-model="searchText" :placeholder="props.placeholder">
    <template #left>
      <IconSearch class="w-5 h-5" />
    </template>
  </UiInputField>
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

const searchText = ref("");

watchEffect(() => {
  console.log(searchText.value);
});
</script>
