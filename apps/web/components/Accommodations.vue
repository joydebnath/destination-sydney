<template>
  <div class="space-y-4">
    <template v-if="!(isLoading || hasError)">
      <AccomodationCard
        v-for="accommodation in accommodations"
        :key="accommodation.id"
        :status="accommodation.status"
        :image="accommodation.image"
        :name="accommodation.name"
        :host="accommodation.organisation_name"
        :rating="accommodation.score"
        :description="handleTruncateDescription(accommodation.description)"
        :city="accommodation.address.city"
        :state="accommodation.address.state"
        :postcode="accommodation.address.postcode"
        :area="accommodation.address.area"
        :region="accommodation.address.region"
        :geo-points="accommodation.geo_points"
      />
    </template>
    <div
      v-if="isLoading"
      class="flex flex-col items-center justify-center space-y-3 animate-pulse mt-6"
    >
      <img src="/loading.svg" class="w-2/5 h-auto" />
      <UiText title="Loading..." size="xl" color-shade="500" />
    </div>
    <div
      v-if="hasError"
      class="flex flex-col items-center justify-center space-y-3 mt-6"
    >
      <UiText
        title="Whoops! Something went wrong..."
        size="xl"
        color-shade="500"
      />
    </div>
  </div>
</template>

<script lang="ts" setup>
import { storeToRefs } from "pinia";
import { useAccommodationsStore } from "~~/store/accommodation";

const store = useAccommodationsStore();
const { accommodations, isLoading, hasError } = storeToRefs(store);

store.loadAccommodations();

const handleTruncateDescription = (description: string) => {
  if (description.length > 250) {
    return description.substring(0, 250) + "...";
  }

  return description;
};
</script>
