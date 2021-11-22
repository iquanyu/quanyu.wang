<template>
  <Link :href="href"
        :class="classes">
  <slot />
  </Link>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
  components: {
    Link,
  },
  props: ['href', 'active'],

  computed: {
    classes () {
      return this.active
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500'
    }
  }
})
</script>
