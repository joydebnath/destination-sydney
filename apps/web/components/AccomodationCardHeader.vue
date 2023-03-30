<template>
  <div class="flex flex-row items-center justify-between space-y-2 px-0 pb-0.5">
    <UiStatusBadge :status="props.status" />
    <UiButton>
      <IconZoomOut class="w-4 h-4 mt-0.5 text-slate-400" />
    </UiButton>
  </div>
</template>


<script lang="ts" setup>
const props = defineProps<{
  status: string;
}>();
</script>