<template>
  <ul
    v-if="props.show"
    class="absolute bg-white border z-50 mt-1 w-full max-h-[15rem] overflow-hidden overflow-y-scroll rounded-bl-lg rounded-br-lg transition-opacity ease-in-out duration-700 opacity-100 shadow-sm"
  >
    <li
      v-for="option in props.options"
      :key="option.id"
      :disabled="option.selected"
      :class="{
        'bg-green-50 border-green-100': option.selected,
      }"
      class="flex flex-row items-center space-x-1.5 text-xs border-t first:border-t-0 border-b-slate-100 px-2 py-1.5 text-slate-600 font-medium font-inter hover:bg-slate-50 cursor-pointer"
      @click="$emit('onSelectOption', option)"
    >
      <IconCircleDashedDuotone
        class="h-4 w-4 text-blue-500 mt-0.5"
        :class="{
          'text-green-500': option.selected,
        }"
      />
      <p class="text-ellipsis truncate">{{ option.name }}</p>
    </li>
  </ul>
</template>

<script lang="ts" setup>
import { IFilterOption } from "~~/contracts/IFilterOption";

const props = defineProps<{
  options: Array<IFilterOption>;
  show: boolean;
}>();

defineEmits<{
  (event: "onSelectOption", option: IFilterOption): void;
}>();
</script>
