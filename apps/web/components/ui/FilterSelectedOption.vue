<template>
  <div class="flex flex-row justify-between items-center">
    <div class="flex flex-row items-center space-x-1 w-full">
      <IconGripVertical class="text-gray-500 h-[18px] w-auto mt-0.5" />
      <UiText
        :title="props.text"
        size="sm"
        color-shade="600"
        weight="medium"
      />
    </div>
    <div
      class="w-6 h-6 cursor-pointer text-gray-500"
      @click="handleRemoveOption"
    >
      <IconCross class="w-full h-full" />
    </div>
  </div>
</template>

<script lang="ts" setup>
const props = defineProps<{
  text: string;
}>();

const handleRemoveOption = () => {
  console.log("remove option");
};
</script>
