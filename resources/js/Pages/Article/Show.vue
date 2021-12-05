<template>
  <app-layout :title="article.title">
    <article class="xl:divide-y xl:divide-gray-200">
      <header class="pt-6 xl:pb-10">
        <div class="space-y-1 text-center">
          <dl class="space-y-10">
            <div>
              <dt class="sr-only">Published on</dt>
              <dd class="text-base leading-6 font-medium text-gray-500 space-x-1">
                <time :datetime="article.created_at">{{ article.created_at }}</time>
                <span class="text-gray-400"> / </span>
                <span>{{ article.view_count }}次查看</span>
                <span class="text-gray-400"> / </span>
                <span>{{ article.category.name }}</span>
              </dd>
            </div>
          </dl>
          <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl md:text-5xl md:leading-[3.5rem]">{{ article.title }}</h1>
          </div>
        </div>
      </header>
      <div class="divide-y xl:divide-y-0 divide-gray-200 xl:grid xl:grid-cols-4 xl:gap-x-6 pb-16 xl:pb-20"
           style="grid-template-rows: auto 1fr;">
        <dl class="pt-6 pb-10 xl:pt-11 xl:border-b xl:border-gray-200">
          <dt class="sr-only">Authors</dt>
          <dd>
            <ul class="flex justify-center xl:block space-x-8 sm:space-x-12 xl:space-x-0 xl:space-y-8">
              <li class="flex items-center space-x-2">
                <!-- <img src="https://ui-avatars.com/api/?name=admin&color=F97316&background=EBF4FF"
                     alt
                     class="w-10 h-10 rounded-full" /> -->
                <dl class="text-sm font-medium whitespace-no-wrap">
                  <dt class="sr-only">Name</dt>
                  <dd class="text-gray-900">{{ article.author.name }}</dd>
                  <dt class="sr-only">Email</dt>
                  <dd>
                    <Link :href="route('about')"
                          class="text-orange-600 hover:text-orange-700">
                    {{ article.author.email }}
                    </Link>
                  </dd>
                </dl>
              </li>
            </ul>
          </dd>
        </dl>
        <div class="divide-y divide-gray-200 xl:pb-0 xl:col-span-3 xl:row-span-2">
          <div class="max-w-none pt-10 pb-8">
            <div class="prose max-w-none"
                 v-html="article.content">
            </div>

          </div>
          <div class="pt-6 pb-16">
            <!-- <p>
              Want to try it out?
              <a href="https://headlessui.dev"
                 class="font-medium text-orange-600 hover:text-orange-700">Visit the Headless UI website →</a>
            </p> -->
          </div>
        </div>
        <footer class="text-sm font-medium divide-y divide-gray-200 xl:col-start-1 xl:row-start-2">
          <div class="space-y-8 py-8">
            <div v-if="article.next_article">
              <h2 class="text-xs leading-5 tracking-wide uppercase text-gray-500">下一篇文章</h2>
              <div class="text-orange-600 hover:text-orange-700">
                <Link :href="route('articles.show', article.next_article.id)">{{ article.next_article.title }}</Link>
              </div>
            </div>
            <div v-if="article.last_article">
              <h2 class="text-xs leading-5 tracking-wide uppercase text-gray-500">上一篇文章</h2>
              <div class="text-orange-600 hover:text-orange-700">
                <Link :href="route('articles.show', article.last_article.id)">{{ article.last_article.title }}</Link>
              </div>
            </div>
          </div>
          <div class="pt-8">
            <Link :href="route('home')"
                  class="text-orange-600 hover:text-orange-700">← 返回首页</Link>
          </div>
        </footer>
      </div>
    </article>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  props: {
    article: Object
  },
  components: {
    AppLayout,
    Link
  },
})
</script>
