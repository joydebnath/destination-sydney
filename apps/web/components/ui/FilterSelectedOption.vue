<template>
  <div class="flex flex-row justify-between items-center">
    <div class="flex flex-row items-center space-x-1 w-full">
      <IconsCheckDuotone class="text-green-500 h-[18px] w-auto mt-0.5 cursor-not-allowed" />
      <UiText
        :title="props.title"
        size="sm"
        color-shade="600"
        weight="medium"
      />
    </div>
    <div
      class="w-6 h-6 cursor-pointer text-gray-600"
      @click="handleRemoveOption"
    >
      <IconsCross class="w-full h-full" />
    </div>
  </div>
</template>

<script lang="ts" setup>
const props = defineProps<{
  title: string;
}>();

const handleRemoveOption = () => {
  console.log("remove option");
};
</script>
