<template>
  <div class=" flex items-center justify-start">
    <!-- <div class="mt-1 relative rounded-md shadow-sm">
      <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <span class="text-gray-500 sm:text-sm">
          $
        </span>
      </div>
      <input type="text"
             name="price"
             id="price"
             class="focus:ring-orange-500 focus:border-orange-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
             placeholder="Search…"
             :value="value"
             @input="$emit('input', $event.target.value)" />
      <div class="absolute inset-y-0 right-0 flex items-center">
        <label for="currency"
               class="sr-only">Currency</label>
        <select id="currency"
                name="currency"
                class="focus:ring-orange-500 focus:border-orange-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
          <option>USD</option>
          <option>CAD</option>
          <option>EUR</option>
        </select>
      </div>
    </div> -->

    <input class="relative w-full px-6 py-3 rounded-r focus:ring"
           autocomplete="off"
           type="text"
           name="search"
           placeholder="Search…"
           :value="modelValue"
           @input="$emit('input', $event.target.value)" />

    <button class="ml-3 text-sm text-gray-500 hover:text-gray-700 focus:text-orange-500"
            type="button"
            @click="$emit('reset')">Reset</button>
  </div>
</template>

<script>

export default {
  components: {
  },
  props: {
    modelValue: String,
    maxWidth: {
      type: Number,
      default: 300,
    },
  },
}
</script>