<template>
  <section class="w-full">
    <nav
      class="bg-white min-h-[55px] border-b shadow-sm border-b-gray-100 flex flex-row items-center py-1"
    >
      <Logo class="px-6 py-2" />
    </nav>
    <section class="max-w-screen-lg mx-auto pt-12 pb-6 flex flex-col">
      <article class="flex flex-col space-y-2 mb-6">
        <UiText title="Sydney accomodation" size="xl" weight="semibold" />
        <UiText class="font-inter" size="sm" color-shade="500">
          A bustling city and a popular tourist destination, offering a wide
          range of accommodation options for visitors. From luxury hotels to
          budget-friendly hostels, there is something for everyone.
        </UiText>
      </article>

      <div class="grid grid-cols-7 gap-4 py-6">
        <div class="col-span-2">
          <div class="flex flex-col space-y-3">
            <UiText
              title="Accomodation filters"
              color-shade="700"
              weight="semibold"
            />
            <RegionsFilter />
            <AreasFilter @on-areas-change="handleFilterChange" />
            <SuburbsFilter @on-suburbs-change="handleFilterChange" />
            <br />
            <UiButton
              class="w-full !bg-slate-500"
              @on-click="handleApplyFilters"
            >
              <span
                class="text-white font-bold font-inter tracking-wide uppercase text-xs"
              >
                Apply filters
              </span>
            </UiButton>
          </div>
        </div>
        <div class="col-span-5">
          <AccomodationCard />
        </div>
      </div>
    </section>
  </section>
</template>

<script lang="ts" setup>
import { IFilter } from "~~/contracts/IFilterOption";
import { useFiltersStore } from "~~/store/filters";

const store = useFiltersStore();

const handleFilterChange = (pauload: IFilter) => {
  store.addToFilterList(pauload);
};

const handleApplyFilters = () => {
  console.log("apply filters", store.filters);
};
</script>
