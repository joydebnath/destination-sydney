<template>
  <UiCard class="rounded-md">
    <template #header>
      <AccomodationCardHeader :status="props.status" />
    </template>
    <template #default>
      <div class="flex flex-row space-x-2">
        <img :src="props.image" class="w-48 h-auto rounded-sm" />

        <div class="flex flex-col">
          <AccomodationCardDetails :name="props.name" :host="props.host" />
          <UiRating :rating="props.rating" />

          <AccomodationCardDescription :description="props.description" />
        </div>
      </div>
    </template>
    <template #footer>
      <AccomodationCardFooter
        :city="props.city"
        :state="props.state"
        :postcode="props.postcode"
        :area="props.area"
        :region="props.region"
        :geo-points="props.geoPoints"
      />
    </template>
  </UiCard>
</template>

<script lang="ts" setup>
const props = defineProps<{
  status: string;
  image: string;
  name: string;
  host: string;
  rating: number;
  description: string;
  city: string;
  state: string;
  postcode: string;
  area: string;
  region: string;
  geoPoints: string;
}>();
</script>
