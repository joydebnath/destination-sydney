<template>
  <div>
    <h1 :class="`${size} ${color} ${weight}`">
      {{ props.title }}
      <slot />
    </h1>
  </div>
</template>

<script lang="ts" setup>
const props = withDefaults(
  defineProps<{
    title?: string;
    size?: "sm" | "md" | "lg" | "xl" | "base";
    colorShade?: "500" | "600" | "700" | "800" | "900";
    weight?: "thin" | "light" | "normal" | "medium" | "semibold" | "bold";
  }>(),
  {
    size: "base",
    colorShade: "800",
    weight: "normal",
  }
);

const size = computed(() => `text-${props.size}`);

const color = computed(() => `text-slate-${props.colorShade}`);

const weight = computed(() => `font-${props.weight}`);
</script>
