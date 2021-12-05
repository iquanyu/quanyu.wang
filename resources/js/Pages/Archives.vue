<template>
  <app-layout title="文章归档">
    <div class="divide-y divide-gray-200">
      <div class="pt-6 pb-8 space-y-2 md:space-y-5">
        <!-- <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl md:text-[4rem] md:leading-[3.5rem]">Latest</h1> -->
        <p class="text-lg text-gray-500">页面：<span>文章归档</span></p>
      </div>
      <div class="xl:py-12 py-6">
        <div class="divide-y xl:divide-y-0 divide-gray-200 xl:grid xl:grid-cols-4 xl:gap-x-6 pb-16 xl:pb-20">
          <div class="pb-6">
            <h2 class="pb-2 text-orange-600">文章归档</h2>
            <p class="text-sm">他太懒了，什么都没有留下</p>
          </div>
          <div class="divide-y divide-gray-200 xl:pb-0 xl:col-span-3 xl:row-span-2">
            <div v-for="(value,key) in articles"
                 :key="key">
              <h2 class="text-2xl leading-8 tracking-tight py-2">{{ key }}</h2>
              <div>
                <Link :href="route('articles.show', article.id)"
                      v-for="article in value"
                      :key="article.id"
                      class="flex items-center text-orange-600 hover:text-orange-700 p-4">
                <span class="text-sm text-gray-400 mr-4">{{ article.date }}</span>
                <p>{{ article.title }}</p>
                </Link>
              </div>
            </div>
          </div>
          <!-- <footer class="text-sm font-medium xl:col-start-1 xl:row-start-2">
            <div class="pt-24">
              <a class="text-orange-600 hover:text-orange-700"
                 href="/">← Back to the blog</a>
            </div>
          </footer> -->
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  props: {
    articles: Array
  },
  components: {
    AppLayout,
    Link
  },
})
</script>
