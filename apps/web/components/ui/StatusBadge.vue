<template>
  <div
    class="flex flex-row items-center space-x-1 px-2 py-0.5 border border-slate-100 rounded-md"
  >
    <IconCheckDuotone
      v-if="statusToUpper.toUpperCase() === 'ACTIVE'"
      class="text-green-400 mt-0.5"
    />
    <IconCrossDuotone
      v-else-if="statusToUpper.toUpperCase() === 'INACTIVE'"
      class="text-red-400 mt-0.5"
    />
    <IconInfoDuotone v-else class="text-sky-400 mt-0.5" />
    <UiText
      :title="statusToUpper"
      size="sm"
      weight="medium"
      color-shade="600"
      class="tracking-wide"
    />
  </div>
</template>

<script lang="ts" setup>
const props = defineProps<{
  status: string;
}>();

const statusToUpper = computed(() => props.status.toUpperCase());
</script>
