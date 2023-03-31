<template>
  <UiCard>
    <template #header>
      <UiText title="City/Suburbs" weight="semibold" size="sm" />
    </template>
    <template #default>
      <UiFilterSearchInput
        v-if="!(pending || error)"
        placeholder="Search city/suburbs"
        :data="(suburbs?.data || []) as Array<IFilterOption>"
        @on-filter-change="handleFilterChange"
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
import { IFilter, IFilterOption } from "~~/contracts/IFilterOption";
import { ISuburb } from "~~/contracts/ISuburb";

const emit = defineEmits<{
  (event: "onSuburbsChange", payload: IFilter): void;
}>();

const {
  data: suburbs,
  pending,
  error,
} = useApiFetch<ISuburb>("/api/locations", {
  query: {
    filter: "suburb",
  },
});

const handleFilterChange = (filter: Array<IFilterOption>) => {
  emit("onSuburbsChange", {
    suburbs: filter,
  });
};
</script>
