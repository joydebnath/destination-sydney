<template>
  <div class="flex flex-row items-center space-x-1 mt-2">
    <template v-for="star in stars">
      <IconStarFull
        v-if="star === 'full'"
        class="w-5 h-5 mt-0.5 text-slate-700"
      />
      <IconStarHalf
        v-else-if="star === 'half'"
        class="w-5 h-5 mt-0.5 text-slate-700"
      />
      <IconStarEmpty
        v-else-if="star === 'empty'"
        class="w-5 h-5 mt-0.5 text-slate-700"
      />
    </template>

    <UiText
      :title="`(${rating})`"
      size="sm"
      color-shade="500"
      weight="medium"
      class="inline-flex mt-0.5"
    />
  </div>
</template>

<script lang="ts" setup>
const props = defineProps<{
  rating: string;
}>();

const rating = computed(() => Number(props.rating).toFixed(1));

const stars = computed(() => {
  const rating = Number(props.rating);

  const full = Math.floor(rating);
  const fullStars = Array.from({ length: full }, (_, i) => "full");

  const half = rating % 1 < 1 ? ["half"] : [];

  const empty = 5 - Math.ceil(rating);
  const emptyStars = Array.from({ length: empty }, (_, i) => "empty");

  return [...fullStars, ...half, ...emptyStars];
});
</script>
