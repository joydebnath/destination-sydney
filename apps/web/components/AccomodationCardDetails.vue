<template>
  <div>
    <UiText :title="props.name" size="lg" weight="medium" color-shade="700" />
    <UiText :title="props.host" size="sm" color-shade="500" />
  </div>
</template>

<script lang="ts" setup>
const props = defineProps<{
  name: string;
  host: string;
}>();
</script>
