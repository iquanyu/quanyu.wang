<template>
  <div>
    <div class="sm:hidden">
      <label for="tabs"
             class="sr-only">Select a tab</label>
      <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
      <select id="tabs"
              name="tabs"
              class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm rounded-md">
        <option>动态</option>

        <option>文章</option>

        <option selected>Interview</option>

        <option>Offer</option>

        <option>Disqualified</option>
      </select>
    </div>
    <div class="hidden sm:block">
      <div class="border-b border-gray-200">
        <nav class="-mb-px flex space-x-8"
             aria-label="Tabs">
          <!-- Current: "border-orange-500 text-orange-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200" -->
          <Link :href="route('dashboard')"
                :class="route().current('dashboard') ? 'border-orange-500 text-orange-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200'"
                class="whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm">
          最近动态
          <!-- Current: "bg-orange-100 text-orange-600", Default: "bg-gray-100 text-gray-900" -->
          <!-- <span :class="route().current('dashboard') ? 'bg-orange-100 text-orange-600' : 'bg-gray-100 text-gray-900'"
                    class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">52</span> -->
          </Link>

          <Link :href="route('manage.articles')"
                :class="route().current('manage.articles') ? 'border-orange-500 text-orange-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200'"
                class="whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm">
          管理文章
          <!-- Current: "bg-orange-100 text-orange-600", Default: "bg-gray-100 text-gray-900" -->
          <!-- <span :class="route().current('manage.articles') ? 'bg-orange-100 text-orange-600' : 'bg-gray-100 text-gray-900'"
                class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">52</span> -->
          </Link>
        </nav>
      </div>
    </div>

  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import { defineComponent } from 'vue'

export default defineComponent({
  components: {
    Link,
  },
})
</script>