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
    data?: Array<IFilterOption>;
  }>(),
  {
    placeholder: "Search",
  }
);

const emit = defineEmits<{
  (event: "onFilterChange", filerOptions: Array<IFilterOption>): void;
}>();

const searchText = ref("");
const showDropdown = ref(false);
const selectedOptions = ref<Array<IFilterOption>>([]);

const options = computed(() => {
  if (!props.data) {
    return [];
  }

  return props.data.map((item) => {
    return {
      ...item,
      selected: false,
    };
  });
});

const computedOptions = computed(() => {
  if (!searchText.value) {
    return options.value;
  }

  return options.value.filter((option) =>
    option.name.toLowerCase().includes(searchText.value.toLowerCase())
  );
});

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

  const index = options.value.findIndex((item) => item.id === option.id);
  if (index === -1) {
    return;
  }

  if (searchText.value) {
    searchText.value = "";
  }

  options.value[index].selected = true;
  showDropdown.value = false;
  selectedOptions.value.push(option);

  emit("onFilterChange", selectedOptions.value);
};

const handleRemoveOption = (option: any) => {
  const index = selectedOptions.value.findIndex(
    (item) => item.id === option.id
  );
  if (index === -1) {
    return;
  }

  const optionIndex = options.value.findIndex((item) => item.id === option.id);
  if (optionIndex === -1) {
    return;
  }

  options.value[optionIndex].selected = false;
  selectedOptions.value.splice(index, 1);

  emit("onFilterChange", selectedOptions.value);
};
</script>
