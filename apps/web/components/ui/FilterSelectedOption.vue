<template>
  <div
    class="flex flex-row justify-between items-center py-1 border-b border-slate-100"
  >
    <div class="flex flex-row items-center space-x-1 w-full">
      <IconGripVertical class="text-gray-500 h-[18px] w-auto mt-0.5" />
      <UiText
        :title="props.option.name"
        size="sm"
        color-shade="600"
        weight="medium"
      />
    </div>
    <div
      class="w-6 h-6 cursor-pointer text-gray-500"
      @click="$emit('onRemoveOption', props.option)"
    >
      <IconCross class="w-full h-full" />
    </div>
  </div>
</template>

<script lang="ts" setup>
import { IFilterOption } from "~~/contracts/IFilterOption";

const props = defineProps<{
  option: IFilterOption;
}>();

defineEmits<{
  (event: "onRemoveOption", option: IFilterOption): void;
}>();

const handleRemoveOption = () => {
  console.log("remove option");
};
</script>
