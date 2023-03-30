<template>
  <div class="mt-2">
    <UiText color-shade="600" weight="light">
      <p class="text-xs">
        {{ props.description }}
      </p>
    </UiText>
  </div>
</template>

<script lang="ts" setup>
const props = defineProps<{
  description: string;
}>();
</script>
