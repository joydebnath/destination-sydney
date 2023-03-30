<template>
  <UiCard>
    <template #header>
      <UiText title="Regions" weight="semibold" size="sm" />
    </template>
    <template #default>
      <UiFilterSearchInput
        v-if="!(pending || error)"
        placeholder="Search regions"
        :data="(regions?.data || []) as Array<IFilterOption>"
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
import { IFilterOption } from "~~/contracts/IFilterOption";
import { IRegion } from "~~/contracts/IRegion";
const { data: regions, pending, error } = useApiFetch<IRegion>("/api/regions");
</script>
