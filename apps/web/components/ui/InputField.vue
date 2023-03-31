<template>
  <div
    class="flex flex-row items-center bg-gray-50 border border-gray-100 rounded-md"
  >
    <div
      class="text-gray-400 px-1.5 border-r border-r-slate-200"
      v-if="!!slots.left"
    >
      <slot name="left" />
    </div>

    <input
      :value="props.modelValue"
      @input="$event => $emit('update:modelValue', (<HTMLInputElement>$event?.target)?.value)"
      @focus="() => $emit('onFocus')"
      type="text"
      :placeholder="props.placeholder"
      class="bg-gray-50 h-8 px-2 py-1.5 outline-none text-sm"
    />

    <div
      class="text-gray-400 px-1.5 border-l border-r-slate-200"
      v-if="!!slots.right"
    >
      <slot name="right" />
    </div>
  </div>
</template>

<script lang="ts" setup>
const props = withDefaults(
  defineProps<{
    modelValue: string;
    placeholder?: string;
  }>(),
  {
    placeholder: "Search",
  }
);

defineEmits<{
  (event: "update:modelValue", value: string): void;
  (event: "onFocus"): void;
}>();

const slots = useSlots();
</script>
