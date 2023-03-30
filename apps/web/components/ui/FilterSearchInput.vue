<template>
  <div class="relative w-full" v-click-away="onClickAway">
    <UiInputField
      v-model="searchText"
      :placeholder="placeholder"
      class="z-10 relative"
      @on-focus="handleFocusInputField"
    >
      <template #left>
        <IconSearch class="w-4 h-4" />
      </template>
    </UiInputField>
    <ul
      :class="{
        'opacity-0': !showDropdown,
      }"
      v-if="showDropdown"
      class="absolute bg-white border z-50 mt-1 w-full h-60 overflow-hidden overflow-y-scroll rounded-bl-lg rounded-br-lg transition-opacity ease-in-out duration-700 opacity-100 shadow-sm"
    >
      <li
        v-for="option in options"
        :key="option.id"
        class="flex flex-row items-center space-x-1.5 text-xs border-t first:border-t-0 border-b-slate-100 px-2 py-1.5 text-slate-600 font-medium font-inter active:bg-slate-50 hover:bg-slate-100 cursor-pointer"
        @click="() => handleSelectOption(option)"
      >
        <IconCircleDashedDuotone class="h-4 w-4 text-blue-500 mt-0.5" />
        <p class="text-ellipsis truncate">{{ option.name }}</p>
      </li>
    </ul>
  </div>
</template>

<script lang="ts" setup>
import { directive as vClickAway } from "vue3-click-away";

withDefaults(
  defineProps<{
    placeholder?: string;
  }>(),
  {
    placeholder: "Search",
  }
);

const searchText = ref("");
const showDropdown = ref(false);

const options = [
  { id: 1, name: "Sydney CBD" },
  { id: 2, name: "Sydney Inner West" },
  { id: 3, name: "Sydney North Shore" },
  { id: 4, name: "Sydney Eastern Suburbs" },
  { id: 5, name: "Sydney South West" },
  { id: 6, name: "Sydney South" },
  { id: 7, name: "Sydney North West" },
  { id: 8, name: "Sydney Western Suburbs" },
  { id: 9, name: "Sydney Northern Beaches" },
  { id: 10, name: "Sydney Eastern Suburbs" },
  { id: 11, name: "Sydney South West" },
  { id: 12, name: "Sydney South" },
];

const handleFocusInputField = () => {
  if (!showDropdown.value) {
    showDropdown.value = true;
  }
};

const onClickAway = () => {
  if (showDropdown.value) {
    showDropdown.value = false;
  }
};

const handleSelectOption = (option: any) => {
  searchText.value = option.name;
  showDropdown.value = false;
};
</script>
