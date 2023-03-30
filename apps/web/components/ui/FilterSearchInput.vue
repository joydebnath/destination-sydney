<template>
  <div class="relative w-full" v-click-away="handleClickAway">
    <UiInputField
      v-model="searchText"
      :placeholder="props.placeholder"
      class="z-10 relative"
      @on-focus="handleFocusInputField"
    >
      <template #left>
        <IconSearch class="w-4 h-4" />
      </template>
    </UiInputField>
    <UiFilterSearchDropdown
      :show="showDropdown"
      :options="computedOptions"
      @on-select-option="handleSelectOption"
    />
    <div class="flex flex-col pt-4">
      <UiFilterSelectedOptions
        :selected-options="selectedOptions"
        @on-remove-option="handleRemoveOption"
      />
    </div>
  </div>
</template>

<script lang="ts" setup>
import { directive as vClickAway } from "vue3-click-away";
import { IFilterOption } from "~~/contracts/IFilterOption";

const props = withDefaults(
  defineProps<{
    placeholder?: string;
  }>(),
  {
    placeholder: "Search",
  }
);

const searchText = ref("");
const showDropdown = ref(false);

const selectedOptions = ref<Array<IFilterOption>>([]);

const options = [
  { id: "1", name: "Sydney CBD", selected: false },
  { id: "2", name: "Sydney Inner West", selected: false },
  { id: "3", name: "Sydney North Shore", selected: false },
  { id: "4", name: "Sydney Eastern Suburbs", selected: false },
  { id: "5", name: "Sydney South West", selected: false },
];

const handleFocusInputField = () => {
  if (!showDropdown.value) {
    showDropdown.value = true;
  }
};

const handleClickAway = () => {
  if (showDropdown.value) {
    showDropdown.value = false;
  }
};

const handleSelectOption = (option: any) => {
  if (option.selected) {
    return;
  }

  const index = options.findIndex((item) => item.id === option.id);
  if (index === -1) {
    return;
  }

  if (searchText.value) {
    searchText.value = "";
  }

  options[index].selected = true;
  showDropdown.value = false;
  selectedOptions.value.push(option);
};

const computedOptions = computed(() => {
  if (!searchText.value) {
    return options;
  }

  return options.filter((option) =>
    option.name.toLowerCase().includes(searchText.value.toLowerCase())
  );
});

const handleRemoveOption = (option: any) => {
  const index = selectedOptions.value.findIndex(
    (item) => item.id === option.id
  );
  if (index === -1) {
    return;
  }

  const optionIndex = options.findIndex((item) => item.id === option.id);
  if (optionIndex === -1) {
    return;
  }

  options[optionIndex].selected = false;
  selectedOptions.value.splice(index, 1);
};
</script>
