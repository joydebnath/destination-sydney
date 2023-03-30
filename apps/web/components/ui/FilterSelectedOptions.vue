<template>
  <div>
    <template v-if="!props.selectedOptions.length">
      <UiText color-shade="400" weight="medium" class="tracking-wider">
        <div
          class="flex flex-row items-center justify-center space-x-1 uppercase tracking-wide"
        >
          <IconFilter class="w-5 h-auto" />
          <span class="text-xs">not applied</span>
        </div>
      </UiText>
    </template>
    <template v-else>
      <UiFilterSelectedOption
        v-for="option in props.selectedOptions"
        :key="option.id"
        :option="option"
        @on-remove-option="(option) => $emit('onRemoveOption', option)"
      />
    </template>
  </div>
</template>

<script lang="ts" setup>
import { IFilterOption } from "~~/contracts/IFilterOption";

const props = defineProps<{
  selectedOptions: Array<IFilterOption>;
}>();

defineEmits<{
  (event: "onRemoveOption", option: IFilterOption): void;
}>();
</script>
