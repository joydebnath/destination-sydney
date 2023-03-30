<template>
  <UiCard>
    <template #header>
      <UiText title="Areas" weight="semibold" size="sm" />
    </template>
    <template #default>
      <UiFilterSearchInput
        v-if="!(pending || error)"
        placeholder="Search areas"
        :data="(areas?.data || []) as Array<IFilterOption>"
      />
      <UiText
        v-if="pending"
        title="loading..."
        color-shade="500"
        size="sm"
        class="text-center animate-pulse"
      />
      <UiText
        v-if="error"
        title="Whoops! Something went wrong."
        color-shade="500"
        size="sm"
        class="text-center"
      />
    </template>
  </UiCard>
</template>

<script lang="ts" setup>
import { IArea } from "~~/contracts/IArea";
import { IFilterOption } from "~~/contracts/IFilterOption";
const { data: areas, pending, error } = useApiFetch<IArea>("/api/areas");
</script>
