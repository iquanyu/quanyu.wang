<template>
  <app-layout title="首页">
    <div class="divide-y divide-gray-200">
      <div class="pt-6 pb-8 space-y-2 md:space-y-5">
        <!-- <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl md:text-[4rem] md:leading-[3.5rem]">Latest</h1> -->
        <p class="text-lg text-gray-500">本站只是演示作用，所有数据均由假数据生成。</p>
      </div>
      <ul class="divide-y divide-gray-200">
        <li class="py-12"
            v-for="article in articles.data"
            :key="article.id">
          <article class="space-y-2 xl:grid xl:grid-cols-4 xl:space-y-0 xl:items-baseline">
            <dl>
              <dt class="sr-only">发表于</dt>
              <dd class="text-base font-medium text-gray-500"><time datetime="2021-08-11T19:30:00.000Z">{{ article.created_at }}</time></dd>
            </dl>
            <div class="space-y-5 xl:col-span-3">
              <div class="space-y-6">
                <h2 class="text-2xl font-bold tracking-tight">
                  <Link :href="route('articles.show', article.id)"
                        class="text-gray-900 flex items-center justify-between">{{ article.title }}
                  <span class="text-orange-600 bg-gray-200 p-2 rounded-md text-sm xl:block hidden"
                        v-if="article.is_top">置顶</span>
                  </Link>
                </h2>
                <div class="prose max-w-none text-gray-500">
                  <div class="prose max-w-none"
                       v-html="article.description">
                  </div>
                </div>
              </div>
              <div class="text-base font-medium">
                <Link :href="route('articles.show', article.id)"
                      class="text-orange-600 hover:text-orange-700">阅读更多 →</Link>
              </div>
            </div>
          </article>
        </li>
      </ul>

      <div class="py-6 w-full flex justify-between items-center">
        <div v-if="articles.prev_page_url === null"
             title="当前第一页"
             class=" cursor-pointer text-gray-400">
          第一页
        </div>
        <Link v-else
              :href="articles.prev_page_url">
        上一页
        </Link>

        <div v-if="articles.next_page_url === null"
             title="最后一页啦"
             class=" cursor-pointer text-gray-400">
          最后一页
        </div>
        <Link v-else
              :href="articles.next_page_url">
        下一页
        </Link>
      </div>
      <!-- <Pagination :links="articles.links" /> -->
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/inertia-vue3'
import Pagination from '@/Shared/Pagination'

export default defineComponent({
  props: {
    articles: Object
  },
  components: {
    AppLayout,
    Link,
    Pagination
  },
})
</script>
