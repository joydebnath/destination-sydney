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
import { IArea } from "~~/contracts/IArea";
import { IFilter, IFilterOption } from "~~/contracts/IFilterOption";

const emit = defineEmits<{
  (event: "onAreasChange", payload: IFilter): void;
}>();

const {
  data: areas,
  pending,
  error,
} = useApiFetch<IArea>("/api/locations", {
  query: {
    filter: "area",
  },
});

const handleFilterChange = (filter: Array<IFilterOption>) => {
  emit("onAreasChange", {
    areas: filter,
  });
};
</script>
