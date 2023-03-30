<template>
  <div
    class="flex flex-row items-center bg-gray-50 border border-gray-100 rounded-md"
  >
    <div
      class="text-gray-400 px-1.5 border-r border-r-slate-200"
      v-if="showLeftIcon()"
    >
      <slot name="left" />
    </div>

    <input
      :value="modelValue"
      @input="$event => $emit('update:modelValue', (<HTMLInputElement>$event?.target)?.value)"
      type="text"
      :placeholder="placeholder"
      class="bg-gray-50 h-8 px-2 py-1.5 outline-none text-sm"
      
    />

    <div
      class="text-gray-400 px-1.5 border-l border-r-slate-200"
      v-if="showRightIcon()"
    >
      <slot name="right" />
    </div>
  </div>
</template>

<script lang="ts" setup>
withDefaults(
  defineProps<{
    modelValue: string;
    placeholder?: string;
  }>(),
  {
    placeholder: "Search",
  }
);

defineEmits<{
  (e: "update:modelValue", value: string): void;
}>();

const slots = useSlots();
const showLeftIcon = () => !!slots.left;
const showRightIcon = () => !!slots.right;
</script>
