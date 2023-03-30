<template>
  <UiCard>
    <template #header>
      <UiText title="City/Suburbs" weight="semibold" size="sm" />
    </template>
    <template #default>
      <UiFilterSearchInput
        v-if="!(pending || error)"
        placeholder="city/suburbs"
        :data="(suburbs?.data || []) as Array<IFilterOption>"
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
import { ISuburb } from "~~/contracts/ISuburb";
const { data: suburbs, pending, error } = useApiFetch<ISuburb>("/api/suburbs");
</script>
