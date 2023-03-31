<template>
  <UiCard>
    <template #header>
      <UiText title="Regions" weight="semibold" size="sm" />
    </template>
    <template #default>
      <div class="flex flex-row items-center space-x-1">
        <IconGripVertical class="text-gray-500 h-[18px] w-auto mt-0.5" />
        <UiText
          :title="store.regionName"
          size="sm"
          color-shade="600"
          weight="medium"
        />
      </div>
    </template>
  </UiCard>
</template>

<script lang="ts" setup>
import { useFiltersStore } from '~~/store/filters';

const store = useFiltersStore();
</script>