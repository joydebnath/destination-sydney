<template>
  <div class="flex flex-row items-center justify-between">
    <div class="flex flex-row items-center space-x-0.5">
      <IconMapPin class="w-5 h-5 mt-1 text-slate-600" />
      <UiText :title="props.city" size="sm" color-shade="700" weight="medium" />,
      <UiText :title="props.state" size="sm" color-shade="700" weight="medium" />
      <UiText
        title="|"
        class="px-1 -mt-0.5"
        size="sm"
        color-shade="700"
        weight="medium"
      />
      <UiText :title="props.postcode" size="sm" color-shade="700" weight="medium" />
    </div>
    <div class="flex flex-row items-center space-x-1">
      <IconAustralia class="w-5 h-5 mt-0.5 text-slate-600" />
      <UiText
        :title="props.area"
        size="sm"
        color-shade="700"
        weight="medium"
      />,
      <UiText :title="props.region" size="sm" color-shade="700" weight="medium" />
    </div>
    <a class="flex flex-row items-center space-x-1" href="#" target="_blank">
      <IconMap class="w-5 h-5 mt-0.5 text-slate-600" />
      <UiText title="View on map" size="sm" color-shade="700" />
    </a>
  </div>
</template>

<script lang="ts" setup>
const props = defineProps<{
    city: string;
    state: string;
    postcode: string;
    area: string;
    region: string;
    geoPoints: string;
}>();

</script>
